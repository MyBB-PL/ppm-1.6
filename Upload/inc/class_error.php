<?php
/**
 * MyBB 1.6
 * Copyright 2010 MyBB Group, All Rights Reserved
 *
 * Website: http://mybb.com
 * License: http://mybb.com/about/license
 *
 * $Id$
 */
 
// Set to 1 if recieving a blank page (template failure).
define("MANUAL_WARNINGS", 0);
 
// Define Custom MyBB error handler constants with a value not used by php's error handler.
define("MYBB_SQL", 20);
define("MYBB_TEMPLATE", 30);
define("MYBB_GENERAL", 40);
define("MYBB_NOT_INSTALLED", 41);
define("MYBB_NOT_UPGRADED", 42);
define("MYBB_INSTALL_DIR_EXISTS", 43);
define("MYBB_SQL_LOAD_ERROR", 44);
define("MYBB_CACHE_NO_WRITE", 45);
define("MYBB_CACHEHANDLER_LOAD_ERROR", 46);

if(!defined("E_RECOVERABLE_ERROR"))
{
	// This constant has been defined since PHP 5.2.
	define("E_RECOVERABLE_ERROR", 4096);
}

if(!defined("E_DEPRECATED"))
{
	// This constant has been defined since PHP 5.3.
	define("E_DEPRECATED", 8192);
}

if(!defined("E_USER_DEPRECATED"))
{
	// This constant has been defined since PHP 5.3.
	define("E_USER_DEPRECATED", 16384);
}

class errorHandler {

	/**
	 * Array of all of the error types
	 *
	 * @var array
	 */
	public $error_types = array( 
		E_ERROR              => 'Błąd',
		E_WARNING            => 'Ostrzeżenie',
		E_PARSE              => 'Błąd parsowania',
		E_NOTICE             => 'Powiadomienie',
		E_CORE_ERROR         => 'Błąd silnika',
		E_CORE_WARNING       => 'Ostrzeżenie silnika',
		E_COMPILE_ERROR      => 'Błąd kompilacji',
		E_COMPILE_WARNING    => 'Ostrzeżenie kompilacji',
		E_DEPRECATED		 => 'Ostrzeżenie o przestarzałej funkcji',
		E_USER_ERROR         => 'Błąd użytkownika',
		E_USER_WARNING       => 'Ostrzeżenie użytkownika',
		E_USER_NOTICE        => 'Informacja użytkownika',
		E_USER_DEPRECATED	 => 'Nieobsługiwana wersja',
		E_STRICT             => 'Błąd wykonywania',
		E_RECOVERABLE_ERROR  => 'Wychwytywalny błąd krytyczny',
		MYBB_SQL 			 => 'Błąd SQL MyBB', 
		MYBB_TEMPLATE		 => 'Błąd szablonu MyBB',
		MYBB_GENERAL		 => 'Błąd MyBB',
		MYBB_NOT_INSTALLED	 => 'Błąd MyBB',
		MYBB_NOT_UPGRADED 	 => 'Błąd MyBB',
		MYBB_INSTALL_DIR_EXISTS => 'Błąd MyBB',
		MYBB_SQL_LOAD_ERROR  => 'Błąd MyBB',
		MYBB_CACHE_NO_WRITE  => 'Błąd MyBB',
		MYBB_CACHEHANDLER_LOAD_ERROR => 'Błąd MyBB',
	);
	
	/**
	 * Array of MyBB error types
	 *
	 * @var array
	 */
	public $mybb_error_types = array(
		MYBB_SQL,
		MYBB_TEMPLATE,
		MYBB_GENERAL,
		MYBB_NOT_INSTALLED,
		MYBB_NOT_UPGRADED,
		MYBB_INSTALL_DIR_EXISTS,
		MYBB_SQL_LOAD_ERROR,
		MYBB_CACHE_NO_WRITE,
		MYBB_CACHEHANDLER_LOAD_ERROR,
	);
	
	/**
	 * Array of all of the error types to ignore
	 *
	 * @var array
	 */
	public $ignore_types = array(
		E_DEPRECATED,
		E_NOTICE,
		E_USER_NOTICE,
		E_STRICT
	);
	
	/**
	 * String of all the warnings collected
	 *
	 * @var string
	 */
	public $warnings = "";

	/**
	 * Is MyBB in an errornous state? (Have we received an error?)
	 *
	 * @var boolean
	 */
	public $has_errors = false;
	
	/**
	 * Initializes the error handler
	 *
	 */
	function __construct()
	{
		// Lets set the error handler in here so we can just do $handler = new errorHandler() and be all set up.
		$error_types = E_ALL;
		foreach($this->ignore_types as $bit)
		{
			$error_types = $error_types & ~$bit;
		}
		error_reporting($error_types);
		set_error_handler(array(&$this, "error"), $error_types);
	}
 	
	/**
	 * Parses a error for processing.
	 *
	 * @param string The error type (i.e. E_ERROR, E_FATAL)
	 * @param string The error message
	 * @param string The error file
	 * @param integer The error line
	 * @return boolean True if parsing was a success, otherwise assume a error
	 */			
	function error($type, $message, $file=null, $line=0)
	{
		global $mybb;

		// Error reporting turned off (either globally or by @ before erroring statement)
		if(error_reporting() == 0)
		{
			return true;
		}

		if(in_array($type, $this->ignore_types))
		{
			return true;
		}

		$file = str_replace(MYBB_ROOT, "", $file);

		$this->has_errors = true;
		
		// For some reason in the installer this setting is set to "<"
		$accepted_error_types = array('both', 'error', 'warning', 'none');
		if(!in_array($mybb->settings['errortypemedium'], $accepted_error_types))
		{
			$mybb->settings['errortypemedium'] = "both";
		}
		
		if(defined("IN_TASK"))
		{
			global $task;
			
			require_once MYBB_ROOT."inc/functions_task.php";
			
			if($file)
			{
				$filestr = " - Linia: $line - Plik: $file";
			}
			
			add_task_log($task, "{$this->error_types[$type]} - [$type] ".var_export($message, true)."{$filestr}");
		}
		
		// Saving error to log file.
		if($mybb->settings['errorlogmedium'] == "log" || $mybb->settings['errorlogmedium'] == "both")
		{
			$this->log_error($type, $message, $file, $line);
		}

		// Are we emailing the Admin a copy?
		if($mybb->settings['errorlogmedium'] == "mail" || $mybb->settings['errorlogmedium'] == "both")
		{
			$this->email_error($type, $message, $file, $line);
		}
		
		// SQL Error
		if($type == MYBB_SQL)
		{
			$this->output_error($type, $message, $file, $line);
		}
		else
		{
			// Do we have a PHP error?
			if(my_strpos(my_strtolower($this->error_types[$type]), 'warning') === false)
			{
				$this->output_error($type, $message, $file, $line);
			}
			// PHP Error
			else
			{
				if($mybb->settings['errortypemedium'] == "none" || $mybb->settings['errortypemedium'] == "error")
				{
					echo "<div class=\"php_warning\">Wewnętrzny błąd MyBB: Wystąpiło jedno lub więcej ostrzeżeń. Skontaktuj się z administratorem, aby uzyskać pomoc.</div>"; 
				}
				else
				{
					global $templates;
					
					$warning = "<strong>{$this->error_types[$type]}</strong> [$type] $message - Linia: $line - Plik: $file PHP ".PHP_VERSION." (".PHP_OS.")<br />\n";
					if(is_object($templates) && method_exists($templates, "get") && !defined("IN_ADMINCP"))
					{
						$this->warnings .= $warning;
						$this->warnings .= $this->generate_backtrace();
					}
					else
					{
						echo "<div class=\"php_warning\">{$warning}".$this->generate_backtrace()."</div>";
					}
				}
			}
		}
		
		return true;
	}
	
	/**
	 * Returns all the warnings
	 *
	 * @return string The warnings
	 */
	function show_warnings()
	{
		global $lang, $templates;
		
		if(empty($this->warnings))
		{
			return false;
		}
		
		// Incase a template fails and we're recieving a blank page.
		if(MANUAL_WARNINGS)
		{
			echo $this->warnings."<br />";
		}

		if(!$lang->warnings)
		{
			$lang->warnings = "Wystąpiły poniższe ostrzeżenia:";
		}
	
		if(defined("IN_ADMINCP"))
		{
			$warning = makeacpphpwarning($this->warnings);
		}
		else
		{
			$template_exists = false;
			
			if(!is_object($templates) || !method_exists($templates, 'get'))
			{
				if(@file_exists(MYBB_ROOT."inc/class_templates.php"))
				{
					@require_once MYBB_ROOT."inc/class_templates.php";
					$templates = new templates;
					$template_exists = true;
				}
			}
			else
			{
				$template_exists = true;
			}
			
			if($template_exists == true)
			{
				eval("\$warning = \"".$templates->get("php_warnings")."\";");
			}
		}
	
		return $warning;
	}
	
	/**
	 * Triggers a user created error 
	 * Example: $error_handler->trigger("Some Warning", E_USER_ERROR);
	 *
	 * @param string Message
	 * @param string Type
	 */
	function trigger($message="", $type=E_USER_ERROR)
	{
		global $lang;

		if(!$message)
		{
			$message = $lang->unknown_user_trigger;
		}

		if(in_array($type, $this->mybb_error_types))
		{
			$this->error($type, $message);
		}
		else
		{
			trigger_error($message, $type);		
		}
	}

	/**
	 * Logs the error in the specified error log file.
	 *
	 * @param string Warning type
	 * @param string Warning message
	 * @param string Warning file
	 * @param integer Warning line
	 */
	function log_error($type, $message, $file, $line)
	{
		global $mybb;

		if($type == MYBB_SQL)
		{
			$message = "Błąd SQL: {$message['error_no']} - {$message['error']}\nZapytanie: {$message['query']}";
		}

		// Do not log something that might be executable
		$message = str_replace('<?', '< ?', $message);

		$error_data = "<error>\n";
		$error_data .= "\t<dateline>".TIME_NOW."</dateline>\n";
		$error_data .= "\t<script>".$file."</script>\n";
		$error_data .= "\t<line>".$line."</line>\n";
		$error_data .= "\t<type>".$type."</type>\n";
		$error_data .= "\t<friendly_type>".$this->error_types[$type]."</friendly_type>\n";
		$error_data .= "\t<message>".$message."</message>\n";
		$error_data .= "</error>\n\n";

		if(trim($mybb->settings['errorloglocation']) != "")
		{
			@error_log($error_data, 3, $mybb->settings['errorloglocation']);
		}
		else
		{
			@error_log($error_data, 0);
		}
	}

	/**
	 * Emails the error in the specified error log file.
	 *
	 * @param string Warning type
	 * @param string Warning message
	 * @param string Warning file
	 * @param integer Warning line
	 */
	function email_error($type, $message, $file, $line)
	{
		global $mybb;
		
		if(!$mybb->settings['adminemail'])
		{
			return false;
		}

		if($type == MYBB_SQL) 
		{
			$message = "Bląd SQL: {$message['error_no']} - {$message['error']}\nZapytanie: {$message['query']}";
		}
		
		$message = "W MyBB uruchomionym na forum {$mybb->settings['bbname']} ({$mybb->settings['bburl']}) wystąpił błąd. Szczegóły problemu:\n---\nTyp: $type\nPlik: $file (linia $line)\nTreść komunikatu\n$message";

		@my_mail($mybb->settings['adminemail'], "Błąd MyBB na forum {$mybb->settings['bbname']}", $message, $mybb->settings['adminemail']);
	}

	function output_error($type, $message, $file, $line)
	{
		global $mybb, $parser;

		if(!$mybb->settings['bbname'])
		{
			$mybb->settings['bbname'] = "MyBB";
		}

		if($type == MYBB_SQL)
		{		
			$title = "Błąd SQL";
			$error_message = "<p>MyBB napotkało wewnętrzny błąd w zapytaniu SQL i nie może kontynuować.</p>";
			if($mybb->settings['errortypemedium'] == "both" || $mybb->settings['errortypemedium'] == "error" || defined("IN_INSTALL") || defined("IN_UPGRADE"))
			{
				$message['query'] = htmlspecialchars_uni($message['query']);
				$message['error'] = htmlspecialchars_uni($message['error']);
				$error_message .= "<dl>\n";
				$error_message .= "<dt>Błąd SQL:</dt>\n<dd>{$message['error_no']} - {$message['error']}</dd>\n";
				if($message['query'] != "")
				{
					$error_message .= "<dt>Zapytanie:</dt>\n<dd>{$message['query']}</dd>\n";
				}
				$error_message .= "</dl>\n";
			}
		}
		else
		{
			$title = "Wewnętrzny błąd MyBB";
			$error_message = "<p>MyBB napotkało błąd wewnętrzny i nie może kontynuować.</p>";
			if($mybb->settings['errortypemedium'] == "both" || $mybb->settings['errortypemedium'] == "error" || defined("IN_INSTALL") || defined("IN_UPGRADE"))
			{
				$error_message .= "<dl>\n";
				$error_message .= "<dt>Typ błędu:</dt>\n<dd>{$this->error_types[$type]} ($type)</dd>\n";
				$error_message .= "<dt>Treść błędu:</dt>\n<dd>{$message}</dd>\n";
				if(!empty($file))
				{
					$error_message .= "<dt>Lokalizacja:</dt><dd>Plik: {$file}<br />Linia: {$line}</dd>\n";
					if(!@preg_match('#config\.php|settings\.php#', $file) && @file_exists($file))
					{
						$code_pre = @file($file);
	
						$code = "";
	
						if(isset($code_pre[$line-4]))
						{
							$code .= $line-3 . ". ".$code_pre[$line-4];
						}
	
						if(isset($code_pre[$line-3]))
						{
							$code .= $line-2 . ". ".$code_pre[$line-3];
						}
	
						if(isset($code_pre[$line-2]))
						{
							$code .= $line-1 . ". ".$code_pre[$line-2];
						}
	
						$code .= $line . ". ".$code_pre[$line-1]; // The actual line.
	
						if(isset($code_pre[$line]))
						{
							$code .= $line+1 . ". ".$code_pre[$line];
						}
	
						if(isset($code_pre[$line+1]))
						{
							$code .= $line+2 . ". ".$code_pre[$line+1];
						}
	
						if(isset($code_pre[$line+2]))
						{
							$code .= $line+3 . ". ".$code_pre[$line+2];
						}
	
						unset($code_pre);
	
						$parser_exists = false;
	
						if(!is_object($parser) || !method_exists($parser, 'mycode_parse_php'))
						{
							if(@file_exists(MYBB_ROOT."inc/class_parser.php"))
							{
								@require_once MYBB_ROOT."inc/class_parser.php";
								$parser = new postParser;
								$parser_exists = true;
							}
						}
						else
						{
							$parser_exists = true;
						}
	
						if($parser_exists)
						{
							$code = $parser->mycode_parse_php($code, true);
						}
						else
						{
							$code = @nl2br($code);
						}
	
						$error_message .= "<dt>Kod:</dt><dd>{$code}</dd>\n";
					}
				}
				$backtrace = $this->generate_backtrace();
				if($backtrace && !in_array($type, $this->mybb_error_types))
				{
					$error_message .= "<dt>Fragment kodu:</dt><dd>{$backtrace}</dd>\n";
				}
				$error_message .= "</dl>\n";
			}
		}

		if(isset($lang->settings['charset']))
		{
			$charset = $lang->settings['charset'];
		}
		else
		{
			$charset = 'UTF-8';
		}

		if(!headers_sent() && !defined("IN_INSTALL") && !defined("IN_UPGRADE"))
		{
			@header('HTTP/1.1 503 Service Temporarily Unavailable');
			@header('Status: 503 Service Temporarily Unavailable');
			@header('Retry-After: 1800'); 
			@header("Content-type: text/html; charset={$charset}");
			$file_name = basename(__FILE__);
			
			echo <<<EOF
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset={$charset}" />
	<title>{$mybb->settings['bbname']} - błąd wewnętrzny</title>
	<style type="text/css">
		body { background: #efefef; color: #000; font-family: Verdana; font-size: 12px; text-align: center; line-height: 1.4; }
		a:link { color: #026CB1; text-decoration: none;	}
		a:visited {	color: #026CB1;	text-decoration: none; }
		a:hover, a:active {	color: #000; text-decoration: underline; }
		#container { width: 600px; padding: 20px; background: #fff;	border: 1px solid #e4e4e4; margin: 100px auto; text-align: left; }
		h1 { margin: 0; background: url({$file_name}?action=mybb_logo) no-repeat;	height: 82px; width: 248px; }
		#content { border: 1px solid #B60101; background: #fff; }
		h2 { font-size: 12px; padding: 4px; background: #B60101; color: #fff; margin: 0; }
		.invisible { display: none; }
		#error { padding: 6px; }
		#footer { font-size: 11px; border-top: 1px solid #ccc; padding-top: 10px; }
		dt { font-weight: bold; }
	</style>
</head>
<body>
	<div id="container">
		<div id="logo">
			<h1><a href="http://mybb.com/" title="MyBulletinBoard"><span class="invisible">MyBB</span></a></h1>
		</div>

		<div id="content">
			<h2>{$title}</h2>

			<div id="error">
				{$error_message}
				<p id="footer">Odwiedź <a href="http://www.mybboard.pl">Polski Support MyBB</a> aby uzyskać pomoc.</p>
			</div>
		</div>
	</div>
</body>
</html>
EOF;
		}
		else
		{
			echo <<<EOF
	<style type="text/css">
		#mybb_error_content { border: 1px solid #B60101; background: #fff; }
		#mybb_error_content h2 { font-size: 12px; padding: 4px; background: #B60101; color: #fff; margin: 0; }
		#mybb_error_error { padding: 6px; }
		#mybb_error_footer { font-size: 11px; border-top: 1px solid #ccc; padding-top: 10px; }
		#mybb_error_content dt { font-weight: bold; }
	</style>
	<div id="mybb_error_content">
		<h2>{$title}</h2>
		<div id="mybb_error_error">
		{$error_message}
			<p id="mybb_error_footer">Odwiedź <a href="http://www.mybboard.pl">Polski Support MyBB</a> aby uzyskać pomoc.</p>
		</div>
	</div>
EOF;
		}
		exit(1);
	}

	/**
	 * Generates a backtrace if the server supports it.
	 *
	 * @return string The generated backtrace
	 */
	function generate_backtrace()
	{
		if(function_exists("debug_backtrace"))
		{
			$trace = debug_backtrace();
			$backtrace = "<table style=\"width: 100%; margin: 10px 0; border: 1px solid #aaa; border-collapse: collapse; border-bottom: 0;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
			$backtrace .= "<thead><tr>\n";
			$backtrace .= "<th style=\"border-bottom: 1px solid #aaa; background: #ccc; padding: 4px; text-align: left; font-size: 11px;\">Plik</th>\n";
			$backtrace .= "<th style=\"border-bottom: 1px solid #aaa; background: #ccc; padding: 4px; text-align: left; font-size: 11px;\">Linia</th>\n";
			$backtrace .= "<th style=\"border-bottom: 1px solid #aaa; background: #ccc; padding: 4px; text-align: left; font-size: 11px;\">Funkcja</th>\n";
			$backtrace .= "</tr></thead>\n<tbody>\n";

			// Strip off this function from trace
			array_shift($trace);

			foreach($trace as $call)
			{
				if(empty($call['file'])) $call['file'] = "[PHP]";
				if(empty($call['line'])) $call['line'] = "&nbsp;";
				if(!empty($call['class'])) $call['function'] = $call['class'].$call['type'].$call['function'];
				$call['file'] = str_replace(MYBB_ROOT, "/", $call['file']);
				$backtrace .= "<tr>\n";
				$backtrace .= "<td style=\"font-size: 11px; padding: 4px; border-bottom: 1px solid #ccc;\">{$call['file']}</td>\n";
				$backtrace .= "<td style=\"font-size: 11px; padding: 4px; border-bottom: 1px solid #ccc;\">{$call['line']}</td>\n";
				$backtrace .= "<td style=\"font-size: 11px; padding: 4px; border-bottom: 1px solid #ccc;\">{$call['function']}</td>\n";
				$backtrace .= "</tr>\n";
			}
			$backtrace .= "</tbody></table>\n";
		}
		return $backtrace;
	}
}
?>

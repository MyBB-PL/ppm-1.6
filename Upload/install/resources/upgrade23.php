<?php
/**
 * MyBB 1.6
 * Copyright 2010 MyBB Group, All Rights Reserved
 *
 * Website: http://www.mybboard.com
 * License: http://mybb.com/about/license
 *
 * $Id$
 */

/**
 * Upgrade Script: 1.6.6
 */


$upgrade_detail = array(
	"revert_all_templates" => 0,
	"revert_all_themes" => 0,
	"revert_all_settings" => 0
);

@set_time_limit(0);

function upgrade23_dbchanges()
{
	global $db, $output;

	$output->print_header("Dokonywanie zmian w bazie danych");
	echo "<p>Trwa dokonywanie wymaganych zmian w bazie danych.</p>";

	if($db->field_exists('canusecustomtools', 'moderators'))
	{
		$db->drop_column('moderators', 'canusecustomtools');
	}

	if($db->field_exists('cansendemailoverride', 'usergroups'))
	{
		$db->drop_column('usergroups', 'cansendemailoverride');
	}

	switch($db->type)
	{
		case "pgsql":
		case "sqlite":
			$db->add_column('moderators', 'canusecustomtools', "int NOT NULL default '0'");
			$db->add_column('usergroups', 'cansendemailoverride', "int NOT NULL default '0'");
			break;
		default:
			$db->add_column('moderators', 'canusecustomtools', "int(1) NOT NULL default '0'");
			$db->add_column('usergroups', 'cansendemailoverride', "int(1) NOT NULL default '0'");
			break;
	}

	$db->update_query('moderators', array('canusecustomtools' => 1), "canmanagethreads = '1'");

	$output->print_contents("<p>Naciśnij przycisk Dalej, aby kontynuować proces aktualizacji.</p>");
	$output->print_footer("23_done");
}
?>
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
 * Upgrade Script: 1.2.7, 1.2.8, or 1.2.9
 */


$upgrade_detail = array(
	"revert_all_templates" => 0,
	"revert_all_themes" => 0,
	"revert_all_settings" => 0
);

@set_time_limit(0);

function upgrade10_dbchanges()
{
	global $db, $output, $mybb;

	$output->print_header("Wykonywanie zapytañ");

	echo "<p>Trwa wykonywanie wymaganych zapytañ do bazy danych...</p>";

	$db->write_query("UPDATE ".TABLE_PREFIX."templates SET version='0' WHERE version=''");
	$db->write_query("ALTER TABLE ".TABLE_PREFIX."templates CHANGE version version int unsigned NOT NULL default '0'");

	$contents .= "Naciœnij przycisk Dalej, aby kontynuowaæ proces aktualizacji.</p>";
	$output->print_contents($contents);
	$output->print_footer("10_done");
}

?>
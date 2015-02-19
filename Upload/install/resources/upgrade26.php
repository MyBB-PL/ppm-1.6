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
 * Upgrade Script: 1.6.9
 */

$upgrade_detail = array(
	"revert_all_templates" => 0,
	"revert_all_themes" => 0,
	"revert_all_settings" => 0
);

@set_time_limit(0);

function upgrade26_dbchanges()
{
	global $db, $output;

	$output->print_header("Dokonywanie zmian w bazie danych");
	echo "<p>Trwa dokonywanie wymaganych zmian w bazie danych.</p>";

	$db->update_query("helpdocs", array('usetranslation' => 1));
	$db->update_query("helpsections", array('usetranslation' => 1));

	$db->modify_column("polls", "numvotes", "text NOT NULL");

	if($db->field_exists('failedlogin', 'users'))
	{
		$db->write_query("ALTER TABLE ".TABLE_PREFIX."users DROP failedlogin;");
	}
	
	// We don't need the posthash after the post is inserted into the database
	$db->update_query('attachments', "posthash=''", 'pid!=0');
	
	// Column will be dropped in MyBB 1.8
	$db->update_query('posts', "posthash=''");

	$output->print_contents("<p>Naciœnij przycisk Dalej, aby kontynuowaæ proces aktualizacji.</p>");
	$output->print_footer("26_done");
}
?>
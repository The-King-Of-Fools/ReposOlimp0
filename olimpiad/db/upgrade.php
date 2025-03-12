<?php

function xmldb_olimpiad_upgrade($oldversion) {
    global $CFG;

    $result = TRUE;

    if ($oldversion < XXXXXXXXXX) {

        // Define table olympic to be created.
        $table = new xmldb_table('olympic');

        // Adding fields to table olympic.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('title', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
        $table->add_field('date_start', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
        $table->add_field('date_finish', XMLDB_TYPE_TEXT, null, null, null, null, null);
        $table->add_field('desc', XMLDB_TYPE_TEXT, null, null, null, null, null);

        // Adding keys to table olympic.
        $table->add_key('primaryid', XMLDB_KEY_PRIMARY, ['id']);

        // Conditionally launch create table for olympic.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Olimpiad savepoint reached.
        upgrade_block_savepoint(true, XXXXXXXXXX, 'olimpiad');
    }


    return $result;
}
?>
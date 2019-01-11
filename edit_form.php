<?php

//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class block_exampleblock_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        // Title for the configuration box can be chosen here

        $mform->addElement('header', 'config_header',
            get_string('blocksettings', 'block_exampleblock'));

        // Block text can be set here

        $mform->addElement('text', 'config_text', get_string('blockstring', 'block_exampleblock'));
        $mform->setDefault('config_text', 'default value');
        // this is for html input fields
        $mform->setType('config_text', PARAM_RAW);

        // Decide whether to show or hide the block header can be decided here

        // A sample string variable with a default value.
        // only the advanved checkbox will do here since it stores a value
        $mform->addElement('advcheckbox', 'config_hidetitle',
            get_string('hidetitle', 'block_exampleblock'),
            get_string('hidetitlelabel', 'block_exampleblock'),
            array('group' => 1), array(0, 1));
        $mform->setDefault('config_hidetitle', 1);

    }
}
<?php
// ********************************************************************************
// this file builds the blocks settings form for every blog instance that is added
// ********************************************************************************


//for moodle form logic
require_once("$CFG->libdir/formslib.php");

// for own plugin logic
require_once($CFG->dirroot.'/blocks/coursecat/locallib.php');


// this function come from the lib/formslip.php that is loaded above

// the get_strings apply to all string that are added, so they can be translated
class block_coursecat_edit_form extends block_edit_form {

    // the special definition corresponds to a custom section in the block setting page
    protected function specific_definition($mform) {

        // Title for the configuration section can be chosen here
        $mform->addElement('header', 'config_header',
            get_string('blocksettings', 'block_coursecat'));

        // first setting field:
        //       adding a html text input field to the block

        $mform->addElement('text', 'config_text', get_string('blockstring', 'block_coursecat'));
        $mform->setDefault('config_text', 'This is the Category Dasboard block');
        $mform->setType('config_text', PARAM_RAW);

        // second setting field:
        //       switch to decide whether to show the block header when the block is diplayed on the page

        // - the block title is set above
        // - only the advanved checkbox will do here since it stores a value
        $mform->addElement('advcheckbox', 'config_hidetitle',
            get_string('hidetitle', 'block_coursecat'),
            get_string('hidetitlelabel', 'block_coursecat'),
            array('group' => 1), array(0, 1));
        $mform->setDefault('config_hidetitle', 1);

        // third setting field:
        //       switch to decide what kind of dashboard that is: include or exclude the special category

        // get special category form the blocks settings
        $mform->addElement('select',
            'config_selectdashboardtype',
            get_string('categorymeaning', 'block_coursecat', get_special_category_from_settings() -> name),
            get_config_options_for_switch_in_plugin_settings());
        $mform->setDefault('config_selectdashboardtype', 0);
    }
}
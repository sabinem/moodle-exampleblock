<?php
// ***************************************************************
// this file makes the plugin settings form in the admin
// ***************************************************************
defined('MOODLE_INTERNAL') || die;

// for own plugin logic
require_once($CFG->dirroot.'/blocks/coursecat/locallib.php');

// these are the settings of the plugin in the admin of the plugin

if ($ADMIN->fulltree) {

    // first settings field
    //        chosing a category to be special regarding this plugin

    $settings->add(new admin_setting_configselect('block_coursecat/categoryselector',
        // next next to the setting selector
        get_string('categoryselector', 'block_coursecat'),
        // text the describes the setting
        get_string('categoryselectordescription', 'block_coursecat'),
        // options available
        'normal', get_options_for_special_category()));
}


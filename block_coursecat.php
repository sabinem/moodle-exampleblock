<?php

// this required in order to use category methods from the core of moodle
require_once($CFG->dirroot.'/lib/coursecatlib.php');

// for own plugin logic
require_once($CFG->dirroot.'/blocks/coursecat/locallib.php');

// this extend the block base class from moodle core
class block_coursecat extends block_base {

    // ********************************************************************************
    // overwriting moodles own block methods taken from blocks/moodleblockclass.php
    // ********************************************************************************

    // there has to be always an init function for a block
    public function init() {
        //
        $this->title = get_string('blocktitle', 'block_coursecat');
    }
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
    public function get_content() {

        // check for the cache
        if ($this->content !== null) {
            return $this->content;
        }

        // if the cache is empty get the content together
        $this->content         =  new stdClass;

        // get text from the content if it is available
        if (! empty($this->config->text)) {
            $this->content->text = $this->config->text;
        }

        // set the contents footer
        $this->content->footer =
            "This is a dashboard where the category "
            . get_special_category_from_settings() -> name
            . " is " . get_config_options_for_switch_in_plugin_settings($key=$this->config->selectdashboardtype);

        // return the blocks content
        return $this->content;

    }


    // this block is only allowed on the users dashboard
    public function applicable_formats() {
        return array('my' => true);
    }

    // hide the block instance header on the page if the block is configured in that way
    public function hide_header() {
        return $this -> get_block_instance_header_config();
    }

    // important when there are admin settings, otherwise, they will not show up
    public function has_config() {
        return true;
    }

    // ********************************************************************************
    // custom plugin methods
    // ********************************************************************************

    function get_block_instance_header_config(){

        // gets config for the block instance header
        // this config is set in edit_form.php

        if (! empty($this->config->hidetitle)) {
            return true;
        }
        return false;
    }

}
<?php
// ***************************************************************
// this file should be used for the plugins internal functions
// ***************************************************************

defined('MOODLE_INTERNAL') || die();

// ***************************************************************
// plugin setting helper functions
// ***************************************************************

function get_special_category_from_settings() {

    // get special category form the blocks settings

    $settings = get_config('block_coursecat');
    $catid = $settings -> categoryselector;
    $category = coursecat::get($catid);
    return $category;
}


function get_options_for_special_category() {

    // return the options for chosing a special category
    // this is an array with key as category ids and values: category name

    $categories = get_special_category_candidates();

    // make options array from the categories
    foreach ($categories as $catid => $category) {
        $options[$category->id] = $category->name;
    }
    return $options;
}


// ***************************************************************
// block instance settings helper functions
// ***************************************************************


function get_config_options_for_switch_in_plugin_settings($key = null)
{

    // handles the configuration options for include and exclude of a category in the settings
    // of block instances
    // - return the array of options if no key is given
    // - return the text for a specific option

    $text_exclude = get_string('excludecategoryoption', 'block_coursecat');
    $text_include = get_string('includecategoryoption', 'block_coursecat');
    $key_exclude = 1;
    $key_include = 2;

    if (!$key) {
        return array($key_exclude => $text_exclude, $key_include => $text_include);
    } else {
        switch ($key) {
            case $key_include:
                return $text_include;
            case $key_exclude:
                return $text_exclude;
        }
    }
}



// ***************************************************************
// show block on page helper functions
// ***************************************************************

function get_block_footer_text($configkey = null){

    // get content of the footer of the block
    // the footer text depends on whether the block instance has been already set up

    $specialcategory = get_special_category_from_settings();
    $option = get_config_options_for_switch_in_plugin_settings($key=$configkey);
    $footertext =
        "This is a dashboard where the category "
        . $specialcategory -> name
        . " is " . get_config_options_for_switch_in_plugin_settings($key=$option);

    return $footertext;
}



// ***************************************************************
// private helper functions
// ***************************************************************


function get_special_category_candidates() {

    // return all categories that can be special: this are only top
    // level categories right now

    return coursecat::get(0)->get_children();
}
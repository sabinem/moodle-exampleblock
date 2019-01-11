<?php
class block_coursecat extends block_base {
    public function init() {
        $this->title = get_string('coursecat', 'block_coursecat');
    }
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         =  new stdClass;

        // get configured text if available
        if (! empty($this->config->text)) {
            $this->content->text = $this->config->text;
        }

        //$this->content->text   = 'The content of our SimpleHTML block!';
        $this->content->footer = 'Goodbye for now...';

        return $this->content;

    }

    // this block is only allowed on the users dashboard
    public function applicable_formats() {
        return array('my' => true);
    }

    // hide header
    public function hide_header() {
        if (! empty($this->config->hidetitle)) {
            return true;
        }
        return false;
    }
}
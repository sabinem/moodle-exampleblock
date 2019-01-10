<?php
class block_exampleblock extends block_base {
    public function init() {
        $this->title = get_string('exampleblock', 'block_exampleblock');
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

        $this->content->text   = 'The content of our SimpleHTML block!';
        $this->content->footer = 'Footer here...';

        return $this->content;

    }
}
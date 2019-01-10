<?php
class block_exampleblock extends block_base {
    public function init() {
        $this->title = get_string('exampleblock', 'block_exampleblock');
    }
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
}
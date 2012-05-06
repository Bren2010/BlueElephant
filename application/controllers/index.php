<?php
class controller_index extends Controller {
    
    public function index($arguments) {
        $this->view['planet'] = 'Earth';
        
        // Set title.
        Layout::set('title', 'Home');
    }
    
}

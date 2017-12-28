<?php
class Errors extends CI_controller {
    public function notfound(){
        $this->load->view('head');
        $this->load->view('errors/404');
        $this->load->view('footer');
        
    }
}
?>
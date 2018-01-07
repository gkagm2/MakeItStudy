<?php
class Study extends CI_controller {
    function index(){
        $this->load->view('head');
        $this->load->view('studyphp/studyphp_list'); //연관배열
        $this->load->view('footer');
    }
    function studyphp($cheapter){
        $this->load->view('head');
        $this->load->view('studyphp/'.$cheapter); //연관배열
        $this->load->view('footer');
    }
}

?>
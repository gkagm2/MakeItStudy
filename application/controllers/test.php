<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller {

    function index(){
        $this->load->view('head');
        $this->load->view('testview');
        $this->load->view('footer');
    }

}
?>

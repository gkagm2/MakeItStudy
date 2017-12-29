<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topic extends CI_Controller {
    function __construct()
    {       
        parent::__construct();
        $this->load->database();
        $this->load->model('topic_model');
    }
    function index(){    
        $this->_head();    
        
        //$this->load->view('topic_list', $topics->id); //무엇이 문제인가! 
        
        $this->load->view('main');
        $this->load->view('footer');
    }
    function get($id){        
        $this->_head(); 

        $topic = $this->topic_model->get($id);
        $this->load->helper(array('url', 'HTML', 'korean'));
        $this->load->view('get', array('topic'=>$topic));

        $this->load->view('footer');

        $this->load->view('add');
    }
    function add(){
        $this->_head(); 
        $this->load->view('add');
        echo $this->input->post('title');
        echo $this->input->post('description');
        $this->load->view('footer');
    }
    function _head(){ //  _head라고 적게 되면 url routing에 대한 priavted >
        $this->load->view('head');
        $topics = $this->topic_model->gets();
        $this->load->view('topic_list', array('topics'=>$topics));
    }
    
}
?>
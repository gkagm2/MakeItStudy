<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller {

    function __construct() //__construct() : 초기화를 위한 함수.
    {       
        parent::__construct();
        $this->load->database();
        $this->load->model('test_model');  //test_model class 로드함.
    }
    function index(){

        $testlist = $this->test_model->gets();
        $this->load->view('head');
        $this->load->view('testview');
        $this->load->view('test_list', array('list'=>$testlist));

        $this->load->view('footer');
    }
    function showtestview3(){
        $data = $this->test_model->gets();


        $this->load->view('head');
        $this->load->view('testview3', array('test_data'=>$data));

        $this->load->view('footer');
    }
    function get($id){
        $testlist = $this->test_model->gets();

        $this->load->view('head');
        
        $this->load->view('test_list', array('list'=>$testlist));
        
        $row_data = $this->test_model->get($id);

        $this->load->view('testview2', array('data'=>$row_data));

        $this->load->view('footer');
    }

    function _head(){ //  _head라고 적게 되면 url routing에 _head라고 입력하면 private한 메소드가 된다. URL에_Head라고 접속을 해도 라우팅되지 않는다. (접속 x)
   
        $topics = $this->topic_model->gets();
        $this->load->view('topic_list', array('topics'=>$topics));
    }
    
}
?>
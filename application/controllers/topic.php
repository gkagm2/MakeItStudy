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
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', '제목', 'required');
        $this->form_validation->set_rules('description', '본문', 'required');
        

        if($this->form_validation->run() == FALSE){
            $this->load->view('add');
        } else {
            $this->topic_model->add($this->input->post('title'), $this->input->post('description'));
            echo '성공';
        }        

        
        $this->load->view('footer');
    }
    function _head(){ //  _head라고 적게 되면 url routing에 _head라고 입력하면 private한 메소드가 된다. URL에_Head라고 접속을 해도 라우팅되지 않는다. (접속 x)
        $this->load->config('opentutorials');
        $this->load->view('head');
        $topics = $this->topic_model->gets();
        $this->load->view('topic_list', array('topics'=>$topics));
    }
    
    function upload_form(){
        $this->_head();
        $this->load->view('upload_form');
        $this->load->view('footer');
    }

    function upload_receive(){
        // 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
        $config['upload_path'] = './static/user';
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|png';
        // 허용되는 파일의 최대 사이즈
        $config['max_size'] = '100';
        // 이미지인 경우 허용되는 최대 폭
        $config['max_width'] = '1024';
        // 이미지인 경우 허용되는 최대 높이
        $config['max_height'] = '768';
        $this->load->library('upload', $config);

    }
    
}
?>
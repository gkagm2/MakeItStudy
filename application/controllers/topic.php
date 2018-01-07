<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topic extends CI_Controller {
    function __construct() //__construct() : 초기화를 위한 함수.
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

        echo "sss";
        $this->load->view('add');

    }
    function add(){
        $this->_head(); 

        $this->load->library('form_validation'); //데이터의 유효성을 체크한다.
        
        $this->form_validation->set_rules('title', '제목', 'required'); //required 는 반드시 입력해야된다. 
        $this->form_validation->set_rules('description', '본문', 'required');
        

        //사용자가 입력한 정보의 유효성을 체크한다.      
         if ($this->form_validation->run() == FALSE) //유효하지 않다면
        {
             $this->load->view('add');
        }
        else //유효하다면
        {
            $topic_id = $this->topic_model->add($this->input->post('title'), $this->input->post('description'));
            $this->load->helper('url');
            redirect('/topic/get/'.$topic_id);
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

        $this->_head();
        $this->load->view('file_receive');
        
        $this->load->view('footer');
      


        // //upload는 파일을 업로드하는 라이브러리 클래스이다. do_upload()라는 메소드를 호출
        // if ( ! $this->upload->do_upload("user_upload_file")) //userfile은 인자가 아무것도 없을때 나옴. 사용자가 전송한 파일이 어떤 이름의 데이터로 전송될 것인지
		// {// 실패면
        //     //$error = array('error' => $this->upload->display_errors());

        //     echo $this->upload->display_errors();


		// 	//업로드 폼이라는것을 만들지 않아서 지운다. 
		// 	//$this->load->view('upload_form', $error);
		// }	
		// else // 참이면
		// {
        //     //사용자가 업로드한 파일을 php가 받아서 그 파일을 보안 취약점이 없는지 체크한 후 위에 있는 $config설정에 문제가 없는지 체크 후 else 부분이 실행된다. 
        //     //upload에 data()라는 메소드를 통해서 얻을 수 있다. 그 정보를 $data라는 변수에 담음.
		// 	$data = array('upload_data' => $this->upload->data());
			
        //     $this->load->view('upload_success', $data);
        //     echo '성공';
        //     var_dump($data);
		// }
    }
    
}
?>
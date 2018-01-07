<?php

class Test_model extends CI_Model {
    //function __construct(){
    //   parent::construct();
    //}

    public function gets() {
        

        //밑에 return 3개는 똑같음.
        return $this->db->query('SELECT * FROM test')->result(); //질의 후 리턴된 값을 result()로 받고  객체 형태로 변환  
        //return $this->db->query('SELECT * FROM test')->result_array(); //질의 후 리턴된 값을 result()로 받고  array형태로 변환  
        //return $this->db->get_where('test', array())->result(); //표준 sql문을 사용하기 때문에 이식성이 좋음.
    }

    public function get($test_id){
       // $id = $this->db->select('id'); 
        //$name = $this->db->select('name');
        //$address = $this->db->select('address');
        

        //표준 sql문을 사용하기때문에 이식성이 좋음.

        //->result()도 되지면 한 줄만 가져오려면 ->row()로 함.
        return $this->db->get_where('test', array('id'=>$test_id))->row(); //active record 방식으로 사용하여 이식성이 좋음.  밑에있는 것과 동일함.
        //return $this->db->query('SELECT * FROM test WHERE id='.$test_id.id); //문자열로 핸들링 해야되는 불편함이 있는데 위에처럼 하면 좋음
    }


}


?>
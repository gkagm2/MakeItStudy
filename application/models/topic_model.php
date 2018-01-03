<?php
class Topic_model extends CI_Model {
  function __construct(){ //__construct() : 초기화를 위한 함수.
    parent::__construct(); 
  }
  
  public function gets(){
    //echo "Topic_model gets() function test ";
    //$this->db  약속됨
    return $this->db->query('SELECT * FROM topic')->result(); //sql 질의를 한 후 리턴된 값을 result()라는 메소드를 통해 가져옴. (객체형태로 리턴)
    //return $this->db->query('SELECT * FROM topic')->result_array(); //객체가 아니라 array로 리턴된다.
    //리턴되는 값이 하나이면 raw를 사용하면 됨.
  }
  public function get($topic_id){
    $this->db->select('id'); // 이렇게 하게 되면 id이라고 가지고 있는 컬럼만 가지고 온다. 
    $this->db->select('title');
    $this->db->select('description');
    //$this->db->select('created');
    $this->db->select('UNIX_TIMESTAMP(created) AS created'); //이렇게 적으면 TIMESTAMP형식의 포멧으로 변환하고 변환된 결과는 created 의 이름으로 갖는다. 

    return $this->db->get_where('topic', array('id'=>$topic_id))->row(); //active record 방식으로 사용하여 이식성이 좋음.
    //return $this->db->query('SELECT * FROM topic WHERE id='.$topic.id); //문자열로 핸들링 해야되는 불편함이 있는데 위에처럼 하면 좋음

  }
  function add($title, $description){
    $this->db->set('created', 'NOW()', false);
    $this->db->insert('topic',array(
      'title'=>$title,
      'description'=>$description,
      'created'=>'now()'
    ));
    echo $this->db->last_query();
    echo $title;
  }
}
 ?>

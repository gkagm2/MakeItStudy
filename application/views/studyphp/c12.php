<!--제목-->
<h3>클래스,객체</h3>



<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>
class Human { //인간 클래스를 정의합니다.
    public $Name;
    public $Age;
    public $Height;
    public $Weight;

    //생성자 
    function __construct($pName, $pAge=1, $pHeight=50, $pWeight=3.5){
        $this->Name = $pName;
        $this->Age = $pAge;
        $this->Height = $pHeight;
        $this->Weight = $pWeight;
    }

    //생성자 2
    // function __construct($hname){
    //     $this->Name = $hname;
    //     $this->Age = 1;
    // }

    
    


    public function Eat ( $foods ) {
        echo "우걱 우걱~~~ 맛있는 " . $foods . "<br>";
    }
    public function Walk ( $destination ) {
        echo "뚜벅뚜벅 " . $destination . "까지 걸어요 . <br>";
    }
    public function Talk ( $word){
        echo $words . "<br>";
    }

    
    //소멸자 
    function __destruct() { // (파라미터를 가지지 못한다.)
        $this->Talk("창문을 닫아주세요~!");
    }
}
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
class Human { //인간 클래스를 정의합니다.
    public $Name;
    public $Age;
    public $Height;
    public $Weight;

    //생성자 
    function __construct($pName, $pAge=1, $pHeight=50, $pWeight=3.5){
        $this->Name = $pName;
        $this->Age = $pAge;
        $this->Height = $pHeight;
        $this->Weight = $pWeight;
    }

    //생성자 2
    // function __construct($hname){
    //     $this->Name = $hname;
    //     $this->Age = 1;
    // }

    
    


    public function Eat ( $foods ) {
        echo "우걱 우걱~~~ 맛있는 " . $foods . "<br>";
    }
    public function Walk ( $destination ) {
        echo "뚜벅뚜벅 " . $destination . "까지 걸어요 . <br>";
    }
    public function Talk ( $words){
        echo $words . "<br>";
    }

    
    //소멸자 
    function __destruct() { // (파라미터를 가지지 못한다.)
        $this->Talk("창문을 닫아주세요~!");
    }
}
?>
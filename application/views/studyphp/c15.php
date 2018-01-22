<!--제목-->
<h3>클래스 상속하기</h3>
<pre>
C++와 자바와 같은 객체지향 프로그래밍 언어에서는 다중 상속을 지원한다.
다중 상속이란 하나 이상의 클래스에 대해 상속을 받을 수 있는 것을 말한다.
그러나 PHP에서는 다중 상속을 지원하지 않기 때문에 하나의 클래스만을 상속받을 수 있다.
</pre>


<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>
include "c12.php";
class Baby extends Human { //인간 클래스를 상속받아 아기 클래스를 정의 한다.
    function eating_something() {
        echo "냠냠~";
    }
    function talking_angel() {
        echo "옹알~ 옹알~";
    }
}
$jamen = new Baby('jamen'); //아기 클래스를 이용해 jamen 객체를 생성
$jamen->talking_angel(); //옹알~ 옹알~
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
include "c12.php";
class Baby extends Human { //인간 클래스를 상속받아 아기 클래스를 정의 한다.
    function eating_something() {
        echo "냠냠~";
    }
    function talking_angel() {
        echo "옹알~ 옹알~";
    }
}
$jamen = new Baby('jamen'); //아기 클래스를 이용해 jamen 객체를 생성
$jamen->talking_angel(); //옹알~ 옹알~
?>
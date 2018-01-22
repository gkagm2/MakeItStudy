<!--제목-->
<h3>인스턴스 생성하기</h3>
<pre>
new 키워드를 사용하여 생성할 수 있다.
</pre>


<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>
include "c12.php"; //정의한 Human 클래스 
$charles = new Human('철수');
$younghee = new Human ('영희', 1 , 50, 3.5);
$charles = NULL; //철수 객체 제거
$younghee = NULL; //영희 객체 제거
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
include "c12.php"; //정의한 Human 클래스 
$charles = new Human('철수');
$younghee = new Human ('영희', 1 , 50, 3.5);
$charles = NULL; //철수 객체 제거
$younghee = NULL; //영희 객체 제거
?>
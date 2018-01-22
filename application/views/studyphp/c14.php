<!--제목-->
<h3>객체의 속성과 기능 사용하기 </h3>



<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>
include "c12.php"; //정의한 Human 클래스

$charles =  new Human('철수', 5); //5살짜리 철수를 생성한다.
$charles->Talk($charles->Age); //철수는 몇살?
$charles->Eat("dinner"); //철수야! 밥먹자~

//밥을 먹고 난 후 철수의 키와 몸무게가 늘었다.
$charles->Height = 110; //110cm
$charles->Weight = 22; //22kg
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
include "c12.php"; //정의한 Human 클래스

$charles =  new Human('철수', 5); //5살짜리 철수를 생성한다.
$charles->Talk($charles->Age); //철수는 몇살?
$charles->Eat("dinner"); //철수야! 밥먹자~

//밥을 먹고 난 후 철수의 키와 몸무게가 늘었다.
$charles->Height = 110; //110cm
$charles->Weight = 22; //22kg
?>
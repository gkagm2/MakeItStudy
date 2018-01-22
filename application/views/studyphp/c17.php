<!--제목-->
<h3>쿠키의 경로설정</h3>



<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>
//경로를 지정해주면 지정된 경로 이하의 모든 디렉토리에서 쿠키에 잡근할 수 있게 된다.
$result = setcookie('php', 'Cool~', time()+1000, '/');

if($result) {
    echo '쿠키 생성 완료';
}
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
//경로를 지정해주면 지정된 경로 이하의 모든 디렉토리에서 쿠키에 잡근할 수 있게 된다.
$result = setcookie('php', 'Cool~', time()+1000, '/');

if($result) {
    echo '쿠키 생성 완료';
}

?>
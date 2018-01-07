<!--제목-->
<h3>대괄호 문법을 이용한 배열 설정</h3>



<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>
$arr['name'] = 'brown';
$arr[] = 15;

echo $arr['name'];
echo "< br>";
echo $arr[0];
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
$arr['name'] = 'brown';
$arr[] = 15;

echo $arr['name'];
echo "<br>";
echo $arr[0];
?>
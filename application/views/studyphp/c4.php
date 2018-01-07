<!--제목-->
<h3>배열의 제거</h3>

<pre>unset() 함수 사용하자</pre>


<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>
$arr = array('name'=>'brown', 'age'=>29, 'sex'=>'male');

echo "< pre>";
//배열의 한 원소 제거
unset($arr['sex']);
print_r($arr);

//배열 전체 제거
unset($arr);
print_r($arr);
echo "< /pre>";
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
$arr = array('name'=>'brown', 'age'=>29, 'sex'=>'male');

echo "<pre>";
//배열의 한 원소 제거
unset($arr['sex']);
print_r($arr);

//배열 전체 제거
unset($arr);
print_r($arr);
echo "</pre>";
?>
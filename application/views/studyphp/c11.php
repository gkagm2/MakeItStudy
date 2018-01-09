<!--제목-->
<h3>배열의 정렬</h3>
<pre>
sort : 값을 기준으로 정렬하여 순서대로 인덱스 배열을 구성
rsort : 값을 기준으로 내림차순 정렬하여 순서대로 인덱스 배열을 구성
asort : 값을 기준으로 정렬하되 키와 값의 관계를 유지
arsort : 값을 기준으로 내림차순 정렬하되 키와 값의 관계를 유지
ksort : 키를 기준으로 정렬하되 키와 관계를 유지
krsort : 키를 기준으로 내림차순 정렬하되 키와 값의 관계를 유지
natsort : natural order 알고리즘을 사용하여 정렬하되 키와 값의 관계를 유지
natcasesort : 대소문자 구분없이 narsort 실행
</pre>


<!--코드-->
<hr><h4>sort() 소스코드</h4> <hr>
<pre>
$fruits = array('a'=>"lemon",'b'=>"orange",'c'=>"banana",'d'=>"apple");
sort($fruits);

echo "< pre>";
print_r($fruits);
echo "< /pre>";
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
$fruits = array('a'=>"lemon",'b'=>"orange",'c'=>"banana",'d'=>"apple");
sort($fruits);

echo "<pre>";
print_r($fruits);
echo "</pre>";
?>
<pre>
sort()함수를 이용하여 정렬하면 키와 값의 관계가 유지되지 않는다.
</pre>

<!--코드-->
<hr><h4>asort() 소스코드</h4> <hr>
<pre>
$fruits = array('a'=>"lemon",'b'=>"orange",'c'=>"banana",'d'=>"apple");
asort($fruits);

echo "< pre>";
print_r($fruits);
echo "< /pre>";
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
$fruits = array('a'=>"lemon",'b'=>"orange",'c'=>"banana",'d'=>"apple");
asort($fruits);

echo "<pre>";
print_r($fruits);
echo "</pre>";
?>
<pre>
키와 값의 연관 관계를 유지하면서 정렬을 합니다. asort에서 a는 연관 배열(associative array)을 뜻한다.
</pre>


<!--코드-->
<hr><h4>ksort() 소스코드</h4> <hr>
<pre>
$fruits = array('a'=>"lemon",'b'=>"orange",'c'=>"banana",'d'=>"apple");
ksort($fruits);

echo "< pre>";
print_r($fruits);
echo "< /pre>";
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
$fruits = array('a'=>"lemon",'b'=>"orange",'c'=>"banana",'d'=>"apple");
ksort($fruits);

echo "<pre>";
print_r($fruits);
echo "</pre>";
?>
<pre>
ksort() 함수는 값이 아닌 키를 기준으로 정렬한다. (key sort)
</pre>

<!--코드-->
<hr><h4>natsort() 소스코드</h4> <hr>
<pre>
$arr = array("img12.png", "img10.png", "img2.png", "img1.png");
natsort($arr);

echo "< pre>";
print_r($arr);
echo "< /pre>";
</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php
$arr = array("img12.png", "img10.png", "img2.png", "img1.png");
natsort($arr);

echo "<pre>";
print_r($arr);
echo "</pre>";
?>
<pre>
natcasesort()함수는 대소문자 구분없이 natrual odrer정렬을 한다.
</pre>



<!--코드-->
<hr><h4>소스코드</h4> <hr>
<pre>

</pre>

<!--결과-->
<hr><h4>결과</h4> <hr>
<?php

?>
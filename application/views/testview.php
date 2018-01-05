<?php



$output = `ls -al`;
echo "<pre>$output</pre>";



$a = array("a" => "사과", "b"=> "배", "c"=>"바나나");
foreach($a as $d){
    echo " " .$d;
} 


echo "---------------------";


$name = "ddd";
$str = <<<EOD

"$name";
문자열이라네~ 
나도 문자열이라네~
EOD;


echo $str;
$name = "아아아앙";

$str = <<<'EEE'
문자문자 "$name"입니다.
문자열이 해석되지 않는다.
EEE;

echo $str;




?>

<?php
var_dump($_FILES);
ini_set("display_errors", "1");
$uploaddir = 'C:\Bitnami\wampstack-7.1.12-0\apache2\htdocs\static\user\\';
$uploadfile = $uploaddir . basename($_FILES['user_upload_file']['name']);

// echo "uploaddir : ". $uploaddir;
// echo "  uploadfile : ". $uploadfile;
// echo '<pre>';

//move_uploaded_file은 실제 파일이름, 경로 의 인자를 받는다
//true와 false 리턴. 
if(move_uploaded_file($_FILES['user_upload_file']['tmp_name'], $uploadfile)){
    echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
} else {
    print "파일 업로드 공격의 가능성이 있습니다.!\n";
}

echo "자세한 디버깅 정보입니다.";
print_r($_FILES);
print "</pre>";
?>
<img src="/static/user/<?=$_FILES['user_upload_file']['name']?>" onError=""/>


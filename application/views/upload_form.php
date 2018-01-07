<!-- enctype="multipart/form_data" 이 있어야만 서버로 전송이 된다.-->
<form action="/index.php/topic/upload_receive" method="POST" enctype="multipart/form-data">
    <input type="file" name="user_upload_file" />
    <input type="submit" />
</form>

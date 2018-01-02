<form action="./add" method="post" class='span10'>
    <?php echo validation_errors(); ?>

    <!--placeholder는 텍스트입력 영역 안에 반투명하게 텍스트를 띄움-->
    <input type='text' name='title' placeholder='제목' class='span12'/>
    <textarea name="description" placeholder="본문" rows="15" class="span12"></textarea></textarea>
    <input type="submit" class="btn">
</form>


<?php

foreach($list as $lt){
    ?>
    <li><a href="/test/get/<?=$lt->id?>"><?=$lt->name?></a></li>
    
    <?php
}
?>
<h2><?=$title?></h2>

<?php if(isset($messages)):?>
        <?php foreach($messages as $row):?>
            <li class="mb-2">Customer <?=$row['name']?> texted this <?=$row['message']?> at: <?=date("d-m-Y", strtotime($row['created_at']))?></li>
        <?php endforeach?>

<?php endif?>
<?php
error_reporting(0);

if (!defined('AppiEngine')) {
    header( "refresh:0; url=/");
}

global $qb;
$rules = $qb->createQueryBuilder('rules')->selectSql()->executeQuery()->getResult();
?>

<div>
    <div class="container bw-text">
        <div class="row">
            <div class="col s12">
                <ul class="tabs transparent">
                    <?php
error_reporting(0);
                    foreach ($rules as $item)
                        echo '<li class="tab col ' . $item['col'] . ' transparent"><a class="white-text" href="#tab' . $item['id'] . '">' . $item['name'] . '</a></li>';
                    ?>
                </ul>
            </div>
            <?php
error_reporting(0);
            foreach ($rules as $item)
                echo '<div id="tab' . $item['id'] .'" class="col s12">' . nl2br(htmlspecialchars_decode($item['text'])) . '</div>';
            ?>
        </div>
    </div>
</div>
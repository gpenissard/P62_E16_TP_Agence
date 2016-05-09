<?php
    require_once('data/data.php');
?>
<?php require_once ('views/page_top.php'); ?>
<div id="main">
    <!--Code html spécifique -->
    <?php /*Affichage du catalogue*/ ?>
    <ul>
        <?php foreach ($data as $id => $item) { ?>
            <li><a href="detail.php?item_id=<?= $id ?>">
                    <div>
                    <p><?= $item['nom'] ?>, <span class=".prix"><?= $item['prix'] ?></span></p>
                    <img src="<?= $item['photo'] ?>" alt=""/>
                </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<?php require_once ('views/page_bottom.php'); ?>


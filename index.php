<?php
require_once('data/data.php');

?>

<?php require_once ('views/page_top.php'); ?>
<div id="main">
    <!-- Liens vers les categories du catalogue -->
    <div id="liens_categories">
        <ul>
            <?php foreach ($categories as $cat_id => $categorie) { ?>
                <li><a href="catalogue.php?cat_id=<?= $cat_id ?>"><?= $categorie ?></a></li>
            <?php } ?>
        </ul>


    </div>
    <!--Code html spécifique -->
</div>
<?php require_once ('views/page_bottom.php'); ?>


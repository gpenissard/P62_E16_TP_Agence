<?php
require_once('defines.php');
require_once('db/conn.php');
require_once('utils/login_out.php');
$categories = get_categories();
//var_dump($categories);

?>

<?php require_once ('views/page_top.php'); ?>
<div id="main">
    <!-- Liens vers les categories du catalogue -->
    <div id="liens_categories">
        <ul>
            <?php foreach ($categories as $cat) { ?>
                <li><a href="catalogue.php?cat_id=<?= $cat['id'] ?>"><?= $cat['name'] ?></a></li>
            <?php } ?>
        </ul>


    </div>
    <!--Code html spécifique -->
</div>
<?php require_once ('views/page_bottom.php'); ?>


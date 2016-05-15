<?php
require_once('defines.php');
require_once('db/conn.php');
require_once('utils/login_out.php');

//    var_dump($_GET);
$item_id = 0; // Initialiser au premier des items
if (array_key_exists('item_id', $_GET)) {
    $item_id = $_GET['item_id'];
}
// Il faut vérifier que la valeur de l'id est bonne
$item = get_truc($item_id);
?>
<?php require_once ('views/page_top.php'); ?>
<div id="main">
    <?php if (is_null($item)) { ?>
        <p>Ce truc n'existe pas !</p>
    <?php } else { ?>
        <div>
            <p><?= $item['name'] ?>, <span class=".prix"><?= $item['price'] ?></span></p>
            <img src="<?= IMAGE_PATH . '/' . $item['picture'] ?>" alt=""/>
        </div>
    <?php } ?>
    <!--Code html spécifique -->
</div>
<?php require_once ('views/page_bottom.php'); ?>


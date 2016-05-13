<?php
require_once('data/data.php');
require_once('utils/login_out.php');

//    var_dump($_GET);
$item_id = 0; // Initialiser au premier des items
if (array_key_exists('item_id', $_GET)) {
    $item_id = $_GET['item_id'];
}
// Il faut vérifier que la valeur de l'id est bonne
$item = $data[$item_id];
?>
<?php require_once ('views/page_top.php'); ?>
<div id="main">
    <div>
        <p><?= $item['nom'] ?>, <span class=".prix"><?= $item['prix'] ?></span></p>
        <img src="<?= $item['photo'] ?>" alt=""/>
    </div>

    <!--Code html spécifique -->
</div>
<?php require_once ('views/page_bottom.php'); ?>


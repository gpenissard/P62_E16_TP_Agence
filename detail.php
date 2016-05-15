<?php
require_once('defines.php');
require_once('db/conn.php');
require_once('utils/login_out.php');
require_once('utils/panier.php');

//    var_dump($_GET);
$id_truc = 0; // Initialiser au premier des items
if (array_key_exists('item_id', $_GET)) {
    $id_truc = $_GET['item_id'];
}
// Il faut vérifier que la valeur de l'id est bonne
$truc = get_truc($id_truc);
?>
<?php require_once ('views/page_top.php'); ?>
<div id="main">
    <?php if (is_null($truc)) { ?>
        <p>Ce truc n'existe pas !</p>
    <?php } else { ?>
        <div>
            <p><?= $truc['name'] ?>, <span class=".prix"><?= $truc['price'] ?></span></p>
            <div id="card_handling"><input type="number" class="card_item_qty" data-card-item-id="<?= $id_truc ?>" value="<?= array_key_exists($id_truc, $panier) ? $panier[$id_truc][PSESS_CARD_QTY] : 0?>" min="0"/></div>
            <img src="<?= IMAGE_PATH . '/' . $truc['picture'] ?>" alt=""/>
        </div>
    <?php } ?>
    <!--Code html spécifique -->
</div>
<?php require_once ('views/page_bottom.php'); ?>


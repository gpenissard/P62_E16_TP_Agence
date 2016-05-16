<?php
require_once('defines.php');
require_once('db/conn.php');
require_once('utils/login_out.php');
require_once('utils/panier.php');

//    var_dump($_GET);
$id_article = 0; // Initialiser au premier des items
if (array_key_exists('item_id', $_GET)) {
    $id_article = $_GET['item_id'];
}
// Il faut vérifier que la valeur de l'id est bonne
$article = get_article($id_article);
?>
<?php require_once ('views/page_top.php'); ?>
<div id="main">
    <?php if (is_null($article)) { ?>
        <p>Cet article n'existe pas !</p>
    <?php } else { ?>
        <div>
            <p><?= get_right_encoding($article['name']) ?>, <span class=".prix"><?= $article['price'] ?></span></p>
            <div id="card_handling"><input type="number" class="card_item_qty" data-card-item-id="<?= $id_article ?>" value="<?= array_key_exists($id_article, $panier) ? $panier[$id_article][PSESS_CARD_QTY] : 0?>" min="0"/></div>
            <img src="<?= IMAGE_PATH . '/' . $article['picture'] ?>" alt=""/>
        </div>
    <?php } ?>
    <!--Code html spécifique -->
</div>
<?php require_once ('views/page_bottom.php'); ?>


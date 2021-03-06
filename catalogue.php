<?php
require_once('defines.php');
require_once('db/conn.php');
require_once('utils/login_out.php');
require_once('utils/panier.php');

$categories = get_categories();
//var_dump($categories);
// Est-ce qu'il y a une categorie (cat_id)  présente dans l'url ?
$cat_id = false; // Initialiser u premier des items
if (array_key_exists('cat_id', $_GET) && array_key_exists($_GET['cat_id'], $categories)) {
    $cat_id = $_GET['cat_id'];
}
$articles = get_article_list($cat_id);
//var_dump($articles);

?>
<?php require_once('views/page_top.php'); ?>
<div id="main">
    <?php
    // Si il y a une categorie, afficher son nom
    if (false !== $cat_id) {
        echo "<h2>Les items de la catégorie " . $categories[$cat_id]['name'] . "</h2>";
    }
    ?>

    <?php
    /* Affichage du catalogue */
    if (empty($articles)) {
        echo "<p>Cette catégorie est vide !.</p>";
    } else {
    ?>
    <ul id="catalogue">
        <?php
        foreach ($articles as $id => $article) {
            //var_dump($article);
            ?>
            <li class="article"><a href="detail.php?item_id=<?= $id ?>">
                    <div>
                        <p><?= get_right_encoding($article['name']) ?>
                            , <span class=".prix"><?= $article['price'] ?></span>
                            , <span class=".categorie"><?= $categories[$article['category_id']]['name'] ?></span>
                        </p>
                        <img src="<?= $article['picture'] ?>" alt=""/>
                    </div>
                </a>
            </li>
            <?php
        } // foreach
        } // else if empty
        ?>
    </ul>
</div>
<?php require_once('views/page_bottom.php'); ?>


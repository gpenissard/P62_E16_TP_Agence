<?php
require_once('conn.php');

// Sélectionner tous les items
$queryStr = "SELECT * FROM item";
// Execution de la commande (Un select)
$res = $mysqli->query($queryStr);
// Récupération des données
$items = array();
if ($res && ($res->num_rows > 0)) {
    while ($valeurs = $res->fetch_assoc()) {
        $items[] = $valeurs;
    };
};

// Sélectionner tous les items d'une catégorie en particulier
$queryStr = "SELECT * FROM item WHERE category_id=2";
// Execution de la commande (Un select)
$res = $mysqli->query($queryStr);
// Récupération des données
$items_cat2 = array();
if ($res && ($res->num_rows > 0)) {
    while ($valeurs = $res->fetch_assoc()) {
        $items_cat2[] = $valeurs;
    };
};

require_once('password_functs.php');
var_dump(user_authenticate('gp', 'gp'));
// Ajouter un enregistrement
/*$queryString = "INSERT INTO ma_table (nom,age) VALUES ('from php', 44)";
$res = $mysqli->query($queryString);
// Est-ce que la requète a bien marché ?
$resultat_insertion = false;
if ($res) {
    $resultat_insertion = $mysqli->insert_id;
};
var_dump($resultat_insertion);*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Page de présentation DB_kitDem_lite</title>
</head>
<body>
<h2>Tous les items</h2>
<ul>
    <?php foreach ($items as $item) { ?>
        <li><?php echo utf8_encode($item['name']),',', $item['description']; ?></li>
    <?php } ?>
</ul>

<h2>Tous les items de la catégorie 2</h2>
<ul>
    <?php foreach ($items_cat2 as $item) { ?>
        <li><?php echo utf8_encode($item['name']),',', $item['description']; ?></li>
    <?php } ?>
</ul>
</body>
</html>



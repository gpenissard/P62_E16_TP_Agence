<?php
require_once(ROOT_DIR . 'db/defines.php');

// Connection
$mysqli = new mysqli(CONN_HOST, CONN_USER, CONN_PWD, DBNAME);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/**
 * Fournit tous les articles enregistrés dans la table article
 * Si un id de catégorie est fourni, fournit seulement les articles de cette catégorie
 * @param bool $cat_id
 * @return array
 */
function get_article_list($cat_id=false) {
    global $mysqli;
// Sélectionner tous les articles (toutes les colonnes)
    $queryStr = 'SELECT * FROM article';
    // Si la catégorie est précisée, on ajoute une clause WHERE dans la requête
    if (false !== $cat_id) {
        $queryStr .= " WHERE `category_id` = " . $mysqli->real_escape_string($cat_id);
    }
// Execution de la requête (un select)
    $res = $mysqli->query($queryStr);
// Récupération des données
    $resultat = array();
    if ($res && ($res->num_rows > 0)) {
        while ($article = $res->fetch_assoc()) {
            $resultat[$article['id']] = $article;
        };
    };
    return $resultat;
}

/**
 * Fournit un article de la table article à partir de son id
 * @param int $id
 * @return array
 */
function get_article($id) {
    global $mysqli;
// Sélectionner tous les articles (toutes les colonnes)
    $queryStr = 'SELECT * FROM article WHERE `id` = ' . $mysqli->real_escape_string($id);
// Execution de la requête (un select)
    $res = $mysqli->query($queryStr);
// Récupération des données
    $resultat = null;
    if ($res && ($res->num_rows > 0)) {
        while ($article = $res->fetch_assoc()) {
            $resultat = $article;
        };
    };
    return $resultat;
}

/**
 * Fournit toutes les catégories de articles enregistrées dans la table article_category
 * @return array
 */
function get_categories() {
    global $mysqli;
// Sélectionner toutes les categories (toutes les colonnes)
    $queryStr = 'SELECT * FROM article_category';
// Execution de la requête (un select)
    $res = $mysqli->query($queryStr);
// Récupération des données
    $resultat = array();
    if ($res && ($res->num_rows > 0)) {
        while ($category = $res->fetch_assoc()) {
            $resultat[$category['id']] = $category;
        };
    };
    return $resultat;
}

// Ajouter un enregistrement
/*$queryString = "INSERT INTO ma_table (nom,age) VALUES ('from php', 44)";
$res = $mysqli->query($queryString);
// Est-ce que la requète a bien marché ?
$resultat_insertion = false;
if ($res) {
    $resultat_insertion = $mysqli->insert_id;
};
var_dump($resultat_insertion);*/

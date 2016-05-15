<?php
// Connection
// Constantes rassemblant les infos de connexion et de schéma de la DB
define('CONN_HOST', '127.0.0.1');
define('CONN_USER', 'root');
define('CONN_PWD', '');
define('DBNAME', 'P62_DBkitDem_lite');

$mysqli = new mysqli(CONN_HOST, CONN_USER, CONN_PWD, DBNAME);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/**
 * Fournit tous les trucs enregistrés dans la table truc
 * Si un id de catégorie est fourni, fournit seulement les trucs de cette catégorie
 * @param bool $cat_id
 * @return array
 */
function get_truc_list($cat_id=false) {
    global $mysqli;
// Sélectionner tous les trucs (toutes les colonnes)
    $queryStr = 'SELECT * FROM truc';
    // Si la catégorie est précisée, on ajoute une clause WHERE dans la requête
    if (false !== $cat_id) {
        $queryStr .= " WHERE `category_id` = " . $mysqli->real_escape_string($cat_id);
    }
// Execution de la requête (un select)
    $res = $mysqli->query($queryStr);
// Récupération des données
    $resultat = array();
    if ($res && ($res->num_rows > 0)) {
        while ($truc = $res->fetch_assoc()) {
            $resultat[$truc['id']] = $truc;
        };
    };
    return $resultat;
}

/**
 * Fournit un truc de la table truc à partir de son id
 * @param int $id
 * @return array
 */
function get_truc($id) {
    global $mysqli;
// Sélectionner tous les trucs (toutes les colonnes)
    $queryStr = 'SELECT * FROM truc WHERE `id` = ' . $mysqli->real_escape_string($id);
// Execution de la requête (un select)
    $res = $mysqli->query($queryStr);
// Récupération des données
    $resultat = null;
    if ($res && ($res->num_rows > 0)) {
        while ($truc = $res->fetch_assoc()) {
            $resultat = $truc;
        };
    };
    return $resultat;
}

/**
 * Fournit toutes les catégories de trucs enregistrées dans la table truc_category
 * @return array
 */
function get_categories() {
    global $mysqli;
// Sélectionner toutes les categories (toutes les colonnes)
    $queryStr = 'SELECT * FROM truc_category';
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

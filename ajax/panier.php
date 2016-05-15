<?php
header("Content-type: text/javascript; charset=utf-8");
header("Access-Control-Allow-Origin: *");
//response.__setitem__("Content-type", "application/json")

require_once('../db/conn.php');
require_once('../utils/login_out.php');
require_once('../utils/panier.php');

//$panier=array(); // Ne décommenter (1 exécution) que pour VIDER le panier

// Les paramètres de la queryString
define('PGET_OPERATION', 'operation');
define('PGET_ID_ARTICLE', 'id');
define('PGET_QTY_ARTICLE', 'qty');
define('PGET_OP_MAJ', 'op_maj'); // Mettre à jour la quantité d'un article dans le panier
define('PGET_OP_RETIRER', 'op_retirer'); // Retirer complètement un article du panier
define('PGET_OP_VIDER_TOUT', 'op_vider_tout'); // Retirer complètement tous les articles du panier
define('PGET_OP_STATUS', 'op_status'); // Demander le contenu du panier

// On part de la présence d'une action dans la queryString
if (array_key_exists(PGET_OPERATION, $_GET)) { // Il y a un paramètre 'action' dans la queryString
    switch ($_GET[PGET_OPERATION]) {
        case PGET_OP_STATUS :
            break;
        case PGET_OP_MAJ :
            if (array_key_exists(PGET_QTY_ARTICLE, $_GET) && array_key_exists(PGET_ID_ARTICLE, $_GET)) {
                $id_article = $_GET[PGET_ID_ARTICLE];
                // Est-ce qu'il existe un article ayant cet id
                if ( ! is_null($article = get_truc($id_article)) && in_array($_GET[PGET_QTY_ARTICLE], range(0,10))) {
                    if (0 == $_GET[PGET_QTY_ARTICLE]) {
                        unset($panier[$id_article]);
                    } else {
                        // Si l'article n'est pas déj`dans le panier, on l'y ajoute
                        if ( ! array_key_exists($id_article, $panier)) {
                            $panier[$id_article][PSESS_CARD_NAME] = $article['name'];
                            $panier[$id_article][PSESS_CARD_PRICE] = $article['price'];
                        }
                        // Maj quantité
                        $panier[$id_article][PSESS_CARD_QTY] = $_GET[PGET_QTY_ARTICLE];
                    }
                }
            }
            break;
        case PGET_OP_RETIRER :
            if (array_key_exists(PGET_ID_ARTICLE, $_GET) && array_key_exists($id_article = $_GET[PGET_ID_ARTICLE], $panier)) {
                unset($panier[$id_article]);
            }
            break;
        case PGET_OP_VIDER_TOUT :
            break;
        default:
            // Afficher erreur sur valeur action
    }
}

// Sortie résultat
echo json_encode($panier);
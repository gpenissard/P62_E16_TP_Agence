<?php
define('PSESS_CARD', 'user_card');
define('PSESS_CARD_NAME', 'name');
define('PSESS_CARD_QTY', 'qty');
define('PSESS_CARD_PRICE', 'price');

// Activation des sessions (si pas déjà activées)
// Activation des sessions (si pas déjà activées)
require_once('common.php');
if ( ! is_session_started()) {
    session_start();
}

// Si la variable panier n'existe pas en session, on la crée
if ( ! array_key_exists(PSESS_CARD, $_SESSION)) {
    $_SESSION[PSESS_CARD] = array();
};

$panier = &$_SESSION[PSESS_CARD]; // Référence sur le panier dans la session;

<?php
define('PSESS_USERNAME', 'username');
$login_message = ''; // Message à afficher en cas de bonne ou de mauvaise connexion
$user_is_loggedIn = false; // Indique que l'utilisateur est connecté ou ne l'est pas
$username = null; // Valeur du username
$password = null; // Valeur du password

// Activation des sessions (si pas déjà activées)
if (PHP_SESSION_NONE === session_status()) {
    session_start();
}

 // L'utilisateur est-il en train de se connecter ?
if (array_key_exists('connect', $_POST)
    && array_key_exists('username', $_POST)
    && array_key_exists('password', $_POST)) {
    // L'utilisateur cherche à se connecter ....
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    require_once('db/password_functs.php'); // Appel du script qui gère l'authentification
    if (user_authenticate($username, $password)) {
        // L'utilisateur est authentifié
        $_SESSION[PSESS_USERNAME] = $username;
        $user_is_loggedIn = true;
        $login_message = "Bonjour $username";
    } else {
        $login_message = 'L\'identificateur et le mot de passe fournis ne concordent pas.';
    }
} elseif (array_key_exists('disconnect', $_POST)) {
    // L'utilisateur cherche à se déconnecter ....
    unset($_SESSION[PSESS_USERNAME]); // Supprimer la variable 'username' de la session
    $user_is_loggedIn = false;
} else { // Cas du GET
    $user_is_loggedIn = array_key_exists(PSESS_USERNAME, $_SESSION);
    if ($user_is_loggedIn) {
        $username = $_SESSION[PSESS_USERNAME];
        $login_message = "Bonjour $username";
    }
}

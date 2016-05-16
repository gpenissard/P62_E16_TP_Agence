<?php

/* Savoir si une session est démarrée */
function is_session_started()
{
//  echo phpversion();
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

/**
 * Traiter différemment l'encodage des chaines suivant la version de PHP
 * Workaround pb encodage sur Sentora vs local
 */
function get_right_encoding($str)
{
    return version_compare(phpversion(), '5.4.0', '>=') ? $str : utf8_encode($str);
}
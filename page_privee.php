<?php
require_once('utils/login_out.php');

?>

<?php require_once ('views/page_top.php'); ?>
<?php
// On protège la page des utilisateurs non connectés
if ( ! $user_is_loggedIn) {
    header('Location: index.php'); // Redirection HTTP vers la page index
    exit(); // Pour éviter
}
?>
<div id="main">
    <h2> Ceci est une page privée que l'utilisateur ne peut consulter que s'il est conncté</h2>
</div>
<?php require_once ('views/page_bottom.php'); ?>


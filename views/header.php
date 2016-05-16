<?php
?>
<header>
<!-- Menu -->
<ul>
    <li><a href="index.php">Accueil</a></li>
    <li><a href="catalogue.php">Catalogue</a></li>
<?php if ($user_is_loggedIn) { ?>
    <li><a href="page_privee.php">Page privée</a></li>
<?php } ?>
</ul>
<!-- Formulaire de login / logout  -->
<?php require_once('login_out_form.php'); ?>
<!-- Panier -->
<details id="card">
    <summary>Votre panier (<span class="card_count"><?= count($panier)?></span>)</summary>
    <ul></ul><!-- Liste des items de panier -->
</details>
</header>

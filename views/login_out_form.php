<div id="login_logout_form">
    <span><?php echo $login_message; ?></span>
    <?php if ($user_is_loggedIn) { ?>
        <form method="post">
            <input type="submit" name="disconnect" id="se_deconnecter" value="Déconnexion"/>
        </form>
    <?php } else { ?>
        <form method="post">
            <input type="text" class="small" name="username" id="username" value="<?php echo isset($username) ? $username : ''; ?>"/>
            <input type="password" class="small" name="password" id="password" value="<?php echo isset($password) ? $password : ''; ?>"/>
            <input type="submit" class="small" name="connect" id="se_connecter" value="Connexion"/>
        </form>
    <?php } ?>
</div>
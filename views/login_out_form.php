<div id="login_logout_form">
    <span><?php echo $login_message; ?></span>
    <?php if ($user_is_loggedIn) { ?>
        <form method="post">
            <input type="submit" name="disconnect" id="se_deconnecter" value="Déconnexion"/>
        </form>
    <?php } else { ?>
        <form method="post">
            <input type="text" name="username" id="username" value="<?php echo isset($username) ? $username : ''; ?>"/><br>
            <input type="password" name="password" id="password" value="<?php echo isset($password) ? $password : ''; ?>"/><br>
            <input type="submit" name="connect" id="se_connecter" value="Connexion"/>
        </form>
    <?php } ?>
</div>
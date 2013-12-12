<div id="frameLogin">
    <div id="hugeLogo"></div>
    <div id="orangeBox">
        <form action="" method="POST">
			<?php if(@$error):?>
            <h2><?php echo $error; ?></h2>
            <?php endif; ?>
            <table>
                <tr>
                    <td><input name="accountnaam" value="" type="text" placeholder="Gebruikersnaam" /></td>
                </tr>
                <tr>
                    <td><input name="wachtwoord" value="" type="password" placeholder="Wachtwoord" /></td>
                </tr>
                <tr>
                    <td><input class="but1" type="submit" value="Inloggen" /></td>
                </tr>
            </table>
        </form>
        <div class="link1">
            <a href="register.html">Nog geen account?</a>
        </div>
    </div>
    <div id="welcomeMsg">
        <h1>Speel gratis deze alcohol & drugs sim, registreer je direct!</h1>
    
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
</div>
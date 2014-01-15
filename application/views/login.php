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
    
        <p>Creëer je eigen persoonlijke avatar en stap in een wereld vol feest. 
			Leid je eigen leven en ontdek de gevaren van alcohol en drugs.
			<br />
			Klik hier om de bijbehorende android App te downloaden.
        </p>
    </div>
</div>
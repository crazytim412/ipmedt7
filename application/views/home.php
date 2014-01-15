<?php $this->load->view("common/header");?>
<div id="frameLogin">
    <div id="hugeLogo"></div>
    <?php if(@$error):?>
    <div class="error">
    <?php echo $error; ?>
    </div>
    <?php endif; ?>
    <div id="orangeBox">
        <form action="" method="POST">
            <table>
                <tr>
                    <td><input type="text" placeholder="E-mailadres" name="username" /></td>
                </tr>
                <tr>
                    <td><input type="password" placeholder="Wachtwoord" name="password" /></td>
                </tr>
                <tr>
                    <td><input class="but1" type="submit" value="Inloggen" /></td>
                </tr>
            </table>
        </form>
        <div class="link1">
            <a href="/index.php/register">Nog geen account?</a>
        </div>
    </div>
    <div id="welcomeMsg">
        <h1>Speel gratis deze alcohol & drugs sim, registreer je direct!</h1>
        <p>Creëer je eigen persoonlijke avatar en stap in een wereld vol feest. 
			Leid je eigen leven en ontdek de gevaren van alcohol en drugs.
		</p>
		<a href="http://konscio.nl/app/konscio1.apk">
			<div class="androidApp">Klik hier om de bijbehorende <b>Android App</b> te downloaden</div>
		</a>
        
    </div>
</div>
<?php $this->load->view("common/footer");?>
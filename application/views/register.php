<?php $this->load->view("common/header");?>
<div id="frameLogin">
    <div id="hugeLogo"></div>
	
		<?php if(@$error): ?>
		<div class="error">
			<?php echo $error; ?>
		</div>
		<?php endif; ?>
    <div id="orangeBox">
        <h1>Registreren</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><input name="email" value="" type="text" placeholder="E-mailadres" /></td>
                </tr>
                <tr>
                    <td><input name="password" value="" type="password" placeholder="Wachtwoord" /></td>
                </tr>
                <tr>
                    <td><input name="passwordrepeat" value="" type="password" placeholder="Wachtwoord nogmaals" /></td>
                </tr>
				<tr>
                    <td><input name="day" value="" type="number" min="1" max="31" placeholder="Geboortedag" /></td>
                </tr>
				<tr>
                    <td><input name="month" value="" type="number" min="1" max="12" placeholder="Geboortemaand" /></td>
                </tr>
				<tr>
                    <td><input name="year" value="" type="number" min="1900" max="2014" placeholder="Geboortejaar" /></td>
                </tr>
                <tr>
                    <td><input class="but1" type="submit" value="Verzenden" /></td>
                </tr>
            </table>
        </form>
        <div class="link1">
            <a href="/">Ik heb al een account.</a>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer");?>
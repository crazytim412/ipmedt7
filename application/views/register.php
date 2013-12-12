<?php $this->load->view("common/header");?>
<div id="frameLogin">
    <div id="hugeLogo"></div>
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
                    <td><input name="password" value="" type="password" placeholder="Wachtwoord nogmaals" /></td>
                </tr>
				<tr>
                    <td><input name="day" value="" type="number" min="1" max="31" placeholder="Geboorte Dag" /></td>
                </tr>
				<tr>
                    <td><input name="month" value="" type="number" min="1" max="12" placeholder="Geboorte Maand" /></td>
                </tr>
				<tr>
                    <td><input name="year" value="" type="number" min="1900" max="1998" placeholder="Geboorte Jaar" /></td>
                </tr>
                <tr>
                    <td><input class="but1" type="submit" value="Verzenden" /></td>
                </tr>
            </table>
        </form>
        <div class="link1">
            <a href="login.html">Ik heb al een account.</a>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer");?>
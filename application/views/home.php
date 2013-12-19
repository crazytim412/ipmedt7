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
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
</div>
<?php $this->load->view("common/footer");?>
<div class="centre">
    <form method="post" action="ControllerParametre_Profil.php">
    <p>
        <label for="city">Identifiant</label>
        <input type="text" class="typetext" name="identifiant" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Mot de passe</label>
        <input type="password" class="typetext" name="password" value="" placeholder="" />
    </p>
        <input class="btnbleu" type="submit" name="btnProfil" value="Modifier">

    </form>
    <?php if($message): ?>
    <p><?php echo $message ?> </p>
    <?php endif; ?>
</div>

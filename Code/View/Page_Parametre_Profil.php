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
        <div class="infoparametre">
        <input class="btnbleu" type="submit" name="btnProfil" value="Modifier">
        </div>
    </form>
    <?php if($message): ?>
    <?php
    if($verif == false){
        ?><div class="messageerr">
        <?php echo $message ?>
    </div><?php
    }else{
    ?><div class="messagevalide">
        <?php echo $message ?>
    </div><?php
    } endif;
    ?>
</div>

<div class="centre">
    <form action="ControllerParametre_Tuteur.php" method="post">
<p>
    <label for="preTut">Prénom</label>
    <input type="text" class="typetext" name="preTut" value="" placeholder="" id="preTut"/>
</p>
<p>
    <label for="nomTut">Nom</label>
    <input type="text" class="typetext" name="nomTut" value="" placeholder="" id="nomTut"/>
</p>
<p>
    <label for="telTut">Téléphone</label>
    <input type="text" class="typetext" name="telTut" value="" placeholder="" id="telTut"/>
</p>
<p>
    <label for="adrTut">Adresse</label>
    <input type="text" class="typetext" name="adrTut" value="" placeholder="" id="adrTut"/>
</p>
        <p>
            <label for="vilTut">Ville</label>
            <input type="text" class="typetext" name="vilTut" id="vilTut"/>
        </p>
        <p>
            <label for="cpTut">Code Postale</label>
            <input type="number" class="typetext" name="cpTut" id="cpTut"/>
        </p>
<p>
    <label for="mailTut">Mail</label>
    <input type="text" class="typetext" name="mailTut" value="" placeholder="" id="mailTut"/>
</p>
        <p>
            <label for="logTut">Login</label>
            <input type="text" class="typetext" name="logTut" value="" id="logTut"/>
        </p>

        <p>
            <label for="mdpTut">Mot de passe</label>
            <input type="text" class="typetext" name="mdpTut" value="" id="mdpTut"/>
        </p>


<p>
    <label for="nbMaxEtu3">Nombre max d'élèves 3 OLEN</label>
    <input type="number" class="typetext" name="nbMaxEtu3" value="" placeholder="" id="nbMaxEtu3"/>
</p>
<p>
    <label for="nbMaxEtu4">Nombre max d'élèves 4 OLEN</label>
    <input type="number" class="typetext" name="nbMaxEtu4" value="" placeholder="" id="nbMaxEtu4"/>
</p>
<p>
    <label for="nbMaxEtu5">Nombre max d'élèves 5 OLEN</label>
    <input type="number" class="typetext" name="nbMaxEtu5" value="" placeholder="" id="nbMaxEtu5"/>
</p>
</div>
<div class="selectuteur">
<div class="selection">
    <label for="city">Tuteur à modifier</label>
    <select name="tuteur-select" id="dropDown">
        <option value=""></option>
        <?php foreach ($tuts as $tut): ?>
        <option value="<?php echo $tut->getIdUti() ?>"> <?php echo ($tut->getPreUti())[0].".".$tut->getNomUti() ?> </option>
        <?php endforeach; ?>
    </select>
</div>
    <?php
    if($verif == true){
        ?><div class="messageerr">
    <?php echo $Message ?>
</div><?php
    }else{
        ?><div class="messagevalide">
        <?php echo $Message ?>
        </div><?php
        }
    ?>

</div>

    <div class="infoparametre">
    <input type="submit" name="btnAdd" value="Créer" class="btnvert"/>
    <input type="submit" name="btnUpdate" value="Modifier" class="btnbleu"/>
    <input type="submit" name="btnDelete" value="Supprimer" class="btnrouge"/>
    </div>

    </form>
    <script src="../Js/TuteurChangeData.js"></script>
</div>
<div class="centre">
    <form action="ControllerParametre_Entreprise.php" method="post">
    <p>
        <label for="nameEnt">Nom de l'entreprise</label>
        <input type="text" class="typetext" name="nameEnt" value="" placeholder="" id="nameEnt"/>
    </p>
    <p>
        <label for="adrEnt">Adresse de l'entreprise</label>
        <input type="text" class="typetext" name="adrEnt" value="" placeholder="" id="adrEnt"/>
    </p>
    <p>
        <label for="vilEnt">Ville de l'entreprise</label>
        <input type="text" class="typetext" name="vilEnt" value="" placeholder="" id="vilEnt"/>
    </p>
    <p>
        <label for="cpEnt">Code postal de l'entreprise</label>
        <input type="text" class="typetext" name="cpEnt" value="" placeholder="" id="cpEnt"/>
    </p>
    <p>
        <label for="telEnt">Téléphone de l'entreprise</label>
        <input type="text" class="typetext" name="telEnt" value="" placeholder="" id="telEnt"/>
    </p>
    <p>
        <label for="mailEnt">Mail de l'entreprise</label>
        <input type="text" class="typetext" name="mailEnt" value="" placeholder="" id="mailEnt"/>
    </p>
<div class="selectentreprise">
</div>
<div class="selection">
    <label for="entreprise-select">Entreprise à modifier</label>
    <select name="entreprise-select" id="dropDown">
        <option value=""></option>
        <?php foreach ($ents as $ent): ?>
        <option value="<?php echo $ent->getIdEnt(); ?>"><?php echo $ent->getNomEnt(); ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="btnAdd" value="Créer" class="btnvert"/>
    <input type="submit" name="btnUpdate" value="Modifier" class="btnbleu"/>
    <input type="submit" name="btnDelete" value="Supprimer" class="btnrouge"/>
    <?php echo $Message ?>
    </form>
    <script src="../Js/EntrepriseChangeData.js"></script>
</div>
</div>
<div class="centre">
    <form action="ControllerParametre_Maitre_Apprentissage.php" method="post">
    <p>
        <label for="preMA">Prénom du maître d'apprentissage</label>
        <input type="text" class="typetext" name="preMA" value="" placeholder="" id="preMA"/>
    </p>
    <p>
        <label for="nomMa">Nom du maître d'apprentissage</label>
        <input type="text" class="typetext" name="nomMa" value="" placeholder="" id="nomMa"/>
    </p>
    <p>
        <label for="telMA">Téléphone du maître d'apprentissage</label>
        <input type="text" class="typetext" name="telMA" value="" placeholder="" id="telMA"/>
    </p>
    <p>
        <label for="mailMA">Mail du maître d'apprentissage</label>
        <input type="text" class="typetext" name="mailMA" value="" placeholder="" id="mailMA"/>
    </p>
    <p>
        <label for="ent-select">Entreprise</label>
        <select name="ent-select" id="ent-select">
            <option value=""></option>
            <?php foreach ($ents as $ent): ?>
            <option value="<?php echo $ent->getIdEnt() ?>"><?php echo $ent->getNomEnt() ?></option>
            <?php endforeach; ?>
        </select>
    </p>

</div>
<div class="selectmaitre">
<div class="selection">
    <label for="maitre-select">Maître d'apprentissage à modifier</label>
    <select name="maitre-select" id="dropDown">
        <option value=""></option>
        <?php foreach ($mas as $ma): ?>
        <option value="<?php echo $ma->getIdMai() ?>"><?php echo $ma->getNomMai() ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="btnAdd" value="Créer" class="btnvert"/>
    <input type="submit" name="btnUpdate" value="Modifier" class="btnbleu"/>
    <input type="submit" name="btnDelete" value="Supprimer" class="btnrouge"/>
    <?php echo $Message ?>

<script src="../Js/MaitreAppChangeData.js"></script>
</div>
</div>
</form>
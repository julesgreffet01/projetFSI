<div class="centre">
    <form action="ControllerParametre_Specialite.php" method="post">
    <p>
        <label for="libSpe">Nom de la spécialité</label>
        <input type="text" class="typetext" name="libSpe" value="" placeholder="" id="libSpe"/>
    </p>
</div>
<div class="selectespe">
<div class="selection">
    <label for="specialité-select">Spécialité à modifier</label>
    <select name="specialité-select" id="dropDown">
        <option value=""></option>
        <?php foreach ($specs as $spec): ?>
        <option value="<?php echo $spec->getIdSpec() ?>"><?php echo $spec->getNomSpec() ?></option>
        <?php endforeach; ?>
    </select>
    <div class="infoparametre">
    <input type="submit" name="btnAdd" value="Créer" class="btnvert"/>
    <input type="submit" name="btnUpdate" value="Modifier" class="btnbleu"/>
    <input type="submit" name="btnDelete" value="Supprimer" class="btnrouge"/>
    </div>
    <div class="messageerr">
        <?php echo $Message ?>
    </div></div>
</div>



</form>
<script src="../Js/SpecialiteChangeData.js"></script>


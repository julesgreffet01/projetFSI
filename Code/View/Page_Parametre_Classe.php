<form action="ControllerParametre_Classe" method="post">
<div class="centre">
    <p>
        <label for="nom">Nom de la classe</label>
        <input type="text" class="typetext" name="nom" value="" placeholder="" id="nom"/>
    </p>
    <p>
        <label for="nb">Nombre d'étudiant max</label>
        <input type="number" class="typetext" name="nb" value="" placeholder="" id="nb"/>
    </p>
</div>
<div class="selectclass">
<div class="selection">
    <label for="classe-select">Classe à modifier</label>
    <select name="classe-select" id="dropDown">
        <option value=""></option>
        <?php foreach ($clas as $cla): ?>
        <option value="<?php echo $cla->getIdCla() ?>"><?php echo $cla->getLibCla() ?></option>
        <?php endforeach; ?>
    </select>
    <div class="infoparametre">
        <input type="submit" name="btnAdd" value="Créer" class="btnvert"/>
        <input type="submit" name="btnUpdate" value="Modifier" class="btnbleu"/>
        <input type="submit" name="btnDelete" value="Supprimer" class="btnrouge"/>
    </div>
    <?php
    if($verif == false){
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
</div>
    <script src="../Js/ClasseChangeData.js"></script>
</form>

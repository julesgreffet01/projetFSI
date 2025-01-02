<form action="" method="post">
<div class="centre">
    <p>
        <label for="Customize Toolbar…">Classe</label>
        <select name="classe-select" id="classe-select">
            <option value=""></option>
            <?php foreach($clas as $cla): ?>
            <option value="<?php echo $cla->getIdCla() ?>"><?php echo $cla->getLibCla() ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="etu-select">Nom de l'élève</label>
        <select name="etu-select" id="etu-select">
            <option value="">Selectionner une classe</option>
        </select>
    </p>
    <p>
        <label for="tut-select">Nom du tuteur</label>
        <select name="tut-select" id="tut-select">
            <option value=""></option>
            <?php foreach ($tuts as $tut): ?>
            <option value="<?php echo $tut->getIdUti() ?>"><?php echo $tut->getNomUti() ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <div class="infoparametre">
        <input type="submit" name="btnAffect" value="Affecter" class="btnbleu"/>
    </div>
    </form>
<?php echo $Message ?>
    <script src="../Js/AffectationChangeData.js"></script>
</div>



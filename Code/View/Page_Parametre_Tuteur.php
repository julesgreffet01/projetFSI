<div class="centre">
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
    <label for="cityTut">Mail</label>
    <input type="text" class="typetext" name="cityTut" value="" placeholder="" id="cityTut"/>
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
<div class="selection">
    <label for="city">Tuteur à modifier</label>
    <select name="tuteur-select" id="dropDown">
        <option value=""></option>
        <?php foreach ($tuts as $tut): ?>
        <option value="<?php echo $tut->getIdUti() ?>"> <?php echo $tut->getNomUti() ?> </option>
        <?php endforeach; ?>
    </select>
    <script src="../Js/TuteurChangeData.js"></script>
</div>
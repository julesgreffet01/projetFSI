<form action="ControllerParametre_Etudiant.php">
<div class="centre">
    <p>
        <label for="preEtu">Prénom</label>
        <input type="text" class="typetext" name="preEtu" value="" placeholder="" id="preEtu"/>
    </p>
    <p>
        <label for="nomEtu">Nom</label>
        <input type="text" class="typetext" name="nomEtu" value="" placeholder="" id="nomEtu"/>
    </p>
    <p>
        <label for="telEtu">Téléphone</label>
        <input type="text" class="typetext" name="telEtu" value="" placeholder="" id="telEtu"/>
    </p>
    <p>
        <label for="adrEtu">Adresse</label>
        <input type="text" class="typetext" name="adrEtu" value="" placeholder="" id="adrEtu"/>
    </p>
    <p>
        <label for="vilEtu">Ville</label>
        <input type="text" class="typetext" name="vilEtu" value="" placeholder="" id="vilEtu"/>
    </p>
    <p>
        <label for="cpEtu">Code Postale</label>
        <input type="text" class="typetext" name="cpEtu" value="" placeholder="" id="cpEtu"/>
    </p>
    <p>
        <label for="mailEtu">Mail</label>
        <input type="text" class="typetext" name="mailEtu" value="" placeholder="" id="mailEtu"/>
    </p>
    <p>
        <label for="logEtu">Log</label>
        <input type="text" class="typetext" name="logEtu" value="" placeholder="" id="logEtu"/>
    </p>
    <p>
        <label for="mdpEtu">Mot de passe</label>
        <input type="text" class="typetext" name="mdpEtu" value="" placeholder="" id="mdpEtu"/>
    </p>
    <p>
        <label for="altEtu">Alternance</label>
        <input type="checkbox" class="typecheck" name="altEtu" value="true" id="altEtu"/>
    </p>
    <div id="hidden">
        <p>
            <label for="ent-select">Nom de l'entreprise</label>
            <select name="ent-select" id="ent-select">
                <option value=""></option>
                <?php foreach($ents as $ent): ?>
                    <option value="<?php echo $ent->getIdEnt() ?>"> <?php echo $ent->getNomEnt() ?> </option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="maitre-select">Nom du maître d'apprentissage</label>
            <select name="maitre-select" id="maitre-select">
                <option value=""></option>
                <?php foreach($mas as $ma): ?>
                    <option value="<?php echo $ma->getIdMai() ?>"> <?php echo $ma->getNomMai() ?> </option>
                <?php endforeach; ?>
            </select>
        </p>
    </div>
    <p>
        <label for="class-select">Classe</label>
        <select name="class-select" id="class-select">
            <option value=""></option>
            <?php foreach($clas as $cla): ?>
            <option value="<?php echo $cla->getIdCla() ?>"> <?php echo $cla->getLibCla() ?> </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="spec-select">Spécialisation</label>
        <select name="spec-select" id="spec-select">
            <option value=""></option>
            <?php foreach($spes as $spe): ?>
                <option value="<?php echo $spe->getIdSpec() ?>"> <?php echo $spe->getNomSpec() ?> </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="tut-select">Nom et prénom du Tuteur</label>
        <select name="tut-select" id="tut-select">
            <option value=""></option>
            <?php foreach($tuts as $tut): ?>
                <option value="<?php echo $tut->getIdUti() ?>"> <?php echo $tut->getNomUti() .' '. $tut->getPreUti() ?> </option>
            <?php endforeach; ?>
        </select>
    </p>
</div>
<div class="selectetudiant">
<div class="selection">
    <label for="etu-select">Etudiant à modifier</label>
    <select name="etu-select" id="dropDown">
        <option value=""></option>
        <?php foreach($etus as $etu): ?>
            <option value="<?php echo $etu->getIdUti() ?>"> <?php echo $etu->getNomUti() ?> </option>
        <?php endforeach; ?>
    </select>
</div>
</div>
<div class="infoparametre">
    <input type="submit" name="btnAdd" value="Créer" class="btnvert"/>
    <input type="submit" name="btnUpdate" value="Modifier" class="btnbleu"/>
    <input type="submit" name="btnDelete" value="Supprimer" class="btnrouge"/>
</div>
    <script src = "../Js/EtudiantChangeData.js"></script>
</form>

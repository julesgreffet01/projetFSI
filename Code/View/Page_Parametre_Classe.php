<?php
$titrefichier = "Classe";
$stylecss = "Parametre.css";
$titreparametre = "Classe";
include('header_admin.php');
?>
<div class="centre">
    <p>
        <label for="city">Nom de la classe</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Nombre d'étudiant max</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
</div>
<div class="selectclass">
<div class="selection">
    <label for="city">Classe à modifier</label>
    <select name="classe-select">
        <option value=""></option>
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="goldfish">Goldfish</option>
    </select>
</div>
</div>


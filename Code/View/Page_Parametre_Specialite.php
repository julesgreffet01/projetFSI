<?php
$titrefichier = "Accueil";
$stylecss = "Parametre.css";
$titreparametre = "Spécialité";
include('header_admin.php');
?>
<div class="centre">
    <p>
        <label for="city">Nom de la spécialité</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
</div>
<div class="selectespe">
<div class="selection">
    <label for="city">Spécialité à modifier</label>
    <select name="specialité-select">
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


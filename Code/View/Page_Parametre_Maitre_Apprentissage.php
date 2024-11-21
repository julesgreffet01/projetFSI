<?php
$titrefichier = "Acceuil";
$stylecss = "Parametre.css";
$titreparametre = "Maitre d'apprentissage";
include('header_admin.php');
?>
<div class="centre">
    <p>
        <label for="city">Prénom du maître d'apprentissage</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Nom du maître d'apprentissage</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Téléphone de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Mail de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
</div>
<div class="selection">
    <label for="city">Maître d'apprentissage à modifier</label>
    <select name="maitre-select">
        <option value=""></option>
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="goldfish">Goldfish</option>
    </select>
</div>

<?php
$titrefichier = "Entreprise";
$stylecss = "Parametre.css";
$titreparametre = "Entreprise";
include('header_admin.php');
?>
<div class="centre">
    <p>
        <label for="city">Nom de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Adresse de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Ville de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Code postal de l'entreprise</label>
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
    <p>
        <label for="city">Maître d'apprentissage</label>
        <select name="maitre-select">
            <option value=""></option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="hamster">Hamster</option>
            <option value="parrot">Parrot</option>
            <option value="spider">Spider</option>
            <option value="goldfish">Goldfish</option>
        </select>
    </p>
</div>
<div class="selection">
    <label for="city">Tuteur à modifier</label>
    <select name="entreprise-select">
        <option value=""></option>
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="goldfish">Goldfish</option>
    </select>
</div>

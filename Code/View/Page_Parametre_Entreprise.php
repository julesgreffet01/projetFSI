<?php
$titrefichier = "Entreprise";
$stylecss = "Parametre.css";
$titreparametre = "Entreprise";
include('header_admin.php');
?>
<div class="centre">
    <p>
        <label for="name">Nom de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="adresse">Adresse de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="ville">Ville de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="cp">Code postal de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="tel">Téléphone de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
    <p>
        <label for="city">Mail de l'entreprise</label>
        <input type="text" class="typetext" name="city" value="" placeholder="" />
    </p>
<div class="selectentreprise">
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
</div>
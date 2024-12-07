<div class="alerteadmin">
    <h1>Alerte</h1>
    <p>
        <input type="checkbox" class="coche">
        <label>Visite pour Jules Neuville le 27/09/2025</label>
    </p>
    <p>
        <input type="checkbox" class="coche">
        <label>Visite pour Jules Greffet le 27/09/2025</label>
    </p>
</div>

<div class="centre">
<table class="tableau">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Classe</th>
        <th>Téléphone</th>
        <th>En savoir plus</th>
    </tr>
    <?php foreach ($etus as $etu): ?>
        <tr>
            <td><?php echo ($etu->getNomUti()); ?></td>
            <td><?php echo ($etu->getPreUti()); ?></td>
            <td><?php echo ($etu->getMaClasse()->getLibCla()); ?></td>
            <td><?php echo ($etu->getTelUti()); ?></td>
            <td><a href="ControllerDetail_Etudiant.php?idEtu=<?php echo $etu->getIdUti() ?>" class="voircss">Voir</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
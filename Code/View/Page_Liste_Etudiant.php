<div class="centre">
<table class="tableau">
<tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Classe</th>
    <th>Téléphone</th>
    <th>En savoir plus</th>
</tr>
    <?php foreach ($mesEtus as $etu): ?>
    <?php if ($etu->getMaClasse()){
        $maClasse = $etu->getMaClasse()->getLibCla();
        } else {
            $maClasse = 'Pas assigné(e)';
        }?>
        <tr>
            <td><?php echo ($etu->getNomUti()); ?></td>
            <td><?php echo ($etu->getPreUti()); ?></td>
            <td><?php echo $maClasse; ?></td>
            <td><?php echo ($etu->getTelUti()); ?></td>
            <td><a href="ControllerDetail_Etudiant.php?idEtu=<?php echo $etu->getIdUti() ?>" class="voircss">Voir</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<div class="centre">
<table class="tableau">


    <?php foreach($al1 as $etu): ?>
    <?php if ($dif1Day <= 5): ?>
            <tr>
                <td><img src="../Img/bell.svg" class="bell"></td>
                <td class="roi">Date de visite entreprise en retard pour : <?php echo $etu->getNomUti() ?> </td>
                <td>en retard de <?php if ($years1){ echo $years1?> anné(es), <?php } if ($month1){ echo $month1 ?> mois et <?php } if ($day1){ echo $day1 ?> jour(s) <?php } ?></td>
            </tr>
    <?php elseif ($dif1Day <= 10): ?>
            <tr>
                <td><img src="../Img/bell(1).svg" class="bell"></td>
                <td class="roi">Date de visite entreprise en retard pour : <?php echo $etu->getNomUti() ?> </td>
                <td>en retard de <?php if ($years1){ echo $years1?> anné(es), <?php } if ($month1){ echo $month1 ?> mois et <?php } if ($day1){ echo $day1 ?> jour(s) <?php } ?></td>
            </tr>
    <?php else: ?>
            <tr>
                <td><img src="../Img/bell(2).svg" class="bell"></td>
                <td class="roi">Date de visite entreprise en retard pour : <?php echo $etu->getNomUti() ?> </td>
                <td>en retard de <?php if ($years1){ echo $years1?> anné(es), <?php } if ($month1){ echo $month1 ?> mois et <?php } if ($day1){ echo $day1 ?> jour(s) <?php } ?></td>
            </tr>
    <?php endif; ?>
    <?php endforeach; ?>

    <!-- ------------------- alertesd e bilan2 ------------------ -->

    <?php foreach($al2 as $etu): ?>
        <?php if ($dif2Day <= 5): ?>
            <tr>
                <td><img src="../Img/bell.svg" class="bell"></td>
                <td class="roi">Date de l'oral du bilan 2 pour : <?php echo $etu->getNomUti() ?> </td>
                <td>en retard de <?php if ($years2){ echo $years2?> anné(es), <?php } if ($month2){ echo $month2 ?> mois et <?php } if ($day2){ echo $day2 ?> jour(s) <?php } ?></td>
            </tr>
        <?php elseif ($dif2Day <= 10): ?>
            <tr>
                <td><img src="../Img/bell(1).svg" class="bell"></td>
                <td class="roi">Date de l'oral du bilan 2 pour : <?php echo $etu->getNomUti() ?> </td>
                <td>en retard de <?php if ($years2){ echo $years2?> anné(es), <?php } if ($month2){ echo $month2 ?> mois et <?php } if ($day2){ echo $day2 ?> jour(s) <?php } ?></td>
            </tr>
        <?php else: ?>
            <tr>
                <td><img src="../Img/bell(2).svg" class="bell"></td>
                <td class="roi">Date de l'oral du bilan 2 pour : <?php echo $etu->getNomUti() ?> </td>
                <td>en retard de <?php if ($years2){ echo $years2?> anné(es), <?php } if ($month2){ echo $month2 ?> mois et <?php } if ($day2){ echo $day2 ?> jour(s) <?php } ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($al1 == [] && $al2 == []): ?>
    <tr>
        <td><?php echo $messAl ?></td>
    </tr>
    <?php endif; ?>
</table>
</div>
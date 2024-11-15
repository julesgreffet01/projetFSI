<?php

use BO\Specialite;

require_once "../Model/BO/Specialite.php";
$spec = new Specialite(1, "slam");
echo $spec->getIdSpec();
echo "<br>";
echo $spec->getNomSpec();
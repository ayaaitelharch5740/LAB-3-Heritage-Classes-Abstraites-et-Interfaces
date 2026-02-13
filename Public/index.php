<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Test LAB</title>
</head>
<body>

<?php

spl_autoload_register(function(string $class){

    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../src/';

    if(strncmp($prefix,$class,strlen($prefix)) !== 0){
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\','/',$relativeClass) . '.php';

    if(file_exists($file)){
        require $file;
    }
});

use App\Entity\Filiere;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Service\DisplayService;

$f = new Filiere(1,"Informatique");

$et1 = new Etudiant(null,"Sara","sara@mail.com",$f);
$et2 = new Etudiant(null,"Youssef","youssef@mail.com",$f);

$ens = new Enseignant(null,"Dr Karim","karim@mail.com","Professeur");

$list = [$et1,$et2,$ens];

$display = new DisplayService();
$display->show($list);

echo "<br><br>";

print_r($et1->export());
echo "<br>";
print_r($ens->export());

?>

</body>
</html>

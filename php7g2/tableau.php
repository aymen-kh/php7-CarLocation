<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <?php
    //$cars=array("VOLVO","Mercedes","BMW"); //php 7.4

    //$cars=["VOLVO","Mercedes","BMW"]; // php 8.x
$cars=[];

    $cars[0]="VOLVO";
    $cars[1]="Mercedes";
    $cars[2]="BMW";
    $cars[5]="FIAT";

    unset($cars[1]);
    print_r($cars);

    echo "<br>";

    $notes=["html"=>15,"php"=>14,"java"=>12];
    echo "la note de html est ".$notes['html']."<br>";

    foreach($notes as $matiere=>$note){
        echo "la note de $matiere est $note<br>";
    }

    // tableau multidimentionnel
    $etudiants=["ali"=>["html"=>[10,15,14.5],"php"=>[20,16,18],"java"=>[14,12,15]],
    "salah"=>["math"=>[14,8,12.5],"francais"=>[14,8,12.5],"anglais"=>[14,8,12.5]],
    "sami"=>["html"=>[5,8,2.5],"php"=>[8,8,10.5],"java"=>[7,8,9.5]]
];
//echo "<pre>";
//print_r($etudiants);
//echo "</pre>";

foreach($etudiants as $etudiant=>$matieres){
    echo "<h1>$etudiant</h1>";
    echo "
    <table  class='table table-striped'>
        <tr>
            <th>Matieres</th>
            <th>Note Orale</th>
            <th>Note DS</th>
            <th>Note Exam.</th>
            <th>Moyenne</th>
        </tr>
    ";
$sommemoy=0;
    foreach($matieres as $matiere=>$notes){
        $moyenne=array_sum($notes)/count($notes);
        $sommemoy+=$moyenne;
        echo "
        <tr>
            <td>$matiere</td>
            <td>$notes[0]</td>
            <td>$notes[1]</td>
            <td>$notes[2]</td>
            <td>".number_format($moyenne,2,',','')."</td>
        </tr>";

    }
$mg=$sommemoy/sizeof($matieres);
        echo "
        <tr>
            <th colspan='4'>Moyenne générale</th>
            <th>".number_format($mg,2,',','')."</th>
        </tr>
        ";

    echo "</table>";
$mention="";
switch($mg){
    case ($mg<10): $mention="Refusé";
    break;
    case ($mg<12): $mention="Passable";
    break;
    case ($mg<14): $mention="Assez bien";
    break;
    case ($mg<16): $mention="Bien";
    break;
    case ($mg<18): $mention="Trés bien";
    break;
    case ($mg<=20): $mention="Excelent";
    break;
    default:$mention="Erreur!";
    break;
}
    echo "mention : $mention";
}


$cars=[
    ["name"=>"volvo","stock"=>14,"sold"=>18],
    ["name"=>"fiat","stock"=>10,"sold"=>15],
    ["name"=>"renault","stock"=>5,"sold"=>24]
];

echo "<table  class='table table-dark table-striped'>
<tr>
    <th>Name</th>
    <th>Sock</th>
    <th>Sold</th>
</tr>
    ";
foreach($cars as $car){
   echo "<tr>
   <td>".$car['name']."</td>
   <td>".$car['stock']."</td>
   <td>".$car['sold']."</td>
   </tr>
   "; 
}
echo "</table>";









$cars2=[
    "volvo"=>["stock"=>14,"sold"=>18],
    "fiat"=>["stock"=>10,"sold"=>16],
    "renault"=>["stock"=>20,"sold"=>40],
    "bmw"=>["stock"=>10,"sold"=>70]
];

echo "<table  class='table table-dark table-striped'>
<tr>
    <th>Name</th>
    <th>Sock</th>
    <th>Sold</th>
</tr>
    ";
foreach($cars2 as $indice=>$tab){
   echo "<tr>
   <td>".$indice."</td>
   <td>".$tab['stock']."</td>
   <td>".$tab['sold']."</td>
   </tr>
   "; 
}
echo "</table>";
    ?> 
    </div>
</body>
</html>
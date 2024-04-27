<?php
include "securityuser.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
<body>

<!-- Modal -->
<div class="modal fade" id="rent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">entrez vos données</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form method="post" action="rent.php">

      <div class="modal-body">
      
          <label for="debut" class="form-label">Date Debut</label>
          <input type="date" name="debut" class="form-control" id="debut" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>

      <div class="modal-body">
      <input type="hidden" id="carId" name="carId">
        <label for="fin" class="form-label">Date Fin</label>
        <input type="date" name="fin" class="form-control" id="fin" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      
     
      
       
       
     
      <div class="modal-footer">
      <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['id'];?>">
      
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="submit" type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- FIN Modal -->



<?php 
include "config.php";
include "usermenu.php"; 

$sql="select * from cars where etat='non'";
$inscrits=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
/*echo "<pre>";
print_r($inscrits);
echo "</pre>";*/
?>

    <div class="container">

      <h1>Liste des Voitures </h1>

      <?php

      if(isset($_GET['message'])){
        echo "<div id='message' class='alert alert-success' role='alert'>".$_GET['message']."</div>";
      }
      ?>
    
    <table class="table table-striped">
    <tr>
      <th>photo</th>
      <th>immatriculation</th>
      <th>marque</th>
      <th>modele</th>
      <th>annee</th>
      <th>Tarif_Jour</th>
      <th>action</th>
    </tr>
<?php
foreach($inscrits as $objet){
  $photo="default.png";
  if(!empty($objet->photo))
  $photo=$objet->photo;
  echo "
  <tr>
    <td><img src='cars/".$photo."' width='100'></td>
    <td>".$objet->immat."</td>
    <td>".$objet->marque."</td>
    <td>".$objet->modele."</td>
    <td>".$objet->annee."</td>
    <td>".$objet->tarif_jour."</td>

    <td>
    <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#rent' onclick='setCarId($objet->id_voiture)'>
    <i class='bi bi-car-front'></i>Louer
  </button>
     
    </td>
  </tr>
  ";
}
?>

  <script>
  // Fonction pour mettre à jour la valeur de l'ID de la voiture dans le champ caché
 function setCarId(carId) {
    document.getElementById("carId").value = carId;
}


  // Fonction pour soumettre le formulaire de location de voiture
  function submitRent() {
    // Vous pouvez récupérer la valeur de l'ID de la voiture à partir du champ caché
    var carId = document.getElementById("carId").value;
    // Ensuite, vous pouvez soumettre le formulaire ou effectuer d'autres actions nécessaires
    // Par exemple, vous pouvez envoyer une requête AJAX pour traiter la location de la voiture
    // ...
  }
</script>

    </table>





    <script src="js/scriptCar.js"></script>
      </div>
</body>
</html>
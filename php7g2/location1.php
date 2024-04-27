<?php
include "security.php";
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
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier données</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form method="post" action="updateVoiture.php" enctype="multipart/form-data" onsubmit="return verif_submit($('#immat').val());">

      <div class="modal-body">
        <div id="photo_car" class="text-center"></div>
<input type="hidden" name="old_photo" id="old_photo" value="">
      <div class="col-md-12">
          <label for="photo" class="form-label">Photo de voiture</label>
          <input type="file" name="photo" class="form-control" id="photo" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-12">
          <label for="immat" class="form-label">Immat</label>
          <div class="input-group has-validation">
          
            <input  type="text" onblur="verif_immat(this.value)" name="immat" class="form-control error_immat" id="immat" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback" id="error_immat">
              Veuillez saisir imm valide.
            </div>
          </div>
        </div>

      <div class="col-md-12">
          <label for="marque" class="form-label">Marque</label>
          <input type="text" name="marque" class="form-control" id="marque" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-12">
          <label for="modele" class="form-label">Modele</label>
          <input type="text" name="modele" class="form-control" id="modele" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
      
        <div class="col-md-12">
          <label for="annee" class="form-label">Annee</label>
          <input type="date" name="annee"  class="form-control" id="annee" required>
          <div class="invalid-feedback">
            Veuillez saisir un num tel valide.
          </div>
        </div>
        <div class="col-md-12">
          <label for="modele" class="form-label">Tarif_Jour(DT)</label>
          <input type="number" step="0.01" name="tarif" class="form-control" id="tarif" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
      </div>
     
      <div class="modal-footer">
      <input type='hidden' name='id_voiture' id="id_voiture_up">
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
include "menu.php"; 
//print_r( $_SESSION['id']);

$sql = "SELECT nom, id_loc,prenom, date_debut, date_fin, cars.photo, cars.immat, cout_total 
FROM location, cars, users 
WHERE cars.etat = 'oui' -- condition pour les voitures allouées
AND location.id_voiture = cars.id_voiture -- condition de jointure entre la table location et cars
AND location.id_client = users.id"; //-- condition de jointure entre la table location et users

$location=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);

//print_r($location[0]->immat);
//exit();
/*echo "<pre>";
print_r($inscrits);
echo "</pre>";*/
?>

    <div class="container">

      <h1>Liste des Locations</h1>

      <?php

      if(isset($_GET['message'])){
        echo "<div id='message' class='alert alert-success' role='alert'>".$_GET['message']."</div>";
      }
      ?>
    
    <table class="table table-striped">
    <tr>
      <th>photo_voiture</th>
      <th>immatriculation</th>
      <th>date_debut</th>
      <th>date_fin</th>
      <th>Cout_Total</th>
    
    </tr>
<?php
foreach($location as $objet){
  
  $photo="default.png";
  if(!empty($objet->photo))
  $photo=$objet->photo;
  echo "
  <tr>
    <td><img src='cars/".$photo."' width='100'></td>
    <td>".$objet->immat."</td>
    <td>".$objet->date_debut."</td>
    <td>".$objet->date_fin."</td>
    <td>".$objet->cout_total."</td>
    
  </tr>
  ";
}
?>
    </table>





    <script src="js/scriptCar.js"></script>
      </div>
</body>
</html>
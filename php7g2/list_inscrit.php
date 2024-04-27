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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier inscrit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form method="post" action="update.php" enctype="multipart/form-data" onsubmit="return verif_submit($('#email').val());">
      <div class="modal-body">
        <div id="photo_profil" class="text-center"></div>
<input type="hidden" name="old_photo" id="old_photo" value="">
      <div class="col-md-12">
          <label for="photo" class="form-label">Photo de profil</label>
          <input type="file" name="photo" class="form-control" id="photo" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>

      <div class="col-md-12">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" name="nom" class="form-control" id="nom" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-12">
          <label for="prenom" class="form-label">Prenom</label>
          <input type="text" name="prenom" class="form-control" id="prenom" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-12">
          <label for="email" class="form-label">Email</label>
          <div class="input-group has-validation">
            <span class="input-group-text error_email">@</span>
            <input type="email" onblur="verif_email(this.value)" name="email" class="form-control error_email" id="email" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback" id="error_email">
              Veuillez saisir une adresse email valide.
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <label for="tel" class="form-label">Tel</label>
          <input type="number" name="tel" pattern="[0-9]{8}" class="form-control" id="tel" required>
          <div class="invalid-feedback">
            Veuillez saisir un num tel valide.
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <input type='hidden' name='id_inscrit' id="id_inscrit_up">
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

$sql="select * from inscrits";
$inscrits=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
/*echo "<pre>";
print_r($inscrits);
echo "</pre>";*/
?>

    <div class="container">

      <h1>Liste des inscrits <a href="export_inscrits.php"><img src="images/csv.png" width="40"></a></h1>

      <?php

      if(isset($_GET['message'])){
        echo "<div id='message' class='alert alert-success' role='alert'>".$_GET['message']."</div>";
      }
      ?>
    
    <table class="table table-striped">
    <tr>
      <th>photo</th>
      <th>nom</th>
      <th>prenom</th>
      <th>email</th>
      <th>telephone</th>
      <th>action</th>
    </tr>
<?php
foreach($inscrits as $objet){
  $photo="default.jpg";
  if(!empty($objet->photo))
  $photo=$objet->photo;
  echo "
  <tr>
    <td><img src='profils/".$photo."' width='100'></td>
    <td>".$objet->nom."</td>
    <td>".$objet->prenom."</td>
    <td>".$objet->email."</td>
    <td>".$objet->tel."</td>
    <td>
    <button onclick=\"update('".$objet->id_inscrit."','".$objet->nom."','".$objet->prenom."','".$objet->email."','".$objet->tel."','".$objet->photo."')\" class='btn btn-success' data-bs-toggle='modal' data-bs-target='#update'><i class='bi bi-pencil-square'></i></button>
    
    <form class='d-inline' method='post' action='delete.php'>
    <input type='hidden' name='id_inscrit' id='id_inscrit' value='".$objet->id_inscrit."'>
    <button type='submit' onclick=\"return confirm('etes vous sure de supprmer?')\" class='btn btn-danger'><i class='bi bi-trash3-fill'></i></button>
    </form>
    </td>
  </tr>
  ";
}
?>
    </table>





    <script src="js/script.js"></script>
      </div>
</body>
</html>
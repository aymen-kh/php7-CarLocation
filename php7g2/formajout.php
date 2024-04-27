<?php
include "security.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Voiture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<?php include "menu.php"; ?>

    <div class="container">
      <h1>Ajout Voiture</h1>
      <?php
      if(isset($_GET['message']) && $_GET['message']==1){
        echo "<div id='message' class='alert alert-success' role='alert'>Inscription effectuée avec succes!</div>";
      }
      ?>
    <form class="row g-3 needs-validation" method="post" action="traitementVoiture.php" novalidate enctype="multipart/form-data">
       
        <div class="col-md-4">
          <label for="immat" class="form-label">Immat</label>
          <div class="input-group has-validation">
           
            <input type="text" onblur="verif_immat(this.value)" name="immat" class="form-control error_immat" id="immat" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback" id="error_immat">
              Veuillez saisir une immatriculation valide.
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <label for="modele" class="form-label">Modele</label>
          <input type="text" name="modele" class="form-control" id="modele" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4">
          <label for="marque" class="form-label">Marque</label>
          <input type="text" name="marque" class="form-control" id="marque" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-6">
          <label for="annee" class="form-label">Annee</label>
          <input type="date" name="annee" class="form-control" id="annee" required>
          <div class="invalid-feedback">
          
          </div>
        </div>
        <div class="col-md-6">
          <label for="annee" class="form-label">Tarif par jour(DT)</label>
          <input type="number" step="0.01" name="tarif"  class="form-control" id="tarif" required>
          <div class="invalid-feedback">
          
          </div>
        </div>
        <div class="col-md-6">
          <label for="photo" class="form-label">photo de Voiture</label>
          <input type="file" name="photo"  class="form-control" id="photo" required>
          <div class="invalid-feedback">
            Veuillez parcourir une photo de voiture.
          </div>
        </div>
        
        
        
        <div class="col-12">
          <button class="btn btn-primary" id="submit" type="submit">Valider</button>
        </div>
      </form>
      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

//setTimeout(function(){ document.getElementById('message').style.display="none" }, 5000);



      </script>
        <script src="js/script.js"></script>

      </div>
</body>
</html>
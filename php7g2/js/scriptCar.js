function verif_immat(immat){
    var id_voiture=$('#id_voiture_up').val();
    var res=false;
    $.ajax({
      type:"post",
      url: "api/verif_immat.php",
      data:{immat:immat,id_voiture:id_voiture},
  
      success: function(result){
  //traitement apres la vérification
  if(result){
  $(".error_immat").addClass("border-danger");
  $("#error_immat").show();
  $("#submit").attr("disabled","disabled");
  res=false;
  }else{
    $(".error_immat").removeClass("border-danger");
    $(".error_immat").addClass("border-success");
    $("#submit").removeAttr("disabled");
  
  $("#error_immat").hide();
  res=true;
  }
  
    }});
   return res;
  }

  setTimeout(function(){ $('#message').hide() }, 5000);


  function update(id_voiture,immat,marque,modele,annee,photo,tarif){
    $("#marque").val(marque);
    $("#modele").val(modele);
    $("#immat").val(immat);
    $("#annee").val(annee);
    $("#id_voiture_up").val(id_voiture);
    $("#old_photo").val(photo);
    $("#tarif").val(tarif);

    $("#photo_car").html("<img src='cars/"+photo+"' width='200'>");

    
    }

    function verif_submit(immat){
      setTimeout(function(){ var res=verif_immat(immat) }, 500);
      return res;
    }
    


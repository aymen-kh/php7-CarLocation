function verif_email(email){
  var id_inscrit=$('#id_inscrit_up').val();
  var res=false;
  $.ajax({
    type:"post",
    url: "api/verif_email.php",
    data:{email:email,id_inscrit:id_inscrit},

    success: function(result){
//traitement apres la vérification
if(result){
$(".error_email").addClass("border-danger");
$("#error_email").show();
$("#submit").attr("disabled","disabled");
res=false;
}else{
  $(".error_email").removeClass("border-danger");
  $(".error_email").addClass("border-success");
  $("#submit").removeAttr("disabled");

$("#error_email").hide();
res=true;
}

  }});
 return res;
}

setTimeout(function(){ $('#message').hide() }, 5000);


function update(id_inscrit,nom,prenom,email,photo){
  $("#nom").val(nom);
  $("#prenom").val(prenom);
  $("#email").val(email);
  $("#id_inscrit_up").val(id_inscrit);
  $("#old_photo").val(photo);
  $("#photo_profil").html("<img src='profils/"+photo+"' width='200'>");

  
  }

  function verif_submit(email){
    setTimeout(function(){ var res=verif_email(email) }, 500);
    return res;
  }
  


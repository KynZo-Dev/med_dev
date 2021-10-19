function rechercher(){
    var name = document.getElementById('rech').value;
    $.ajax({
        type: "POST",
        url: "some.php",
        data: {name: name}, // je passe la variable JS
        success: function(msg){ // je récupère la réponse dans la variable msg
        $('#resultat').empty();
        $('#resultat').append(msg);
        }
    });
}
$(document).ready(function(){
    //alert(1);
    $("#username").keyup(function(){
        var user = $(this).val();
        $.post("./Ajax/checkUsername",{un:user}, function(data){
            $("#messageun").html(data);
        });
    });
});

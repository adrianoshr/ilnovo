bootbox.prompt("Por favor Ingrese su Cuenta de E-mail de Usuario", 
function(result) {
if (result !== null) {
$.ajax({
data: 'email='+result,
type: 'POST',
dataType: 'script',
url: 'panel/model/reset_password.php',
success: function(data) {
$('#notification').html(data).fadeIn("slow");
$('html, body').animate({scrollTop: 0}, 'slow');
$("#loginButton").html('Entrar');
},
error: function(data) {
$("#loginButton").html('Entrar');
},
onChange: function(data) {
$('#notification').html(data).fadeIn("slow");
}
});
}
});



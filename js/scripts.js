$('#form1').submit(function (e) {
        e.preventDefault();
        var formData = $("#form1").serializeArray();
        $('#status').fadeOut();        
            $.ajax({
                data: formData,
                type: 'POST',
                dataType: 'html',
                url: 'panel/model/cotiza.php',
                success: function (data) {
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $('#result').html('<div class="alert alert-success">Muchas Gracias. Pronto nos pondremos en contacto contigo.</div>');
                },
                error: function (data) {
                    alert('Ocurrio un Error, Por Favor Verifique su Conexión e Intente Nuevamente.');                    
                }
            });
        
    });
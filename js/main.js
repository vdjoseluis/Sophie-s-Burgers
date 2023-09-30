
$(() => {

    $('#btnToCarta').on('click', () => {
        window.location.href = "carta.html";
    });
    $('#btnToMenu').on('click', () => {
        window.location.href = "menus.html";
    });

    $('#modalOrders').modal('show'); 

    $('#btnPlaceOrder').on('click', () => {
        location.reload();
    });

    $('input[type="radio"][name="orderOptions"]').on('click', () =>{
        $('#footerOrders').removeClass('d-none');
        $('#address').removeClass('d-none');
        $("#addressInput").trigger('focus');
    }); 

    $('#validateAddress').on('click', () => {
        const selectedOptionOrder= $("input[name='orderOptions']:checked").val();

        var address= $("#addressInput").val();
        var geocoder= new google.maps.Geocoder();
        geocoder.geocode({'address': address},function(results,status){
            if (status === google.maps.GeocoderStatus.OK && results[0]){
                /* DIRECCION CORRECTA */
                if (selectedOptionOrder=="option1") {
                    // CONFIRMACION ENTREGA A DOMICILIO
                    $('#address').addClass('d-none');

                    $('#modal-body').html("<p>Tu pedido se entregará en:</p>");
                    // Aqui la variable $_POST de php
                    // TODO: Escribir el resultado desde la variable direccion.

                    $('#validateAddress').addClass('d-none');
                    $('#okAddress').removeClass('d-none');
                    $('#modalOrders .btn-close').hide();
                } else {
                    alert ('recogida en tienda');
                    // TODO: mostrar la tienda mas cercana con la variable city.
                    let city = '';
                    for (let component of results[0].address_components) {
                        if (component.types.includes('locality')) {
                            city = component.long_name;
                            break;
                        }
                    }
                }
                
            } else {
                $('#locationResult').removeClass('d-none');
                $('#locationResult').text ("Dirección no válida");
                $("#addressInput").trigger('focus');
            }
        });
    });

    $('#addressInput').on('input', () => {
        $('#getLocationCheckbox').prop('checked',false);
        $('#locationResult').addClass('d-none');
    });
  
    $("#getLocationCheckbox").on("change", function() {
        if (this.checked) {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    var latlng = new google.maps.LatLng(latitude, longitude);
                    var geocoder = new google.maps.Geocoder();

                    geocoder.geocode({ 'location': latlng }, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var address = results[0].formatted_address;
                                $('#titleAddress').html("Tu dirección: ")
                                $('#addressInput').val (address);
                            } else {
                                alert ("Dirección no disponible");
                            }
                        } else {
                            alert ("Error en la geocodificación inversa: " + status);
                        }
                    });
                }, function(error) {
                    console.log("Error al obtener la ubicación: " + error.message);
                });
            } else {
                console.log("Geolocalización no está disponible en este navegador.");
            }
        } else {
            $("#locationResult").empty();
        }
    });

    $('#okAddress').on('click', ()=> window.location.href="index.php");

});
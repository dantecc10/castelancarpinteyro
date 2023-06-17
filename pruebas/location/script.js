/*$(document).ready(function() {
    $('#locationLink').click(function(event) {
      event.preventDefault(); // Evita que el enlace redireccione
  
      // Obtener ubicación precisa con JavaScript
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
  
          // Enviar las coordenadas al servidor mediante AJAX
          $.ajax({
            type: 'POST',
            url: 'save_location.php',
            data: { latitude: latitude, longitude: longitude },
            success: function(response) {
              alert('Ubicación enviada correctamente.');
            },
            error: function() {
              alert('Ha ocurrido un error al enviar la ubicación.');
            }
          });
        });
      }
    });
  });
  */
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function (position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Enviar las coordenadas al servidor mediante AJAX
    $.ajax({
      type: 'GET',
      url: ('save_location.php'),
      data: { latitude: latitude, longitude: longitude },
      success: function (response) {
        alert('Ubicación enviada correctamente.');
      },
      error: function () {
        alert('Ha ocurrido un error al enviar la ubicación.');
      }
    });
  });
}
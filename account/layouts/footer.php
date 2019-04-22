 <!-- Footer -->
    <footer class="footer-bg">
      <div class="footer-bottom-area">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="footer-bottom border-top">
                <div class="row">
                  <div class="col-lg-6">
                    <p class="copyright-text">Copyright <a href="#">Oficiona</a> 2018, All right reserved</p>
                  </div>
                  <div class="col-lg-6">
                    <div class="back-to-top">
                      <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/account/assets/js/jquery.min.js"></script>
    <script src="../assets/account/assets/js/popper.min.js"></script>
    <script src="../assets/account/assets/js/bootstrap.min.js"></script>
    <script src="../assets/account/assets/js/feather.min.js"></script>
    <script src="../assets/account/assets/js/bootstrap-select.min.js"></script>
    <script src="../assets/account/assets/js/jquery.nstSlider.min.js"></script>
    <script src="../assets/account/assets/js/owl.carousel.min.js"></script>
    <script src="../assets/account/assets/js/visible.js"></script>
    <script src="../assets/account/assets/js/jquery.countTo.js"></script>
    <script src="../assets/account/assets/js/chart.js"></script>
    <script src="../assets/account/assets/js/plyr.js"></script>
    <script src="../assets/account/assets/js/tinymce.min.js"></script>
    <script src="../assets/account/assets/js/slick.min.js"></script>
    <script src="../assets/account/assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="../assets/account/assets/js/html5-simple-date-input-polyfill.min.js"></script>

    <!-- dashboard -->
    <script src="../assets/account/js/custom.js"></script>
    <script src="../assets/account/dashboard/js/dashboard.js"></script>
    <script src="../assets/account/dashboard/js/datePicker.js"></script>
    <script src="../assets/account/dashboard/js/upload-input.js"></script>

    <!--edit  -->
    <script src="../assets/account/dashboard/js/dashboard.js"></script>
    <script src="../assets/account/dashboard/js/datePicker.js"></script>
    <script src="../assets/account/dashboard/js/upload-input.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

       <script>


      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxkyVw9JMI0N6HBsjIKelYK337j81RNec&libraries=places&callback=initAutocomplete"
        async defer></script>

        <!-- FOR STATE AND CITY DROPDOWN ON EDIT PROFILE PAGE -->
        <script>
function change_location()
{
    var state = $("#state").val();

       $.ajax({
        type: "POST",
        url: "core/get_city.php",
        data: "state="+state,
        cache: false,
        success: function(response)
            {
                    //alert(response);return false;
                $("#city").html(response);
            }
            });

}
</script>
  </body>

</html>

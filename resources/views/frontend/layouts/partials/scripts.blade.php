<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="{{ asset('frontend_assets/js/scripts.js') }}"></script>
<script>
   $(function(){
      $('#datepicker').datepicker({
         // format: 'mm/dd/yyyy',
         format: 'dd/mm/yyyy',
      });
   });
</script>
<script>
    function readURL(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#imageResult').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    } 
</script>
<script>
   $(document).ready(function() {
      $("#addinput").on("click", function() {
         $("#more-input").append("<div class='form-group form__group'><label for=''>College</label><input type='text' class='form-control form__control' id='' placeholder='College name'/></div>");  
      });  
      $("#removeinput").on("click", function() {  
         $("#more-input").children().last().remove();  
      });   
   });  
</script>
@stack('frontend-scripts')


 <!-- Jquery Min JS -->
 <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
 <!-- Bootstrap Bundle Min JS -->
 <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
 <!-- Meanmenu Min JS -->
 <script src="{{ asset('frontend/assets/js/meanmenu.min.js') }}"></script>
 <!-- Wow Min JS -->
 <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
 <!-- Owl Carousel Min JS -->
 <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
 <!-- Owl Magnific Min JS -->
 <script src="{{ asset('frontend/assets/js/magnific-popup.min.js') }}"></script>
 <!-- Nice Select Min JS -->
 <script src="{{ asset('frontend/assets/js/nice-select.min.js') }}"></script>
 <!-- Form Validator Min JS -->
 <script src="{{ asset('frontend/assets/js/form-validator.min.js') }}"></script>
 <!-- Contact JS -->
 <script src="{{ asset('frontend/assets/js/contact-form-script.js') }}"></script>
 <!-- Ajaxchimp Min JS -->
 <script src="{{ asset('frontend/assets/js/ajaxchimp.min.js') }}"></script>
 <!-- Custom JS -->
 <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
 <!-- Toastr-->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <script>
     @if (Session::has('message'))
         var type = "{{ Session::get('alert-type', 'info') }}"
         switch (type) {
         case 'info':
         toastr.info(" {{ Session::get('message') }} ");
         break;
     
         case 'success':
         toastr.success(" {{ Session::get('message') }} ");
         break;
     
         case 'warning':
         toastr.warning(" {{ Session::get('message') }} ");
         break;
     
         case 'error':
         toastr.error(" {{ Session::get('message') }} ");
         break;
         }
     @endif
 </script>

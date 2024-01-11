<div class="body__content__main">
   <div class="contact__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="sub__heading">
                  <h3>{{ $page_content->donation_who_we_title ?? '' }}</h3>
               </div>
               <h2>{{ $page_content->donation_who_we_subtitle ?? '' }}</h2>
               {!! $page_content->donation_who_we_content !!}
               <div class="contact__info">
                  <div class="info__card">
                     <a href="#"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/call-ico-large.svg') }}" alt="" /></i>{{ $page_content->contact_mobile_no ?? '' }}</a>
                  </div>
                  <div class="info__card">
                     <a href="#"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/email-ico-large.svg') }}" alt="" /></i>{{ $page_content->contact_email ?? '' }}</a>
                  </div>
               </div>
               <div class="register__card">
                  <h3>{{ $page_content->register_title }}</h3>
                  <div class="btn__wrapp"><a href="#">Register Now</a></div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="form__wrapp">
                  <form action="{{ route('donate-now') }}" method="POST" class="donate-form">
                     {{ csrf_field() }}
                     <div class="form-group form__group">
                        <label>Select your donation amount</label>
                        <br>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="donate_amount" id="inlineRadio1" value="10">
                          <label class="form-check-label" for="inlineRadio1">$10</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="donate_amount" id="inlineRadio2" value="30">
                          <label class="form-check-label" for="inlineRadio2">$30</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="donate_amount" id="inlineRadio3" value="50">
                          <label class="form-check-label" for="inlineRadio3">$50</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="donate_amount" id="inlineRadio4" value="70">
                          <label class="form-check-label" for="inlineRadio4">$70</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="donate_amount" id="inlineRadio5" value="90">
                          <label class="form-check-label" for="inlineRadio5">$80</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="donate_amount" id="inlineRadio6" value="100">
                          <label class="form-check-label" for="inlineRadio6">$100</label>
                        </div>
                     </div>

                     <div class="form-group form__group custom__amount">
                        <label>Custom Amount<span>*</span></label>
                        <input type="number" name="custom_amount" class="form-control form__control" placeholder="Custom Amount" />
                     </div>

                     <div class="form-group form__group">
                        <label>Full Name<span>*</span></label>
                        <input type="text" name="fullname" class="form-control form__control" placeholder="Enter your first name" />
                     </div>

                     <div class="form-group form__group">
                        <label>Email<span>*</span></label>
                        <input type="email" name="email" class="form-control form__control" placeholder="Enter your email" />
                     </div>

                     <div class="form-group form__group">
                        <label>Select Country</label>
                        <select class="selectpicker form-control form__control" name="country">
                           <option selected disabled>- Select Country -</option>
                           <option value="India">India</option>
                           <option value="Bangladesh">Bangladesh</option>
                           <option value="Iran">Iran</option>
                           <option value="USA">USA</option>
                           <option value="UK">UK</option>
                           <option value="Canada">Canada</option>
                        </select>
                     </div>

                     <div class="form-group form__group">
                        
                     <input type="hidden" name="stripeToken" class="stripe-token">
                     <input class="form-control form__control" name="card_holder_name" placeholder="Card holder name">
                     
                     </div>

                     <div class="form-group form__group">
                        <div id="card-element" class="form-control form__control">
                        <!-- Elements will create input elements here -->
                        </div>
                     <!-- We'll put the error messages in this element -->
                        <div id="card-errors" role="alert"></div>
                     </div>
                     <div class="donate__now__btn">
                         <button class="submit__btn" type="submit">Donate Now</button>
                     </div>
                    
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@push('frontend-scripts')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

   <!-- Stripe JS -->
   <script src="https://js.stripe.com/v3/"></script>
   <script>
      $(function() {
         $('#datepicker').datepicker();

         $("input[name=donate_amount]").on('click',function(){
            $('.custom__amount').hide();
         })

         $("input[name=custom_amount]").on('keyup', function(){
            let val = $(this).val();

            if(val.length > 0){
               $("input[name=donate_amount]").prop("disabled", true); // disable
            }
            else{
               $("input[name=donate_amount]").prop("disabled", false);
            }
         })

       
          let stripe = Stripe("{{ env('STRIPE_KEY') }}");
          let elements = stripe.elements()
          let card = elements.create('card')
          card.mount('#card-element')
          let stripeToken = null;

       $('.donate__now__btn>button').on('click', function (e) {
           
          e.preventDefault()

               if (stripeToken) {
                   return true
               }
              stripe.createToken(card).then(function (result) {
                   if (result.error) {
                       $('#card-errors').text(result.error.message)
                       // $('button.pay').removeAttr('disabled')
                   } else {
                      // console.log(result.token.id);
                       stripeToken = result.token.id;
                       console.log(stripeToken)
                       $('.stripe-token').val(stripeToken)
                       $('.donate-form').submit();
                   }
               })
               return false
       });

         // $('input[name="card_holder_name"]').attr('required', true);
   });
   </script>
@endpush

@push('frontend-styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush
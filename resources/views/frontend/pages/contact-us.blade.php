<div class="body__content__main">
   <div class="contact__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="sub__heading">
                  <h3>{{ $page_content->contact_title ?? '' }}</h3>
               </div>
               <h2>{{ $page_content->contact_subtitle ?? '' }}</h2>
               {!! $page_content->contact_content !!}
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
                  <form action="{{ route('contact-us.submit') }}" method="POST">
                     <div class="form-group form__group">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6">
                              <label>First Name<span>*</span></label>
                              <input type="text" name="first_name" class="form-control form__control" placeholder="Enter your first name" />
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6">
                              <label>Last Name<span>*</span></label>
                              <input type="text" name="last_name" class="form-control form__control" placeholder="Enter your last name" />
                           </div>
                        </div>
                     </div>
                     <div class="form-group form__group">
                        <label>Email<span>*</span></label>
                        <input type="email" name="email" class="form-control form__control" placeholder="Enter your email" />
                     </div>
                     <div class="form-group form__group">
                        <label>Phone Number<span>*</span></label>
                        <input type="text" name="phone_number" class="form-control form__control" placeholder="Enter your phone number" />
                     </div>
                     <div class="form-group form__group">
                        <label>Address<span>*</span></label>
                        <input type="text" name="address" class="form-control form__control" placeholder="Enter your address" />
                     </div>
                     <div class="form-group form__group">
                        <label>Message<span>*</span></label>
                        <textarea name="message" class="form-control form__control" placeholder="Enter your message"></textarea>
                     </div>
                     <button class="submit__btn" type="submit">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
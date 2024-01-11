@extends('backend.layouts.backendMasterLayout')
@section('title','Dashboard')
@section('backendContent')
<div class="row">
   <div class="col-xl-3">
      <!-- Settings -->
      <div class="card card-default">
         <div class="card-header">
            <h2>Settings</h2>
         </div>
         <div class="card-body pt-0">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

               <button class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"> <i class="mdi mdi-settings-outline mr-1"></i> Profile </button>

               <button class="nav-link" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="mdi mdi-account-outline mr-1"></i> Account </button>

               <button class="nav-link" id="v-pills-change-password-tab" data-toggle="pill" data-target="#v-pills-change-password" type="button" role="tab" aria-controls="v-pills-change-password" aria-selected="true"><i class="mdi mdi-account-outline mr-1"></i> Change Password </button>

               

               {{-- <button class="nav-link" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="mdi mdi-currency-usd mr-1"></i> Planing </button> --}}

               {{-- <button class="nav-link" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="mdi mdi-set-top-box mr-1"></i> Billing </button> --}}

            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-9">
      
      <div class="tab-content" id="v-pills-tabContent">
          {{--Start Profile Settings --}}
         <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="card card-default">
               <div class="card-header">
                  <h2 class="mb-5">Profile</h2>
               </div>
               <div class="card-body">
                  <!-- Profile Edit Form -->
                  {{-- {{ route('admin.update_profile',$user); }} --}}
                 <form action="{{ route('admin.update_profile',$user); }}" method="POST" enctype="multipart/form-data"> 
                     {{ csrf_field() }}
                     <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                           <input type="hidden" name="rmv_exist_image">
                           <img 
                           src="{{ !empty($user->profile_picture) ? asset('storage/users/'.$user->profile_picture) : asset('backend_assets/images/default-user-image.png') }}"
                              alt="Profile"
                              id="profile_picture"
                              data-hdninput="rmv_exist_image"
                              data-imge="{{ $user->profile_picture ?? '' }}"
                              data-default-image="{{ asset('backend_assets/images/default-user-image.png') }}"
                              class="img-fluid"
                              style="width: 100px;">

                           <div class="pt-2">
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadBtn" title="Upload new profile image">
                                 <i class="fas fa-upload"></i>
                              </a>
                              <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove my profile image">
                                 <i class="fas fa-trash-alt"></i>
                              </a>
                               
                              {{-- <i class="bi bi-upload"></i> --}}
                              <input type="file" name="profile_picture" class="form-control d-none" onchange="showImage(this)">
                           </div>
                        </div>
                     </div>
                     {{-- <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="first_name" type="text" class="form-control" id="first_name" value="{{ old('first_name', isset($user->first_name) ? $user->first_name : '') }}">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="last_name" type="text" class="form-control" id="last_name" value="{{ old('last_name', isset($user->last_name) ? $user->last_name : '') }}">
                        </div>
                     </div> --}}

                     <div class="row mb-3">
                        <label for="fullname" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="fullname" type="text" class="form-control" id="fullname" value="{{ old('fullname', isset($user->fullname) ? $user->fullname : '') }}">
                        </div>
                     </div>

                     {{-- <div class="row mb-3">
                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="username" type="text" class="form-control" id="username" value="{{ old('username', isset($user->username) ? $user->username : '') }}">
                        </div>
                     </div> --}}
                     <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="email" type="email" class="form-control" id="Email" value="{{ old('email', isset($user->email) ? $user->email : '') }}">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Mobile No</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="mobile_number" type="text" class="form-control" id="Phone" value="{{ old('mobile_number', isset($user->mobile_number) ? $user->mobile_number : '') }}">
                        </div>
                     </div>
                     {{-- <div class="row mb-3">
                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                           <textarea name="address" class="form-control" id="address" style="height: 100px">{{ old('address', isset($user->address) ? $user->address : '') }}</textarea>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="City" class="col-md-4 col-lg-3 col-form-label">City</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="city" type="text" class="form-control" id="City" value="{{ old('city', isset($user->city) ? $user->city : '') }}">
                        </div>
                     </div> --}}
                     <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Profile</button>
                     </div>
                  </form>
                  <!-- End Profile Edit Form -->


               </div>
            </div>
            {{-- <div class="card card-default">
               <div class="card-header">
                  <h2>Social Networks</h2>
               </div>
               <div class="card-body">
                  <div class="media media-sm">
                     <div class="media-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="d-flex mb-5">
                                 <button type="button" class="btn btn-icon facebook mr-2">
                                 <i class="mdi mdi-facebook"></i>
                                 </button>
                                 <input type="text" class="form-control" placeholder="Facebook username">
                              </div>
                              <div class="d-flex mb-5">
                                 <button type="button" class="btn btn-icon google-plus mr-2">
                                 <i class="mdi mdi-google-plus"></i>
                                 </button>
                                 <input type="text" class="form-control" placeholder="Google plus username">
                              </div>
                              <div class="d-flex mb-5">
                                 <button type="button" class="btn btn-icon vimeo mr-2">
                                 <i class="mdi mdi-vimeo"></i>
                                 </button>
                                 <input type="text" class="form-control" placeholder="Vimeo username">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="d-flex mb-5">
                                 <button type="button" class="btn btn-icon twitter mr-2">
                                 <i class="mdi mdi-twitter"></i>
                                 </button>
                                 <input type="text" class="form-control" placeholder="Twitter username">
                              </div>
                              <div class="d-flex mb-5">
                                 <button type="button" class="btn btn-icon linkedin mr-2">
                                 <i class="mdi mdi-linkedin"></i>
                                 </button>
                                 <input type="text" class="form-control" placeholder="Linkedin username">
                              </div>
                              <div class="d-flex mb-5">
                                 <button type="button" class="btn btn-icon pinterest mr-2">
                                 <i class="mdi mdi-pinterest"></i>
                                 </button>
                                 <input type="text" class="form-control" placeholder="Pinterest username">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> --}}
            
         </div>
         {{--End Profile Settings --}}

         <!-- Start Account Settings -->
         <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="card card-default">
               <div class="card-header">
                  <h2 class="mb-5">Account Settings</h2>
               </div>
               <div class="card-body">
                  <form action="{{ route('admin.site-setting.update') }}" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                        @foreach ($siteSettings as $option_name => $option_value)
                        <div class="row mb-3">
                           <label for="{{ $option_name }}" class="col-md-4 col-lg-3 col-form-label">{{ ucwords(str_replace('_', ' ', $option_name)) }}</label>
                           <div class="col-md-8 col-lg-9">
                              @switch($option_name)

                                @case($option_name == 'site_logo')
                                 <input type="hidden" name="site_logo_rmv_exist_image">
                                  <img src="{{ !empty($option_value) ? asset('storage/site_settings/'.$option_value) : asset('backend_assets/images/default-image.png') }}" data-hdninput="site_logo_rmv_exist_image" data-imge="{{ $option_value ?? '' }}" data-default-image="{{ asset('backend_assets/images/default-image.png') }}" alt="Profile" id="site_logo_img" class="img-fluid" style="width: 100px;">
                                  <div class="pt-2">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm logoUploadBtn" title="Site Logo"><i class="fas fa-upload"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove Image"><i class="fas fa-trash-alt"></i></i></a>
                                     <input type="file" name="{{ $option_name }}" class="form-control d-none" onchange="showSiteLogo(this)">
                                  </div>
                                @break

                                @case($option_name == 'favicon')
                                 <input type="hidden" name="favicon_rmv_exist_image">
                                  <img src="{{ !empty($option_value) ? asset('storage/site_settings/'.$option_value) : asset('backend_assets/images/default-image.png') }}" data-hdninput="favicon_rmv_exist_image" data-imge="{{ $option_value ?? '' }}" data-default-image="{{ asset('backend_assets/images/default-image.png') }}" alt="Profile" id="favicon_img" class="img-fluid" style="width: 100px;">
                                  <div class="pt-2">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm faviconUploadBtn" title="Favicon"><i class="fas fa-upload"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove Image"><i class="fas fa-trash-alt"></i></a>
                                     <input type="file" name="{{ $option_name }}" class="form-control d-none" onchange="showFavicon(this)">
                                  </div>
                                @break


                                @case($option_name == 'footer_logo')
                                  <img src="{{ !empty($option_value) ? asset('storage/site_settings/'.$option_value) : asset('backend_assets/images/default-image.png') }}" alt="Profile" id="footer_logo_img" class="img-fluid" style="width: 100px;">
                                  <div class="pt-2">
                                     <input type="file" name="{{ $option_name }}" class="form-control" onchange="showFooterLogoImg(this)">
                                  </div>
                                @break

                                @case($option_name == 'meta_description' || $option_name == 'site_description')
                                  <textarea type="text" name="{{ $option_name ?? '' }}" class="form-control">{{ $option_value ?? '' }}</textarea>
                                @break

                                @case($option_name == 'hourly_parameter')
                                  <input type="number" name="{{ $option_name ?? '' }}" class="form-control" value="{{ $option_value ?? '' }}">
                                @break
                              @default
                                <input type="text" name="{{ $option_name ?? '' }}" class="form-control" value="{{ $option_value ?? '' }}">
                              @endswitch
                           </div>
                        </div>
                        @endforeach
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- End Account Settings -->

            <!-- Start Change Password -->
         <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel" aria-labelledby="v-pills-change-password-tab">
            <div class="card card-default">
               <div class="card-header">
                  <h2 class="mb-5">Change Password</h2>
               </div>
               <div class="card-body">
               <!-- Change Password Form -->
                  <form action="{{ route('admin.update_password',$user) }}" method="POST">
                     {{ csrf_field() }}
                     <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="current_password" type="password" class="form-control" id="currentPassword">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="new_password" type="password" class="form-control" id="newPassword">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                           <input name="confirm_password" type="password" class="form-control" id="renewPassword">
                        </div>
                     </div>
                     <div class="d-flex justify-content-end mt-6">
                        <button type="submit" class="btn btn-primary mb-2 btn-pill">Change Password</button>
                     </div>

                  </form>
                  <!-- End Change Password Form -->
               </div>
            </div>
         </div>
            <!-- End Start Change Password -->
        

         <!-- Start Choose Your Plan -->
         {{-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

          <div class="card card-default">
            <div class="card-header">
              <h2 class="mb-5">Choose Your Plan</h2>

            </div>

            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4">
                  <div class="card card-default">
                    <div class="card-header align-items-center flex-column">
                      <h3 class="h2 mb-2">Starter</h3>
                      <p class="text-center">For those who want to look around</p>
                    </div>
                    <div class="card-body d-flex flex-column" style="min-height: 350px">
                      <ul class="d-flex flex-column align-items-center">
                        <li class="h2 text-primary mb-5">$0.00 <span class="text-color h3">/ m</span></li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          1 User Acount
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          1 Active Project
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          1 GB Storage limit
                        </li>
                      </ul>
                      <div class="d-flex justify-content-center mt-auto">
                        <a href="#" class="btn btn-outline-primary btn-pill">Select plan</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                  <div class="card card-default">
                    <div class="card-header align-items-center flex-column">
                      <h3 class="h2 mb-2">Basic</h3>
                      <p class="text-center">For those who want to look around</p>
                    </div>
                    <div class="card-body d-flex flex-column" style="min-height: 350px">
                      <ul class="d-flex flex-column align-items-center">
                        <li class="h2 text-primary mb-5">$50.00 <span class="text-color h3">/ m</span></li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          1 User Acount
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          1 Active Project
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          5GB Storage limit
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          Email Support
                        </li>

                      </ul>
                      <div class="d-flex justify-content-center mt-auto">
                        <a href="#" class="btn btn-outline-primary btn-pill">Select plan</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                  <div class="card card-default">
                    <div class="card-header align-items-center flex-column">
                      <h3 class="h2 mb-2">Ultra</h3>
                      <p class="text-center">For those who want to look around</p>
                    </div>
                    <div class="card-body d-flex flex-column" style="min-height: 350px">
                      <ul class="d-flex flex-column align-items-center">
                        <li class="h2 text-primary mb-5">$70.00 <span class="text-color h3">/ m</span></li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          1 User Acount
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          1 Active Project
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          25GB Storage limit
                        </li>
                        <li class="mb-3 text-dark font-weight-bold">
                          <i class="mdi mdi-check text-primary"></i>
                          Email & Phone Support
                        </li>
                      </ul>
                      <div class="d-flex justify-content-center mt-auto">
                        <a href="#" class="btn btn-outline-primary btn-pill">Select plan</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
         </div> --}}
         <!-- End Choose Your Plan -->

         <!-- Start Billing Information -->
         {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

          <div class="card card-default">
            <div class="card-header">
              <h2 class="mb-5">Billing Information</h2>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName">
                    </div>
                  </div>
                </div>

                <div class="form-group mb-4">
                  <label class="text-dark font-weight-medium">Country</label>
                  <div class="form-group">
                    <select class="country form-control">
                      <option value="AL">Alabana</option>
                      <option value="NY">New York</option>
                      <option value="VR">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="CA">California</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </div>
                </div>

                <div class="form-group mb-4">
                  <label for="adress1">Address line 1</label>
                  <input type="text" class="form-control" id="adress1">
                </div>

                <div class="form-group mb-4">
                  <label for="address2">Address line 2</label>
                  <input type="text" class="form-control" id="address2">
                </div>

                <div class="form-group mb-4">
                  <label for="phone">Phone no</label>
                  <input type="text" class="form-control" id="phone">
                </div>

                <div class="form-group mb-4">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city">
                </div>

                <div class="row mb-2">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="State">State</label>
                      <input type="text" class="form-control" id="State">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="zipCode">Zip code</label>
                      <input type="text" class="form-control" id="zipCode">
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end mt-6">
                  <button type="submit" class="btn btn-primary mb-2 btn-pill">Update billing</button>
                </div>

              </form>
            </div>
          </div>
         </div> --}}
         <!-- Start Billing Information -->
      </div><!-- End of tab-content -->
   </div>
</div>
@endsection


@push('backend-scripts')
   <script type="text/javascript">
      $('.uploadBtn').click(function(){
         $('input[name=profile_picture]').click();
      });
      $('.logoUploadBtn').click(function(){
         $('input[name=site_logo]').click();
      });
      $('.faviconUploadBtn').click(function(){
         $('input[name=favicon]').click();
      });

      function showImage(input){
         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
               $('#profile_picture').attr('src', e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
         }
      }
      $('.btn-remove').on('click',function(){
      let curElm = $(this),
          domImg = curElm.parent().parent().find('img'),
          imgPath = domImg.length && domImg.attr('src'),
          defaultImgPath = domImg.length && domImg.data('default-image'),
          hdnInput = domImg.length && domImg.data('hdninput');
          imgPath !='' && (
            $(`input[name=${hdnInput}]`).val(1),
             domImg.attr('src', defaultImgPath)
         )
      })

      function showSiteLogo(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function(e) {
               $('#site_logo_img').attr('src', e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
       }
     }

     function showFavicon(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function(e) {
                 $('#favicon_img').attr('src', e.target.result);
             }
             reader.readAsDataURL(input.files[0]);
         }
     }

     function showFooterLogoImg(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function(e) {
                 $('#footer_logo_img').attr('src', e.target.result);
             }
             reader.readAsDataURL(input.files[0]);
         }
     }
     
   </script>
@endpush
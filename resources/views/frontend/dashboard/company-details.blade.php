@extends('frontend.layouts.master')
@section('title','Company Details')
@section('frontendContent')
<div class="body__content__main user__account__wrapp">
   <div class="user__profile__main">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-3">
               @include('frontend.dashboard.sidebar')
            </div>
            <div class="col-lg-8 col-md-9">
               <div class="profile__details">
                  <p>Let BNCEP members get to know you by personalizing your profile.</p>
                  <form action="{{ route('update-company-details') }}" method="POST">
                     {{ csrf_field() }}
                     <div class="form__wrapp">
                        <div class="form-group form__group">
                           <label>Name of the company</label>
                           <input type="text" class="form-control form__control" name="name_of_company" value="{{ old('name_of_company', $user->name_of_company ?? '') }}" placeholder="Name of the company" />
                        </div>
                        <div class="form-group form__group">
                           <label>Company Turnover</label>
                           <input type="text" class="form-control form__control" name="company_turn_over" value="{{ old('company_turn_over', $user->company_turn_over ?? '') }}" placeholder="Company turnover" />
                        </div>
                        <div class="form-group form__group">
                           <label>No of employee</label>
                           <input type="text" class="form-control form__control" name="number_of_employee" value="{{ old('number_of_employee', $user->number_of_employee ?? '') }}" placeholder="No of employee" />
                        </div>
                        <button class="submit__btn" type="submit">Save Changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@extends('frontend.layouts.master')
@section('title','Members')
@section('frontendContent')
<div class="body__content__main user__account__wrapp">
   <div class="user__profile__main">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-3">
               @include('frontend.dashboard.sidebar')
            </div>
            <div class="col-lg-8 col-md-9">
               <div class="profile__details profile__detail__members">
                  <h1>Organization Members</h1>
                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release.</p>
                  <form action="{{ route('member-search') }}" action="GET">
                     <div class="form__wrapp">
                        <div class="form-group form__group">
                           <div class="input-group input__group__search">
                              <i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/search.svg') }}" alt=""></i>
                              <input type="text" class="form-control form__control" name="member" required placeholder="Search for a member" />
                           </div>
                        </div>
                        <button class="submit__btn submit__btn__with__color" type="submit">Search Member</button>
                     </div>
                  </form>
                  <div class="search__results">
                     <div class="table__header__wrapp">
                        <div class="table__header table__header__name">Name</div>
                        <div class="table__header table__header__organization">Organization Name</div>
                        <div class="table__header table__header__role">Member Type</div>
                     </div>

                     @forelse ($members as $member)
                     <div class="table__body">
                        <div class="table__body__content member__profile__name">
                           <div class="member__profile__pic">{{ substr($member->first_name, 0,1).''.substr($member->last_name, 0,1) }}</div>
                           <div class="member__profile">
                              <h3>{{ $member->first_name.' '.$member->last_name }}</h3>
                              <p>{{ $member->email }}</p>
                           </div>
                        </div>
                        <div class="table__body__content member__profile__organization">
                           <div class="member__profile">
                              {{-- <p>Org. Name 1</p> --}}
                              <p>{{ $member->userDetails->organization_name ?? '' }}</p>
                           </div>
                        </div>
                        <div class="table__body__content member__profile__role">
                           <div class="member__profile">
                              <p>BNCEP Members</p>
                           </div>
                        </div>
                     </div>
                     @empty
                        <h2>No data found!!</h2>
                     @endforelse
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
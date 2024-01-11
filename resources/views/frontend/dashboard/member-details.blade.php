@extends('frontend.layouts.master')
@section('title','Member Details')
@section('frontendContent')
<div class="body__content__main user__account__wrapp">
   <div class="members__search__wrapp">
      <div class="container">
         <p>About {{ $totalMembersCount }} results</p>
         <div class="search__wrapp">
            @forelse ($members as $member)
            <div class="member__card">
               <div class="image__box"><img 
                  src="{{ !empty($member->profile_picture) ? asset('storage/users/'.$member->profile_picture) : asset('frontend_assets/assets/images/member-3.png') }}" alt="" /></div>
               <div class="member__details">
                  <h2>{{ $member->first_name.' '.$member->last_name }}</h2>
                  <ul>
                     <li>Founder, Orange Child Foundation</li>
                     <li>BNCEP Member</li>
                  </ul>
                  <div class="member__location">
                     <p>{{ $member->userDetails->address ?? '' }}</p>
                  </div>
               </div>
               <div class="btn__wrapp">
                  <a href="#">View Details</a>
               </div>
            </div>
            @empty
               <h2>No data found!</h2>
            @endforelse


         </div>
         <div class="page__navigation">
          <ul class="pagination__wrapp">
      
              @if ($members->onFirstPage())
                  <li class="disabled"><span>&laquo; Previous</span></li>
              @else
                  <li class="previous__nav">
                      <a href="{{ $members->previousPageUrl() }}" rel="prev">
                          <i class="ico__box">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                                  <path d="M3.76923 8.5L4.52846 7.69429L2.06231 5.07143H14V3.92857H2.06231L4.53385 1.30571L3.76923 0.5L0 4.5L3.76923 8.5Z" fill="#84939E"/>
                              </svg>
                          </i>
                          Previous
                      </a>
                  </li>
              @endif

              @foreach ($members->getUrlRange(1, $members->lastPage()) as $page => $url)
                  <li class="{{ $page == $members->currentPage() ? 'active' : '' }}">
                      <a href="{{ $url }}">{{ $page }}</a>
                  </li>
              @endforeach

              @if ($members->hasMorePages())
                  <li class="next__nav">
                      <a href="{{ $members->nextPageUrl() }}" rel="next">
                          Next
                          <i class="ico__box">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                                  <path d="M10.2308 0.5L9.47154 1.30571L11.9377 3.92857L-9.53674e-07 3.92857V5.07143L11.9377 5.07143L9.46615 7.69429L10.2308 8.5L14 4.5L10.2308 0.5Z" fill="#84939E"/>
                              </svg>
                          </i>
                      </a>
                  </li>
              @else
                  <li class="disabled"><span>Next &raquo;</span></li>
              @endif
          </ul>
         </div>

      </div>
   </div>
</div>
@endsection
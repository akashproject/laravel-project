@extends('frontend.layouts.master')
@section('title', $page->title)
@section('frontendContent')

<div class="main__banner main__banner__inner" style="background-image:url('<?= (isset($page->banner)) ? asset('storage/pages').'/'.$page->banner: asset('frontend_assets/assets/images/inner-page-banner.jpg') ?>');">
   <div class="bannre__content">
      <div class="container">
         <div class="bannre__content__inner__wrapp">
            <div class="breadcrumb__wrapp">
               <ul>
                  <li><a href="{{ route('home') }}"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/home-ico.svg') }}" alt="" /></i>{{ $page_content->about_banner_bread_crumb_title ?? 'Home' }}</a></li>
                  <li>{{ $page_content->about_banner_subtitle ?? '' }}</li>
               </ul>
            </div>
            <h1>{{ $page_content->contact_title ?? '' }}</h1>
            {!! Str::words($page_content->about_banner_content ?? '',13) !!}
         </div>
      </div>
   </div>
</div>

@if ($page->page_template == "template_contact")
   @include('frontend.pages.contact-us')

@elseif($page->page_template == "template_default" && $page->slug == "terms-condition")
   @include('frontend.pages.terms-and-condition')

@elseif($page->page_template == "template_default" && $page->slug == "privacy-policy")
   @include('frontend.pages.privacy-policy')

@elseif($page->page_template == "template_blog" && $page->slug == "blogs")
   @include('frontend.listing.blogs')

@elseif($page->page_template == "template_event" && $page->slug == "events")
   @include('frontend.listing.events')

@elseif($page->page_template == "template_program" && $page->slug == "programs")
   @include('frontend.listing.programs')

@elseif($page->page_template == "template_donation" && $page->slug == "donation")
   @include('frontend.pages.donation')

{{-- @elseif($page->page_template == "page_template" && $page->slug == "about-us")
   @include('frontend.pages.donation') --}}

@endif


@endsection
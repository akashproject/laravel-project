<footer>
	<div class="container">
		<div class="newsletter__wrapp">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="sub__heading">
						<h3>{{ $setting['subscribe_title'] ?? '' }}</h3>
					</div>
					<h2>{{ $setting['subscribe_subtitle'] ?? '' }}</h2>
				</div>
				<div class="col-lg-6 col-md-6">
					<form>
						<div class="form-group form__group">
							<input type="text" class="form-control form__control" placeholder="Enter your email" />
							<button type="submit" class="submit__btn">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer__middle__widget">
			<div class="text__widget">
				<div class="footer__brand">
					<img src="{{ !empty($setting['footer_logo']) ? asset('storage/site_settings/'.$setting['footer_logo']) : asset('frontend_assets/assets/images/default-image.png')}}" alt="" />
				</div>
				<p>{{ $setting['site_description'] ?? '' }}</p>
			</div>
			<div class="links__widget">
				<div class="widget__card">
					<h3>Menus</h3>
					<ul>
						@isset($footer_menus_1)
            			@foreach ($footer_menus_1 as $key=>$menu)
						<li><a href="{{ route('showDynamicPage', $menu['link']) }}">{{ $menu['label'] }}</a></li>
						@endforeach
            			@endisset
						
					</ul>
				</div>
				<div class="widget__card">
					<h3>Information</h3>
					<ul>
						@isset($footer_menus_2)
            			@foreach ($footer_menus_2 as $key=>$menu)
						<li><a href="{{ route('showDynamicPage', $menu['link']) }}">{{ $menu['label'] }}</a></li>
						@endforeach
            			@endisset
					</ul>
				</div>
				<div class="widget__card">
					<h3>Important Link</h3>
					<ul>
						@isset($footer_menus_3)
            			@foreach ($footer_menus_3 as $key=>$menu)
						<li><a href="{{ route('showDynamicPage', $menu['link']) }}">{{ $menu['label'] }}</a></li>
						@endforeach
            			@endisset
					</ul>
				</div>
			</div>
		</div>
		<div class="footer__bottom">
			{{-- <p>&copy; 2023 BNCEP. All Rights Reserved.</p> --}}
			<p>&copy; {{ date('Y').' '.$setting['footer_text'] ?? '' }}</p>
		</div>
	</div>
</footer>
<header class="top-navigation-section header-main-1">
    <div class="top-nav-bar">
    <div class="top-nav-bar-inner container">
        <div class="row">
        <div class="contact-info col-md-6 col-sm-6 col-xs-10">
            @if(config('settings.contact_email')) <span class="contact-info-item"><a href="mailto:{{config('settings.contact_email')}}"> <i class="fa fa-envelope"></i> {{config('settings.contact_email')}}</a> </span> |@endif
            @if(config('settings.contact_number'))
    				<span><i class="fa fa-phone"></i> {{config('settings.contact_number')}} </span>

                @else
                <br><br>
                @endif
            @if(config('settings.allow_multi_language'))
            @if(count(\App\Helpers\Helper::supportedLanguages()) > 1)
            <div class="dropdown pull-left custom_multi_lang">
                <a href="javascript:void(0)" class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-language"></i>
                    <span class="label label-sm">
                        @if(isset(\App\Helpers\Helper::supportedLanguages()[session('language')]))
                        {{\App\Helpers\Helper::supportedLanguages()[session('language')]}}
                        @else
                        {{\App\Helpers\Helper::supportedLanguages()[\App::getLocale()]}}
                        @endif
                    </span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    @foreach(\App\Helpers\Helper::supportedLanguages() as $key => $value)
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="{{route('front.index', [$key])}}">{{$value}}</a>
                    </li>
                    @endforeach
                </ul>
                &nbsp;
            </div>
            @endif
            @endif
        </div>

        <div class="right-top-nav-items col-md-6 col-sm-6 col-xs-2 text-right" style="float: right; ">
            @if(Auth::check())
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-user"></i>
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('front.account')}}"><i class="fa fa-user"></i> @lang('Account Overview')</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('front.orders.index')}}"><i class="fa fa-shopping-cart"></i>@lang('Orders')</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('front.addresses.index')}}"><i class="fa fa-truck"></i>@lang('Addresses')</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('front.settings.profile')}}"><i class="fa fa-wrench"></i>@lang('Edit Profile')</a></li>
                    @if(Auth::user()->vendor)
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('front.vendor.profile')}}"><i class="fa fa-user"></i>@lang('Vendor Profile')</a></li>
                    @endif
                    @if(Auth::user()->role)
                        <li role="presentation" class="divider"></li>
                        @if(Auth::user()->vendor && isset(Auth::user()->vendor->approved) && Auth::user()->isApprovedVendor())
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/manage/vendor/dashboard')}}"><i class="fa fa-wrench"></i> @lang('Manage')</a></li>
                        @elseif(Auth::user()->isSuperAdmin() || Auth::user()->can('view-dashboard', \App\Other::class) )
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/manage')}}"><i class="fa fa-wrench"></i> @lang('Manage')</a></li>
                        @endif
                    @endif
                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="logout();" href="#"><i class="fa fa-sign-out"></i> @lang('Logout')</a></li>
                    <form id="logout_form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                    <script>
                        function logout() {
                            var logoutForm = $('#logout_form');
                            if (!logoutForm.hasClass('form-submitted')) {
                                logoutForm.addClass('form-submitted');
                                logoutForm.submit();
                            }
                        }
                    </script>
                </ul>
            </div>
            @else
            <a href="{{url('/login')}}"><i class="fa fa-sign-in"></i> @lang('Login')</a>
            <a href="{{url('/register')}}"><i class="fa fa-user"></i> @lang('Signup')</a>
            @endif
        </div>
        </div>
        @if(config('settings.enable_google_translation'))
            <span id="google_translate_element"></span>
        @endif
        <div class="clearfix"></div>
    </div>
    </div>
    <div class="header-container header-main-2">

        <div class="container">
        <nav class="main-menu">
		<div class="col-md-3 col-sm-3 col-xs-3">
			 <a class="logo-link navbar-header" href="{{url('/')}}" data-toggle="tooltip" title="{{session('location')}}">
				@if(config('settings.site_logo_enable'))
				<img class=" img-responsive" id="site-logo" alt="{{config('settings.site_logo_name') . ' Logo'}}" src="{{route('imagecache', ['large', config('settings.site_logo')])}}">
				&nbsp;
				@endif
				{{-- <strong>{{config('settings.site_logo_name')}}</strong> --}}
			</a>
		</div>

            <div class="search-bar col-md-6 col-sm-6 col-xs-6">
            {!! Form::open(['method'=>'get', 'action'=>['FrontController@search'], 'role'=>'search', 'class'=>'navbar-form', 'autocomplete'=>'off' ,'onsubmit'=>'submit_button.disabled = true; submit_button.value = "' . __('Please Wait...') . '"; return true;']) !!}
                <div class="search-form-box">
                <div class="input-group search-form">
                    {!! Form::text('keyword', null, ['id'=>'search-keyword' ,'class'=>'form-control', 'placeholder'=>__('Enter Keyword Here...'), 'required', 'autofocus']) !!}
                    <span class="input-group-btn">
                        {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class'=>'btn btn-primary search-btn', 'name'=>'submit_button']) !!}
                    </span>
                </div>
                    <ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front"></ul>
                </div>

            {!! Form::close() !!}
            </div>
            <div class="cart-wishlist-box col-md-3 col-sm-3 col-xs-3">


                @if(Auth::check())
                <a class="menu-item-first cart-bucket menu-button" href="{{url('/products/wishlist')}}"> <i class="fa fa-heart"></i>&nbsp;&nbsp;<span class="badge cart-count">{{Auth::user()->favouriteProducts()->count()}}</span></a>
                @endif
                <div class="dropdown-wrapper dropdown-wrapper-cart menu-button">
                <a class="menu-item-first custom_header_cart cart-bucket menu-button" href="javascript:void(0)"> <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;<span class="badge cart-count">{{Cart::content()->count()}}</span> </a>
                <div class="drop-menu cart-items-hover cart-menu fade-in effect">
                    @include('includes.ajax-pages.cart_modal')
                </div>
            </div>
            </div>
        </nav>
    </div>
    </div>
</header>

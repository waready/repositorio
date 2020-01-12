@extends('layouts.seed')

@section('content')
<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row">
				<ul class="header-dropdown-list hidden-xs">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{__("Idioma")}}  <img src="img/blank.gif" class="flag flag-us" alt="United States"> <span> US</span> <i class="fa fa-angle-down"></i> </a>
						<ul class="dropdown-menu pull-right">
							<li class="active">
								<a href="{{ route('set_language', ['es']) }}"><img src="img/blank.gif" class="flag flag-es" alt="Spanish"> 
									{{ __("Español") }}
								</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-fr" alt="France">
									Français
								</a>
							</li>
							<li>
								<a href="{{ route('set_language', ['en']) }}"><img src="img/blank.gif" class="flag flag-us" alt="United States"> 
									{{ __("Inglés") }} (US)
								</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-de" alt="German"> 
									Deutsch
								</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-jp" alt="Japan"> 
									日本語
								</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-cn" alt="China"> 
									中文
								</a>
							</li>	
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-it" alt="Italy"> 
									Italiano
								</a>
							</li>	
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-pt" alt="Portugal"> 
									Portugal
								</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-ru" alt="Russia"> 
									Русский язык
								</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-kr" alt="Korea"> 
									한국어
								</a>
							</li>						
							
						</ul>
					</li>
				</ul>
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
				<h1 class="txt-color-red login-header-big">
					Colegio de Ingenieros cede Puno
				</h1>
				

				<div class="hero">

					<div class="pull-left login-desc-box-l">
						<h4 class="paragraph-header">
							{{__("Info")}}
						</h4>
						<div class="login-app-icons">
							<a href="javascript:void(0);" class="btn btn-danger btn-sm">{{__("pagina")}}</a>
							<a href="javascript:void(0);" class="btn btn-danger btn-sm">{{__("mass")}}</a>
						</div>
					</div>
					
					<img src="img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h5 class="about-heading">{{__("About")}}</h5>
						<p>
							{{__("about_info")}}
						</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h5 class="about-heading">{{__("expe")}}</h5>
						<p>
							{{__("expe_info")}}
						</p>
					</div>
				</div>

			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				<div class="well no-padding">
					<form method="POST" action="{{ route('login') }}"  class="smart-form client-form">
						@csrf	
						<header>
							{{ __('Login') }}
						</header>

						<fieldset>
							
							<section>
								<label class="label">{{ __('Correo electrónico') }}</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
							</section>

							<section>
								<label class="label">{{ __('Contraseña') }}</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input id="password" type="password" name="password" required>
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
									@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								<div class="note">
									@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('¿Has olvidado el password?') }}
									</a>
								@endif
								</div>
							</section>

							<section>
								<label class="checkbox">
									<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<i></i>{{ __('Recordar') }}</label>
							</section>
						</fieldset>
						<footer>
							<button type="submit" class="btn btn-primary">
								{{ __('Login') }}
							</button>
						</footer>
					</form>

				</div>
				
				<h5 class="text-center"> - {{__("O inicia sesión usando")}} -</h5>
													
					<ul class="list-inline text-center">
						<li>
							<a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
						</li>
					</ul>
				
			</div>
		</div>
	</div>

</div>
@endsection

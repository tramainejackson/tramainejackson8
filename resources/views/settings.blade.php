@extends('layouts.app')

@section('content')

	<div class="container py-3" id="content_container">

		<form class="" id="content_container" action="{{ action('HomeController@settings_update', $setting->id) }}" method="POST" enctype="multipart/form-data">

			{{ method_field('POST') }}
			{{ csrf_field() }}

			<div class="row my-4">

				<div class="col-12 col-md text-lg-right">
					<p class="my-0"><i>Since:</i>&nbsp;<span class="text-muted settingsCounterDate">{{ $setting->hit_count_date != null ? $setting->hit_count_date : date('m/d/Y') }}</span></p>

					<p class="my-0"><i>Website Hit Count:</i>&nbsp;<span class="text-muted settingsCounter">{{ $setting->hit_count != null ? $setting->hit_count : 0 }}</span></p>

					<button class="btn btn-sm btn-rounded orange darken-2 resetCounterBtn white-text" type="button">Reset Count</button>
				</div>

				<div class="col-12">
				</div>

			</div>

			<div class="row my-4">
				<div class="col-12">
					<h1 class="text-muted"><u>Mission Statement</u></h1>
				</div>

				<div class="col">
					<div class="md-form">
						<textarea name="mission" class="form-control md-textarea black-text" placeholder="Content will display in dropdown on welcome page" rows="5" style="height:auto">{{ $setting->mission }}</textarea>
						<label for="mission">Mission Statement</label>
					</div>
				</div>
			</div>

			<div class="row my-4">
				<div class="col-12">
					<h1 class="text-muted"><u>About Me Content</u></h1>
				</div>

				<div class="col">
					<div class="md-form">
						<textarea name="about_me" class="form-control md-textarea black-text" placeholder="Content will display on about me page" rows="5" style="height:auto" {{$errors->has('about_me') ? 'autofocus' : '' }}>{{ $setting->about_me }}</textarea>
						<label for="about_me">About Me</label>
					</div>
				</div>

				@if ($errors->has('about_me'))
					<span class="help-block">
						<strong>{{ $errors->first('about_me') }}</strong>
					</span>
				@endif
			</div>

			<div class="row my-4">
				<div class="col-12">
					<h1 class="text-muted"><u>Contact Settings</u></h1>
				</div>
				<div class="col-12 col-md-6">
					<div class="md-form">
						<input type="number" name="phone" class="form-control" value="{{ $setting->phone }}" placeholder="Enter Phone" {{$errors->has('phone') ? 'autofocus' : '' }} />
						<label for="phone">Phone Number</label>
					</div>

					@if ($errors->has('phone'))
						<span class="red-text">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-12 col-md-6">
					<div class="md-form">
						<input type="email" name="email" class="form-control" value="{{ $setting->email }}" placeholder="Enter Email Address" {{$errors->has('email') ? 'autofocus' : '' }} />
						<label for="email">Email Address</label>
					</div>

					@if($errors->has('email'))
						<span class="red-text">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class="form-group">

						<button class="btn btn-primary btn-block" type="submit">Save Changes</button>

					</div>
				</div>
			</div>
		</form>
	</div>
@endsection
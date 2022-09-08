@php use App\Http\Controllers\MessageController; @endphp

<div id="contact" class="container mt-5">

	<div class="streak1">
		<div class="flex-center">
			<ul class="list-unstyled">
				<li><h2 class="h2-responsive mt-5 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">Want an outstanding project?</h2></li>
				<li><h5 class="h5-responsive wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">Just send me a message!</h5></li>
			</ul>
		</div>
	</div>

	<!-- Section: Contact v.2 -->
	<section id="contact" class="section pb-5 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">

		<!-- Section heading -->
		<h2 class="section-heading h1 pt-4">Contact Me</h2>

		<div class="row">

			<!-- Grid column -->
			<div class="col-md-8 col-xl-9">

				<form action="{{ action([MessageController::class, 'store']) }}" method="POST">

					{{ csrf_field() }}

					<!-- Grid row -->
					<div class="row">

						<!-- Grid column -->
						<div class="col-md-6">
							<div class="md-form">
								<div class="md-form">
									<input type="text" id="contact-name" class="form-control" name="message_name" value="{{ old('message_name') }}" {{ $errors->any() ? 'autofocus' : '' }} required>
									<label for="contact-name" class="">Your name</label>
								</div>
							</div>

							@if($errors->has('message_name'))
								<div class="red-text">
									<span class="">{{ $errors->first('message_name') }}</span>
								</div>
							@endif
						</div>
						<!-- Grid column -->

						<!-- Grid column -->
						<div class="col-md-6">
							<div class="md-form">
								<div class="md-form">
									<input type="email" id="contact-email" class="form-control" name="message_email" value="{{ old('message_email') }}" required>
									<label for="contact-email" class="">Your email</label>
								</div>
							</div>

							@if($errors->has('message_email'))
								<div class="red-text">
									<span class="">{{ $errors->first('message_email') }}</span>
								</div>
							@endif
						</div>
						<!-- Grid column -->

					</div>
					<!-- Grid row -->

					<!-- Grid row -->
					<div class="row">
						<div class="col-md-12">
							<div class="md-form">
								<input type="text" id="contact-Subject" class="form-control" name="message_subject" value="{{ old('message_subject') }}" required>
								<label for="contact-Subject" class="">Subject</label>
							</div>

							@if($errors->has('message_subject'))
								<div class="red-text">
									<span class="">{{ $errors->first('message_subject') }}</span>
								</div>
							@endif
						</div>
					</div>
					<!-- Grid row -->

					<!-- Grid row -->
					<div class="row mb-4">

						<!-- Grid column -->
						<div class="col-md-12">
							<div class="md-form">
								<textarea type="text" name="message_body" id="contact-message" class="md-textarea form-control" rows="3" required>{{ old('message_body') }}</textarea>
								<label for="contact-message">Your message</label>
							</div>

							@if($errors->has('message_body'))
								<div class="red-text">
									<span class="">{{ $errors->first('message_body') }}</span>
								</div>
							@endif
						</div>
					</div>
					<!-- Grid row -->

					<div class="text-center text-md-left mb-4">
						<button type="submit" class="btn btn-light-blue waves-effect waves-light">Send</button>
					</div>

				</form>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-4 col-xl-3">
				<ul class="contact-icons">
					<li><i class="fa fa-map-marker fa-2x"></i>
						<p>Philadelphia, PA 19140, USA</p>
					</li>

					<li><i class="fa fa-phone fa-2x"></i>
						<p>+ 1 {{ $setting->phone }}</p>
					</li>

					<li><i class="fa fa-envelope fa-2x"></i>
						<p>{{ $setting->email }}</p>
					</li>
				</ul>
			</div>
			<!-- Grid column -->
		</div>

	</section>
	<!-- Section: Contact v.2 -->

</div>
<!-- Contact form -->

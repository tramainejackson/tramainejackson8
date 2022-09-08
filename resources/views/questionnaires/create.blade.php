@php use App\Http\Controllers\QuestionnaireController; @endphp

<x-app-layout>

    @section('addt_scripts')
        <script type="text/javascript">
            $('#companyRecruiterNav').remove();
        </script>
    @endsection

    @section('addt_styles')
        <style>
            .avatar {
                transform: translatey(0px);
                animation: float 6s ease-in-out infinite;
                max-width: 350px;
            }
        </style>
    @endsection

    @include('components.intro')

    <div class="container mb-5 pt-5 position-relative" id="">

        <div class="row" id="">

            <div class="col-12 col-lg-8 mx-auto">

                <div class="card" style="border-radius: 0.25rem 0.25rem 0rem 0rem;">

                    <div class="card-body" id="">

                        <form method="POST" action="{{ action([QuestionnaireController::class, 'store']) }}" class=""
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="my-2">
                                <h2 class="py-2">New Website Questionnaire</h2>
                            </div>

                            <div class="md-form">
                                <label class="mdb-main-label" for="owner">Full Name</label>

                                <input type="text" name="owner" class="form-control" placeholder="Enter Your Full Name"
                                       value="{{ old('owner') }}" required autofocus/>

                                @if($errors->has('owner'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('owner') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="md-form">
                                <label class="mdb-main-label" for="company_name">Business/Company Name</label>

                                <input type="text" name="company_name" class="form-control"
                                       placeholder="Enter Business/Company Name" value="{{ old('company_name') }}"/>

                                @if($errors->has('company_name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="md-form">
                                <label class="mdb-main-label">Email Address</label>

                                <input type="email" name="owner_email" class="form-control"
                                       placeholder="Enter Your Email Address" value="{{ old('owner_email') }}"
                                       required/>

                                @if ($errors->has('owner_email'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('owner_email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="md-form input-group">
                                <label class="mdb-main-label" for="domain_name">Expected Domain Name</label>

                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon pl-0" style="padding-top: 0.6rem;">https://www.</span>
                                </div>

                                <input type="text" style="padding-top: 0.6rem;" class="form-control" name="domain_name"
                                       placeholder="Ex: tramainejackson.com" aria-label="Ex: tramainejackson.com"
                                       value="{{ old('domain_name') }}"/>

                                @if ($errors->has('domain_name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('domain_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="md-form">
                                <label class="mdb-main-label" for="model_domain_name">Do you have a website that you
                                    like the look of that your website could model after?</label>

                                <input type="text" class="form-control" name="model_domain_name"
                                       placeholder="Model Website" aria-label="Model Website"
                                       value="{{ old('model_domain_name') }}"/>

                                @if ($errors->has('model_domain_name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('model_domain_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div id="social_media_group">

                                <div class="row">

                                    <div class="col-10 col-sm-4 mx-auto">
                                        <div class="md-form input-group">
                                            <label class="mdb-main-label" for="instagram">Instagram</label>

                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon" style="padding-top: 0.6rem;"><i
                                                        class="fab fa-instagram"></i></span>
                                            </div>

                                            <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                                   name="instagram" placeholder="Ex: @jolly_holly69"
                                                   aria-label="Ex: @jolly_holly69" value="{{ old('instagram') }}"/>

                                            @if ($errors->has('instagram'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('instagram') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-10 col-sm-4 mx-auto">
                                        <div class="md-form input-group">
                                            <label class="mdb-main-label" for="facebook">Facebook</label>

                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon" style="padding-top: 0.6rem;"><i
                                                        class="fab fa-facebook-square"></i></span>
                                            </div>

                                            <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                                   name="facebook"
                                                   placeholder="Ex: www.facebook.com/JacksonRentalHomes/"
                                                   aria-label="Ex: www.facebook.com/JacksonRentalHomes/"
                                                   value="{{ old('facebook') }}"/>

                                            @if ($errors->has('facebook'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('facebook') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-10 col-sm-4 mx-auto">
                                        <div class="md-form input-group">
                                            <label class="mdb-main-label" for="twitter">Twitter</label>

                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon" style="padding-top: 0.6rem;"><i
                                                        class="fab fa-twitter-square"></i></span>
                                            </div>

                                            <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                                   name="twitter" placeholder="Ex: @25__mustgo"
                                                   aria-label="Ex: @25__mustgo" value="{{ old('twitter') }}"/>

                                            @if ($errors->has('twitter'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('twitter') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-0">Complete Questionnaire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Main layout-->

</x-app-layout>

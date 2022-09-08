@php use App\Http\Controllers\QuestionnaireController; @endphp

<x-app-layout>

    @section('addt_scripts')
        <script type="text/javascript">
            $('#companyRecruiterNav').remove();
        </script>
    @endsection

    @include('components.intro')

    <div class="container mb-5 pt-5 position-relative" id="">

        @if($questionnaire->completed == 'N')

            <div class="row" id="">

                <div class="col-12 col-lg-8 mx-auto">

                    <div class="card" style="border-radius: 0.25rem 0.25rem 0rem 0rem;">

                        <div class="card-body" id="">

                            <form method="POST"
                                  action="{{ action([QuestionnaireController::class, 'web_post'], $questionnaire->id) }}" class=""
                                  enctype="multipart/form-data">

                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="my-2 text-center">
                                    <h2 class="py-2">New Website Questionnaire</h2>
                                </div>

                                <div class="">
                                    <label class="mdb-main-label" for="logo">Logo</label>

                                    <img class="d-block"
                                         src="{{ asset('/storage/images/' . $questionnaire->website->logo) }}"
                                         alt="Logo" height="250px" width="250px"/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="owner">Full Name</label>

                                    <input type="text" name="owner" class="form-control"
                                           placeholder="Enter Your Full Name"
                                           value="{{ old('owner') ? old('owner') : $questionnaire->owner }}" required/>

                                    @if($errors->has('owner'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('owner') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="company_name">Business/Company Name</label>

                                    <input type="text" name="company_name" class="form-control"
                                           placeholder="Enter Business/Company Name"
                                           value="{{ old('company_name') ? old('company_name') : $questionnaire->company_name }}"
                                           required/>

                                    @if($errors->has('company_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label">Email Address</label>

                                    <input type="email" name="owner_email" class="form-control"
                                           placeholder="Enter Your Email Address"
                                           value="{{ old('owner_email') ? old('owner_email') : $questionnaire->owner_email }}"
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

                                    <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                           name="domain_name" placeholder="Ex: tramainejackson.com"
                                           aria-label="Ex: tramainejackson.com"
                                           value="{{ old('domain_name') ?  old('domain_name') : $questionnaire->projected_domain  }}"
                                           required/>

                                    @if ($errors->has('domain_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('domain_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form" id="">

                                    <!-- Description -->
                                    <textarea name="description" id="description" class="md-textarea form-control"
                                              rows="3"
                                              aria-placeholder="Describe Your Business">{{ old('description') ? old('description') : $questionnaire->description }}</textarea>

                                    <label for="description">Please Describe Your Business</label>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form" id="">

                                    <!-- Company Slogan/Mission Statement -->
                                    <textarea name="mission" id="mission" class="md-textarea form-control" rows="3"
                                              aria-placeholder="Mission Statement"
                                              placeholder="Mission Statement">{{ old('mission') ? old('mission') : $questionnaire->mission }}</textarea>

                                    <label for="mission">Please Add Your Company's Mission Statement</label>

                                    @if ($errors->has('mission'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mission') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form" id="">

                                    <!-- Website Design -->
                                    <textarea name="website_design" id="website_design" class="md-textarea form-control"
                                              rows="3" aria-placeholder="Website Design" placeholder="Website Design"
                                              aria-label="website_design">{{ old('website_design') ? old('website_design') : $questionnaire->website_design }}</textarea>

                                    <label for="website_design">Design Preference (Colors, Concepts and Vision)</label>

                                    @if ($errors->has('website_design'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('website_design') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form input-group mb-4">

                                    <label class="" for="model_domain_name">Do you have a website that you like the look
                                        of that your website could model after?</label>

                                    <input type="text" class="form-control pl-0" name="model_domain_name"
                                           aria-placeholder="Model Website" placeholder="Model Website"
                                           aria-label="modal_domain_name"
                                           value="{{ old('model_domain_name') ? old('model_domain_name') : $questionnaire->modal_domain }}"/>

                                    <div class="input-group-append">
                                        <span class="input-group-text md-addon" id="">.com</span>
                                    </div>
                                </div>

                                @if ($errors->has('model_domain_name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('model_domain_name') }}</strong>
                                    </span>
                                @endif

                                <div class="form-group">
                                    <select class="mdb-select md-form" name="tabs[]" multiple editable="true"
                                            searchable="Search and Add Here"
                                            data-placeholder="Select All Options That Apply. Add Options If Not Listed">
                                        <option value="about">About</option>
                                        <option value="blog">Blog</option>
                                        <option value="contact">Contact</option>
                                        <option value="faq">FAQ</option>
                                        <option value="home">Home</option>
                                        <option value="privacy">Privacy Policy</option>
                                        <option value="products">Products</option>
                                        <option value="reviews">Reviews</option>
                                        <option value="services">Services</option>
                                        <option value="terms">Terms and Conditions</option>
                                    </select>

                                    <label class="mdb-main-label" for="tabs">Select/Add All Tabs You Will Need</label>

                                    <button class="btn-save btn btn-primary btn-sm">Save</button>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="contact">Contact Information For Website</label>

                                    <input type="text" class="form-control" name="contact"
                                           aria-placeholder="Contact Information" placeholder="Contact Information"
                                           aria-label="contact"
                                           value="{{ old('contact') ? old('contact') : $questionnaire->contact }}"/>

                                    @if ($errors->has('contact'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div id="social_media_group">

                                    <div class="row">

                                        <div class="col-10 col-sm-4 mx-auto">
                                            <div class="md-form input-group">
                                                <label class="mdb-main-label" for="instagram">Instagram</label>

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text md-addon"
                                                          style="padding-top: 0.6rem;"><i class="fab fa-instagram"></i></span>
                                                </div>

                                                <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                                       name="instagram" placeholder="Ex: @jolly_holly69"
                                                       aria-label="Ex: @jolly_holly69"
                                                       value="{{ old('instagram') ? old('instagram') : $questionnaire->instagram }}"/>

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
                                                    <span class="input-group-text md-addon"
                                                          style="padding-top: 0.6rem;"><i
                                                            class="fab fa-facebook-square"></i></span>
                                                </div>

                                                <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                                       name="facebook"
                                                       placeholder="Ex: www.facebook.com/JacksonRentalHomes/"
                                                       aria-label="Ex: www.facebook.com/JacksonRentalHomes/"
                                                       value="{{ old('facebook') ? old('facebook') : $questionnaire->facebook }}"/>

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
                                                    <span class="input-group-text md-addon"
                                                          style="padding-top: 0.6rem;"><i
                                                            class="fab fa-twitter-square"></i></span>
                                                </div>

                                                <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                                       name="twitter" placeholder="Ex: @25__mustgo"
                                                       aria-label="Ex: @25__mustgo"
                                                       value="{{ old('twitter') ? old('twitter') : $questionnaire->twitter }}"/>

                                                @if ($errors->has('twitter'))
                                                    <span class="help-block text-danger">
                                                        <strong>{{ $errors->first('twitter') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12 text-center">
                                        <label class="d-block form-control-label" for="collect_payments">Will You Be
                                            Collecting Payments?</label>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-blue-grey collectPayment btn-rounded"
                                                    style="line-height:1.5">
                                                <input type="checkbox" name="collect_payments" value="Y" hidden/>Yes
                                            </button>
                                            <button type="button"
                                                    class="btn active btn-danger collectPayment btn-rounded"
                                                    style="line-height:1.5">
                                                <input type="checkbox" name="collect_payments" value="N" checked
                                                       hidden/>No
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="payment_collection_group" style="display: none;">
                                    <div class="form-row">
                                        <div class="form-group col-12 text-center">
                                            <label class="d-block form-control-label" for="merchant_account">Do You Have
                                                A Merchant Account?</label>

                                            <div class="btn-group">
                                                <button type="button"
                                                        class="btn btn-blue-grey merchantAccount btn-rounded"
                                                        style="line-height:1.5">
                                                    <input type="checkbox" name="merchant_account" value="Y" hidden/>Yes
                                                </button>
                                                <button type="button"
                                                        class="btn active btn-danger merchantAccount merchantAccountNo btn-rounded"
                                                        style="line-height:1.5">
                                                    <input type="checkbox" name="merchant_account" value="N" checked
                                                           hidden/>No
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <select class="mdb-select md-form" name="collection_types[]" multiple
                                                searchable="Search here.."
                                                data-placeholder="Select All Payment Options That Apply">
                                            <option value="amazon_pay" data-icon="/images/amazon_icon.png"
                                                    class="rounded-circle">Amazon Pay
                                            </option>
                                            <option value="braintree" data-icon="/images/braintree_icon.png"
                                                    class="rounded-circle">Braintree
                                            </option>
                                            <option value="due" data-icon="/images/due_icon.png" class="rounded-circle">
                                                Due
                                            </option>
                                            <option value="cashapp" data-icon="/images/cashapp_icon.png"
                                                    class="rounded-circle">CashApp
                                            </option>
                                            <option value="credit_card" data-icon="/images/bank_card_icon.png"
                                                    class="rounded-circle">Credit Card
                                            </option>
                                            <option value="paypal" data-icon="/images/paypal_icon.png"
                                                    class="rounded-circle">Paypal
                                            </option>
                                            <option value="stripe" data-icon="/images/stripe_icon.png"
                                                    class="rounded-circle">Stripe
                                            </option>
                                            <option value="venmo" data-icon="/images/venmo_icon.png"
                                                    class="rounded-circle">Venmo
                                            </option>
                                            <option value="non_applicable" data-icon="/images/confused_icon.png"
                                                    class="rounded-circle">N/A
                                            </option>
                                        </select>

                                        <label class="mdb-main-label" for="merchant_account">How Will You Be Collecting
                                            Payments?</label>

                                        <button class="btn-save btn btn-primary btn-sm">Save</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mdb-main-label" for="picture">Change To Custom Logo</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Add</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="btn col-4 custom-file-input" name="picture"
                                                   id="customFile"/>
                                            <label for="customFile" class="custom-file-label text-left">Add
                                                Photo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div id="" class="md-form md-outline input-with-post-icon datepicker">
                                        <input id="" class="form-control" type="text" name="completion_date"
                                               placeholder="Select a date" value="{{ old('completion_date') }}"
                                               required/>

                                        <label for="completion_date">Completion Date</label>
                                        <i class="fas fa-calendar input-prefix" tabindex=0></i>
                                    </div>

                                    @if ($errors->has('completion_date'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('completion_date') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ml-0">Complete Questionnaire</button>
                                </div>
                            </form>
                        </div>

                        <div class="price_inclusions">
                            <a class="h2 h2-responsive text-center d-block" data-toggle="collapse"
                               href="#price_inclusions_collapse" aria-expanded="false"
                               aria-controls="price_inclusions_collapse"><i class="fas fa-angle-double-down"></i> <span
                                    class="text-underline blue-text">What's Included In The Price</span> <i
                                    class="fas fa-angle-double-down"></i></a>

                            <div class="price_inclusions_list collapse" id="price_inclusions_collapse">
                                <ul class="mx-auto">
                                    <li>Build and create the application</li>
                                    <li>Purchase Domain Name (Website Name)</li>
                                    <li>Purchase Database</li>
                                    <li>Purchase additional space on private server</li>
                                    <li>Any additional 3rd Party Add-Ons</li>
                                    <li class="yellow darken-3 p-1">$100 Yearly Fee (Renew Domain, Sever & Database
                                        Maintenance/Updates, 100% Website Up Time)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Pricing layout-->
            <div class="container-fluid position-sticky" id="pricing_component" style="bottom:0px; z-index: 100;">
                <div class="row" style="">
                    <div class="col-12 col-lg-8 deep-orange mx-auto rounded-bottom px-3"
                         style="-webkit-box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%); box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);">
                        <div class="d-flex align-items-center justify-content-between py-3">
                            <div class="col">
                                <h1 class="h1 h1-responsive text-left white-text">Total Cost</h1>
                            </div>
                            <div class="col">
                                <h2 class="h1 h1-responsive text-right white-text"><i class="fas fa-dollar-sign"></i>&nbsp;<span
                                        id="payment_amount" class="">500.00</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Pricing layout-->

            <hr class="mt-5"/>

        @else

            <div class="row" id="">

                <div class="col-12 col-lg-8 mx-auto">

                    <div class="card" style="border-radius: 0.25rem 0.25rem 0rem 0rem;">

                        <div class="card-body" id="">
                            <h2 class="text-center">Thank You!</h2>
                            <br/>
                            <p class="">You have already completed the survey. If there are any changes that you need to
                                make or if there is information that was entered incorrectly, please reach out to
                                Tramaine.</p>
                            <br/>
                            <br/>
                            <p class="">Thanks</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!--/Main layout-->

</x-app-layout>

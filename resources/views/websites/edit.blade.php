@php use App\Http\Controllers\WebsiteController; @endphp
@php use App\Http\Controllers\QuestionnaireController; @endphp

<x-app-layout>

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto">

                <div class="py-5" id="">

                    <!-- Title -->
                    <h2 class="display-2 text-center">Websites</h2>

                    <!-- Title -->
                    <p class="text-center">Total Websites: {{ $websites->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row my-5 py-5">

            <div class="col-8 my-4 mx-auto">
                <div class="userNavLinks d-flex flex-column flex-lg-row justify-content-around">
                    <a href="{{ route('websites.index') }}" class="btn btn-outline-dark-green my-1 col-12 col-lg-6">All
                        Websites</a>
                    <a href="{{ route('websites.create') }}" class="btn btn-outline-info my-1 col-12 col-lg-6">Add New
                        Website</a>
                </div>
            </div>

            <div class="col-12 col-lg-10 mx-auto">

                <div class="text-center">
                    <h1 class="d-inline-block">Edit Website</h1>
                </div>

                {{--Update Form--}}
                <form action="{{ action([WebsiteController::class, 'update'], $website->id) }}" method="POST"
                      enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <!-- Member Default Image -->
                    <div class="row memberImg mb-3">
                        <div class="view mx-auto" id="">
                            <img class="hoverable" src="{{ asset('storage/images/' . $website->logo) }}"
                                 alt="Member Image" width="300">

                            <div class="mask d-flex justify-content-center">
                                <button type="button" class="btn align-self-end m-0 p-1 white">Change Image</button>
                                <input type="file" class="hidden" name="avatar" hidden/>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-12 col-sm-9 mx-auto">

                                <div class="form-group">
                                    <label class="form-label">Website Title</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Enter Website Title"
                                           value="{{ $website->title }}" {{ $errors->has('title') ? 'autofocus' : '' }} />

                                    @if($errors->has('title'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Website Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Website Name"
                                           value="{{ $website->name }}" {{ $errors->has('name') ? 'autofocus' : '' }} />

                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Website Link</label>
                                    <input type="text" name="link" class="form-control" value="{{ $website->link }}"
                                           placeholder="Enter Website Link" {{ $errors->has('link') ? 'autofocus' : '' }}/>

                                    @if($errors->has('link'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-row" id="">

                                    <div class="form-group col-6">
                                        <label class="form-label">Website Owner Name</label>
                                        <input type="text" name="owner" class="form-control"
                                               value="{{ $website->owner }}"
                                               placeholder="Enter Website Owner Name" {{ $errors->has('owner') ? 'autofocus' : '' }} />

                                        @if($errors->has('owner'))
                                            <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('owner') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="form-label">Website Owner Email</label>
                                        <input type="email" name="owner_email" class="form-control"
                                               value="{{ $website->owner_email }}"
                                               placeholder="Enter Website Owner Email" {{ $errors->has('owner_email') ? 'autofocus' : '' }} />

                                        @if($errors->has('owner_email'))
                                            <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('owner_email') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-row" id="">

                                    <div class="form-group col-6">
                                        <div class="md-form md-outline input-with-post-icon datepicker" id="">
                                            <input type="text" name="renew_date" id="renew_date" class="form-control"
                                                   value="{{ $website->renew_date->format('m/d/Y') }}"
                                                   placeholder="Enter Renew Date" {{ $errors->has('renew_date') ? 'autofocus' : '' }} />
                                            <label for="renew_date">Renew Date</label>
                                            <i class="fas fa-calendar input-prefix" tabindex=0></i>
                                        </div>

                                        @if($errors->has('renew_date'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('renew_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <div class="md-form md-outline input-with-post-icon datepicker" id="">
                                            <input type="text" name="last_paid_date" id="last_paid_date"
                                                   class="form-control"
                                                   value="{{ $website->last_paid_date->format('m/d/Y') }}"
                                                   placeholder="Enter Last Paid Date" {{ $errors->has('last_paid_date') ? 'autofocus' : '' }} />
                                            <label for="last_paid_date">Last Paid Date</label>
                                            <i class="fas fa-calendar input-prefix" tabindex=0></i>
                                        </div>

                                        @if($errors->has('last_paid_date'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('last_paid_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Amount Due</label>
                                    <input type="number" name="amount_due" class="form-control"
                                           value="{{ $website->amount_due }}" placeholder="Enter Amount Due"
                                           {{ $errors->has('amount_due') ? 'autofocus' : '' }} step="0.01"/>

                                    @if($errors->has('amount_due'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('amount_due') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form" id="">
                                    <!-- Description -->
                                    <textarea name="description" id="description" class="md-textarea form-control"
                                              rows="3">{{ old('description') ? old('description') : $website->description }}</textarea>

                                    <label for="description">Website Description</label>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">

                                    <label for="active" class="d-block form-control-label">Site Active</label>

                                    <div class="btn-group">
                                        <button type="button"
                                                class="btn{{ $website->active == 'Y' ? ' btn-success active' : ' btn-blue-grey' }}">
                                            <input type="checkbox" name="active" value="Y"
                                                   hidden {{ $website->active == 'Y' ? 'checked' : '' }} />Yes
                                        </button>
                                        <button type="button"
                                                class="btn{{ $website->active == 'N' ? ' btn-danger active' : ' btn-blue-grey' }}">
                                            <input type="checkbox" name="active" value="N"
                                                   hidden {{ $website->active == 'N' ? 'checked' : '' }} />No
                                        </button>
                                    </div>
                                </div>

                                <div class="form-row justify-content-center align-items-center my-4" id="">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Site Info</button>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-red" data-toggle="modal"
                                                data-target="#modalConfirmDelete">Remove Website
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                @if($website->questionnaire)
                    @php $questionnaire = $website->questionnaire; @endphp

                    <div class="completed_questionnaire mb-5">
                        <a class="h2 h2-responsive text-center d-block" data-toggle="collapse"
                           href="#questionnaire_collapse" aria-expanded="false"
                           aria-controls="questionnaire_collapse"><i class="fas fa-angle-double-down"></i> <span
                                class="text-underline blue-text">See Questionnnaire Responses</span> <i
                                class="fas fa-angle-double-down"></i></a>

                        <div class="card collapse" id="questionnaire_collapse"
                             style="border-radius: 0.25rem 0.25rem 0rem 0rem;">

                            <div class="card-body" id="">

                                <div class="my-2 text-center">
                                    <h2 class="pt-2 pb-1 mb-0">Website Questionnaire</h2>

                                    @if($questionnaire->completed == 'Y')
                                        <h3 class="pt-1 pb-2 green-text">Questionnaire Completed</h3>
                                    @else
                                        <h3 class="pt-1 pb-2 text-warning">Questionnaire Incomplete</h3>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <img src="{{ asset('/storage/images/' . $website->logo) }}" alt="Logo"
                                         height="250px" width="250px"/>
                                </div>

                                <div class="md-form" id="">
                                    <!-- Description -->
                                    <textarea name="description" id="description" class="md-textarea form-control"
                                              disabled="">{{ $questionnaire->description }}</textarea>

                                    <label for="description">Business Description</label>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="owner">Full Name</label>

                                    <input type="text" name="owner" class="form-control"
                                           placeholder="Enter Your Full Name" value="{{ $questionnaire->owner }}"
                                           disabled/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="company_name">Business/Company Name</label>

                                    <input type="text" name="company_name" class="form-control"
                                           placeholder="Enter Business/Company Name"
                                           value="{{ $questionnaire->company_name }}" disabled/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label">Email Address</label>

                                    <input type="email" name="owner_email" class="form-control"
                                           placeholder="Enter Your Email Address"
                                           value="{{ $questionnaire->owner_email }}" disabled/>
                                </div>

                                <div class="md-form input-group">
                                    <label class="mdb-main-label" for="domain_name">Expected Domain Name</label>

                                    <div class="input-group-prepend">
                                        <span class="input-group-text md-addon pl-0" style="padding-top: 0.6rem;">https://www.</span>
                                    </div>

                                    <input type="text" style="padding-top: 0.6rem;" class="form-control"
                                           name="domain_name" placeholder="Ex: tramainejackson.com"
                                           aria-label="Ex: tramainejackson.com"
                                           value="{{ $questionnaire->projected_domain  }}" disabled/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="model_domain_name">Do you have a website that you
                                        like the look of that your website could model after?</label>

                                    <input type="text" class="form-control" name="model_domain_name"
                                           placeholder="Model Website" aria-label="Model Website"
                                           value="{{ $questionnaire->modal_domain }}" disabled/>
                                </div>
                                <div class="md-form" id="">

                                    <!-- Company Slogan/Mission Statement -->
                                    <textarea name="mission" id="mission" class="md-textarea form-control" rows="3"
                                              aria-placeholder="Mission Statement" placeholder="Mission Statement"
                                              disabled>{{ $questionnaire->mission }}</textarea>

                                    <label for="mission">Please Add Your Company's Mission Statement</label>
                                </div>

                                <div class="md-form" id="">

                                    <!-- Website Design -->
                                    <textarea name="website_design" id="website_design" class="md-textarea form-control"
                                              rows="3" aria-placeholder="Website Design" placeholder="Website Design"
                                              aria-label="website_design"
                                              disabled>{{ $questionnaire->website_design }}</textarea>

                                    <label for="website_design">Design Preference (Colors, Concepts and Vision)</label>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="contact">Contact Information For Website</label>

                                    <input type="text" class="form-control" name="contact"
                                           aria-placeholder="Contact Information" placeholder="Contact Information"
                                           aria-label="contact" value="{{ $questionnaire->contact }}" disabled/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="contact">Suggested Tabs</label>

                                    <input type="text" class="form-control" name="tabs" aria-placeholder="Tabs"
                                           placeholder="Tabs" aria-label="contact"
                                           value="{{ ucwords(str_ireplace(';', ', ', $questionnaire->tabs)) }}"
                                           disabled/>
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
                                                       value="{{ old('instagram') ? old('instagram') : $questionnaire->instagram }}"
                                                       disabled/>
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
                                                       value="{{ old('facebook') ? old('facebook') : $questionnaire->facebook }}"
                                                       disabled/>
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
                                                       value="{{ old('twitter') ? old('twitter') : $questionnaire->twitter }}"
                                                       disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="collect_payments">Collecting Payments?</label>

                                    <input type="text" name="collect_payments" class="form-control"
                                           placeholder="Collecting Payments"
                                           value="{{ $questionnaire->collect_payments }}" disabled/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="merchant_account">Merchant Account?</label>

                                    <input type="text" name="merchant_account" class="form-control"
                                           placeholder="Merchant Account" value="{{ $questionnaire->merchant_account }}"
                                           disabled/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="collection_types">Payment Collection
                                        Types?</label>

                                    <input type="text" name="collection_types" class="form-control"
                                           placeholder="Payment Collection Types"
                                           value="{{ $questionnaire->collection_types }}" disabled/>
                                </div>

                                <div class="md-form">
                                    <label class="mdb-main-label" for="completion_date">Projected Completion
                                        Date</label>

                                    <input type="text" name="completion_date" class="form-control"
                                           placeholder="Projected Completion Date"
                                           value="{{ $questionnaire->projected_due_date }}" disabled/>
                                </div>

                                <div class="text-center">
                                    <a href="{{ action([QuestionnaireController::class, 'show'], ['id' => $questionnaire->id]) }}"
                                       target="_blank">Click Here For Questionnaire Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <hr class=""/>

                @if($website->active == 'Y')
                    {{--Send a notification to the user regarding their payment--}}
                    <form method="POST" action="{{ action([WebsiteController::class, 'payment_reminder'], $website->id) }}"
                          class="d-inline" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row my-5" id="">

                            <div class="col-12" id="">
                                <h3>Send the website owner a payment reminder. The last payment date for this project
                                    is {{ $website->last_paid_date->format('m/d/Y') }}.</h3>
                            </div>

                            <div class="col-4 mx-auto" id="">
                                <button type="submit" class="btn btn-deep-orange sendPaymentReminder">Send Payment
                                    Reminder
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <!--Modal: modalConfirmDelete-->
        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading">Are you sure?</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                        <i class="fas fa-times fa-4x animated rotateIn"></i>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">

                        <form action="{{ action([WebsiteController::class, 'destroy'], $website->id) }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="btn btn-outline-red" type="submit">Yes</button>

                            <button class="btn btn-danger waves-effect" type="button" data-dismiss="modal">No</button>

                        </form>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
        <!--Modal: modalConfirmDelete-->
    </div>

</x-app-layout>

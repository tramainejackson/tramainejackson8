@php use App\Http\Controllers\QuestionnaireController; @endphp

<x-app-layout>

    @section('addt_scripts')
        <script type="text/javascript">
            $('#companyRecruiterNav').remove();
        </script>

        @if(session('error'))
            <script>
                toastr.warning('{{ session('error') }}');
            </script>
        @endif
    @endsection

    @include('components.intro')

    <div class="container mb-5 pt-5 position-relative" id="">

        <div class="row flex-center" id="">

            <div class="col-11 col-md-8 col-xl-6 top-card">

                <div class="card">

                    <div class="card-body">

                        <h2 class="h2 text-center mb-5 text-underline">Please Select One Of The Options Below</h2>

                        <a href="{{ route('portfolio2').'#contact' }}" class="btn btn-block white-text my-2"
                           style="background-color: #B53F51">First Time Reaching Out</a>

                        <button class="btn btn-block white-text my-2" style="background-color: #B5683F"
                                onclick="event.preventDefault(); $('.top-card').slideUp(); $('.bottom-card').slideDown();">
                            Complete My Questionnaire
                        </button>

                    </div>

                </div>

            </div>

            <div class="col-11 col-md-8 col-xl-6 bottom-card hidden">

                <div class="card">

                    <div class="card-body">

                        <form method="GET" action="{{ action([QuestionnaireController::class, 'index']) }}" class=""
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="text-center">
                                <h2 class="">My Questionnaire</h2>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Enter the password provided for you below to access your
                                    questionnaire</label>
                                <input type="text" name="questionnaire_id" class="form-control"
                                       placeholder="Enter Questionnaire Password" value="" required autofocus/>

                                @if($errors->has('questionnaire_id'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('questionnaire_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary ml-0">Submit</button>
                                    <button type="button" class="btn btn-warning ml-0"
                                            onclick="event.preventDefault(); $('.top-card').slideDown(); $('.bottom-card').slideUp();">
                                        Cancel
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <hr class="mt-5"/>

    </div>
    <!--/Main layout-->

</x-app-layout>

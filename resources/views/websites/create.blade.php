@php use App\Http\Controllers\WebsiteController; @endphp

<x-app-layout>

    @section('addt_scripts')
        <script type="text/javascript">
            // Data Picker Initialization
            $('.datepicker').pickadate();
        </script>
    @endsection

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

    <div class="container-fluid" id="">

        <div class="row my-3">

            <div class="col-8 my-4 mx-auto">
                <div class="userNavLinks d-flex justify-content-around">
                    <a href="{{ route('websites.index') }}" class="btn btn-outline-dark-green">All Websites</a>
                </div>
            </div>

            <div class="col-12 col-lg-8 mx-auto">

                <div class="card">

                    <div class="card-body" id="">

                        <form method="POST" action="{{ action([WebsiteController::class, 'store']) }}" class=""
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="">
                                <h2 class="">Create New Website</h2>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Website Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Website Name"
                                       value="{{ old('name') }}" required autofocus/>

                                @if($errors->has('name'))
                                    <span class="help-block text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Website Link</label>
                                <input type="text" name="link" class="form-control" placeholder="Enter Website Link"
                                       value="{{ old('link') }}" required/>

                                @if ($errors->has('link'))
                                    <span class="help-block text-danger">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Website Owner Name</label>
                                <input type="text" name="owner" class="form-control" placeholder="Enter Owner Name"
                                       value="{{ old('owner') }}" required/>

                                @if ($errors->has('owner'))
                                    <span class="help-block text-danger">
                                    <strong>{{ $errors->first('owner') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Website Owner Email</label>
                                <input type="email" name="owner_email" class="form-control"
                                       placeholder="Enter Owner Email" value="{{ old('owner_email') }}" required/>

                                @if ($errors->has('owner_email'))
                                    <span class="help-block text-danger">
                                    <strong>{{ $errors->first('owner_email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div id="" class="md-form md-outline input-with-post-icon datepicker">
                                    <input id="" class="form-control" type="text" name="renew_date"
                                           placeholder="Select a date" value="{{ old('renew_date') }}">
                                    <label for="renew_date">Renew Date</label>
                                    <i class="fas fa-calendar input-prefix" tabindex=0></i>
                                </div>

                                @if ($errors->has('renew_date'))
                                    <span class="help-block text-danger">
                                    <strong>{{ $errors->first('renew_date') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="">
                                <label class="form-label">Logo</label>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="btn col-4 custom-file-input" name="picture"
                                               id="customFile"/>
                                        <label for="customFile" class="custom-file-label text-left">Change Photo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-0">Create New Site</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

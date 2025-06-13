<form method="POST" action="{{ route('contact_post') }}" class="font7 fw-bold">
    @csrf

    <div class="container-fluid border border-5 py-3 rounded-7">
        <div class="row">
            <div class="col-12">
                <p class="px-5 py-2">Please fill out your information and select next to send payment through CashApp</p>
            </div>

            <div class="col-12">
                <div class="md-form px-4 pt-2 mb-0">
                    <input type="text" id="parent_first_name" name="parent_first_name"
                           class="form-control"
                           value="{{ old('parent_first_name') ? old('parent_first_name') : '' }}"
                           placeholder="Enter First Name"
                           onclick="activateLabel(this)"
                           onblur="deactivateLabel(this)"
                           required
                    />
                    <label for="parent_first_name" class="" style="color: black;"><span
                            class="border rounded-7 font-small p-1">01</span>&nbsp;
                        Sponsor First Name?</label>
                </div>

                @if ($errors->has('parent_first_name'))
                    <p class="text-danger">{{ $errors->first('parent_first_name') }}</p>
                @endif

            </div>
            <div class="col-12">
                <div class="md-form px-4 pt-2 mb-0">
                    <input type="text" id="parent_last_name" name="parent_last_name" class="form-control"
                           value="{{ old('parent_last_name') ? old('parent_last_name') : '' }}"
                           placeholder="Enter Last Name"
                           onclick="activateLabel(this)"
                           onblur="deactivateLabel(this)"
                           required
                    />
                    <label for="parent_last_name" class="" style="color: black;"><span
                            class="border rounded-7 font-small p-1">02</span>&nbsp;
                        Sponsor Last Name?</label>
                </div>

                @if ($errors->has('parent_last_name'))
                    <p class="text-danger">{{ $errors->first('parent_last_name') }}</p>
                @endif

            </div>

            <div class="col-12">
                <div class="md-form px-4 pt-2 mb-0">
                    <input type="email" id="parent_email" name="parent_email" class="form-control"
                           value="{{ old('parent_email') ? old('parent_email') : '' }}"
                           placeholder="Enter Email Address"
                    />
                    <label for="parent_email" class="active" style="color: black;"><span
                            class="border rounded-7 font-small p-1">03</span>&nbsp;
                        Sponsor Email Address</label>
                </div>

                @if ($errors->has('parent_email'))
                    <p class="text-danger">{{ $errors->first('parent_email') }}</p>
                @endif

            </div>

            <div class="col-12">
                <div class="md-form px-4 pt-2 mb-0">
                    <input type="text" id="parent_phone" name="parent_phone" class="form-control"
                           value="{{ old('parent_phone') ? old('parent_phone') : '' }}"
                           placeholder="Enter Phone Number"/>
                    <label for="parent_phone" class="active" style="color: black;"><span
                            class="border rounded-7 font-small p-1">04</span>&nbsp;
                        Sponsor Phone Number</label>
                </div>

                @if ($errors->has('parent_phone'))
                    <p class="text-danger">{{ $errors->first('parent_phone') }}</p>
                @endif

            </div>

            <div class="col-12">
                <div class="md-form px-4 pt-2 mb-0">
                    <input type="text" id="sponsor_company"
                           name="sponsor_company"
                           class="form-control"
                           value="{{ old('sponsor_company') ? old('sponsor_company') : '' }}"
                           placeholder="Enter Company Name"
                    />
                    <label for="sponsor_company" class="active" style="color: black;"><span
                            class="border rounded-7 font-small p-1">05</span>&nbsp;
                        Sponsor Company Name</label>
                </div>

                @if ($errors->has('sponsor_company'))
                    <p class="text-danger">{{ $errors->first('sponsor_company') }}</p>
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 text-left">
                <button id="sponsor_submit_btn" class='btn btn-mdb-color border border-1 rounded-9 btn-success font6' type='button' onclick="submitSponsor();">Next</button>
            </div>
        </div>
    </div>
</form>
<!-- Contact Form -->

<!-- Scripts For Input Formatting -->
<script type="text/javascript" src="{{ asset('js/md-form.js') }}"></script>

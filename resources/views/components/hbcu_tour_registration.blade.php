<div class="mx-auto pt-4 pt-md-5 container pb-5" style="background-color: rgba(10,10,10,0.8)">
    <!-- Contact Form -->
    <div class="row">
        <div class="col">
            <h1 class="text-white font1 display-3">Registration Form</h1>
        </div>
    </div>

    <form method="POST" action="{{ route('contact_post') }}" class="font7 fw-bold">
        @csrf

        <div class="container-fluid border border-5 py-3 rounded-7">
            <div class="row">
                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="text" id="first_name" name="first_name" class="form-control text-white"
                               value="{{ old('first_name') ? old('first_name') : '' }}"
                               placeholder="Enter First Name"
                               onclick="activateLabel(this)"
                               onblur="deactivateLabel(this)"
                               required/>
                        <label for="first_name" class="text-white"><span
                                class="border rounded-7 font-small p-1">01</span>&nbsp;
                            First Name?</label>
                    </div>

                    @if ($errors->has('first_name'))
                        <p class="text-danger">{{ $errors->first('first_name') }}</p>
                    @endif

                </div>
                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="text" id="last_name" name="last_name" class="form-control text-white"
                               value="{{ old('last_name') ? old('last_name') : '' }}"
                               placeholder="Enter Last Name"
                               onclick="activateLabel(this)"
                               onblur="deactivateLabel(this)"
                               required/>
                        <label for="last_name" class="text-white"><span
                                class="border rounded-7 font-small p-1">02</span>&nbsp;
                            Last Name?</label>
                    </div>

                    @if ($errors->has('last_name'))
                        <p class="text-danger">{{ $errors->first('last_name') }}</p>
                    @endif

                </div>

                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="email" id="email" name="email" class="form-control text-white"
                               value="{{ old('email') ? old('email') : '' }}"
                               placeholder="Enter Email Address"
                               required/>
                        <label for="email" class="active"><span
                                class="border rounded-7 font-small p-1">03</span>&nbsp;
                            Email Address</label>
                    </div>

                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif

                </div>

                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="text" id="phone" name="phone" class="form-control text-white"
                               value="{{ old('phone') ? old('phone') : '' }}"
                               placeholder="Enter Phone Number"/>
                        <label for="phone" class="active"><span
                                class="border rounded-7 font-small p-1">04</span>&nbsp;
                            Phone Number</label>
                    </div>

                    @if ($errors->has('phone'))
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                    @endif

                </div>

                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="text" id="school" name="school" class="form-control text-white"
                               value="{{ old('school') ? old('school') : '' }}"
                               placeholder="Enter School Name"/>
                        <label for="phone" class="active"><span
                                class="border rounded-7 font-small p-1">05</span>&nbsp;
                            School</label>
                    </div>

                    @if ($errors->has('school'))
                        <p class="text-danger">{{ $errors->first('school') }}</p>
                    @endif

                </div>

                <div class="col-12">
                    <div class="md-form text-start">
                        <div class="">
                            <span class="border rounded-6 p-1 text-white" style="font-size: 0.75rem;">06</span>&nbsp;
                            <span class="font-small text-start text-white" style="font-size: 0.8rem;">Select Grade For 2026/2027 School Year</span>
                        </div>

                        <div class="border-1 border-bottom mt-2 mx-4">
                            <select type="text" id="grade" name="grade" class="w-100"
                                    value="{{ old('grade') ? old('grade') : '' }}" data-mdb-select-init>
                                <option value="9" selected>9th Grade</option>
                                <option value="10">10th Grade</option>
                                <option value="11">11th Grade</option>
                                <option value="12">12th Grade</option>
                            </select>
                        </div>
                    </div>
                </div>

{{--                <div class="col-12">--}}
{{--                    <div class="md-form text-start">--}}
{{--                        <div class="">--}}
{{--                            <span class="border rounded-6 p-1 text-white" style="font-size: 0.75rem;">05</span>&nbsp;--}}
{{--                            <span class="font-small text-start text-white" style="font-size: 0.8rem;">Select Current Grade</span>--}}
{{--                        </div>--}}

{{--                        <div class="border-1 border-bottom mt-2 mx-4">--}}
{{--                            <select type="text" id="grade" name="grade" class="w-100"--}}
{{--                                    value="{{ old('grade') ? old('grade') : '' }}" data-mdb-select-init>--}}
{{--                                <option value="9" selected>9th Grade</option>--}}
{{--                                <option value="10">10th Grade</option>--}}
{{--                                <option value="11">11th Grade</option>--}}
{{--                                <option value="12">12th Grade</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12">--}}
{{--                    <div class="md-form text-start mt-1">--}}
{{--                        <div class="">--}}
{{--                            <span class="border rounded-6 p-1 text-white" style="font-size: 0.75rem;">06</span>&nbsp;--}}
{{--                            <span class="font-small text-start text-white" style="font-size: 0.8rem;">Select Current School</span>--}}
{{--                        </div>--}}

{{--                        <div class="border-1 border-bottom mt-2 mx-4">--}}
{{--                            <select type="text" id="school" name="school" class="w-100"--}}
{{--                                    value="{{ old('school') ? old('school') : '' }}" data-mdb-select-init>--}}
{{--                                <option value="carver" selected>Carver HSES</option>--}}
{{--                                <option value="other">Other</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="row">
                <div class="col-12 mt-4 text-left">
                    <button class='btn border border-1 rounded-9 text-white' type='button' onclick="addGuardian();"><i
                            class="fas fa-circle-info pe-2"></i>Add Parent/Guardian<i
                            class="fas fa-circle-info ps-2"></i>
                    </button>
                </div>
            </div>

            <div class="row d-none parent-input" id="parent_input_div">
                <div class="col-12">
                    <p class="text-white px-5 py-2">
                        Chaperone volunteers will potentially have to share a hotel room with a few children. You also
                        will be required to provide a recent background check and child abuse clearance.
                    </p>
                </div>

                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="text" id="parent_first_name" name="parent_first_name"
                               class="form-control text-white"
                               value="{{ old('parent_first_name') ? old('parent_first_name') : '' }}"
                               placeholder="Enter First Name"
                               onclick="activateLabel(this)"
                               onblur="deactivateLabel(this)"
                        />
                        <label for="parent_first_name" class="text-white"><span
                                class="border rounded-7 font-small p-1">01</span>&nbsp;
                            Parent First Name?</label>
                    </div>

                    @if ($errors->has('parent_first_name'))
                        <p class="text-danger">{{ $errors->first('parent_first_name') }}</p>
                    @endif

                </div>
                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="text" id="parent_last_name" name="parent_last_name" class="form-control text-white"
                               value="{{ old('parent_last_name') ? old('parent_last_name') : '' }}"
                               placeholder="Enter Last Name"
                               onclick="activateLabel(this)"
                               onblur="deactivateLabel(this)"
                        />
                        <label for="parent_last_name" class="text-white"><span
                                class="border rounded-7 font-small p-1">02</span>&nbsp;
                            Parent Last Name?</label>
                    </div>

                    @if ($errors->has('parent_last_name'))
                        <p class="text-danger">{{ $errors->first('parent_last_name') }}</p>
                    @endif

                </div>

                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="email" id="parent_email" name="parent_email" class="form-control text-white"
                               value="{{ old('parent_email') ? old('parent_email') : '' }}"
                               placeholder="Enter Email Address"
                        />
                        <label for="parent_email" class="active"><span
                                class="border rounded-7 font-small p-1">03</span>&nbsp;
                            Parent Email Address</label>
                    </div>

                    @if ($errors->has('parent_email'))
                        <p class="text-danger">{{ $errors->first('parent_email') }}</p>
                    @endif

                </div>

                <div class="col-12">
                    <div class="md-form px-4 pt-2 mb-0">
                        <input type="text" id="parent_phone" name="parent_phone" class="form-control text-white"
                               value="{{ old('parent_phone') ? old('parent_phone') : '' }}"
                               placeholder="Enter Phone Number"/>
                        <label for="parent_phone" class="active"><span
                                class="border rounded-7 font-small p-1">04</span>&nbsp;
                            Parent Phone Number</label>
                    </div>

                    @if ($errors->has('parent_phone'))
                        <p class="text-danger">{{ $errors->first('parent_phone') }}</p>
                    @endif

                </div>

                <div class="col-12">
                    <div class="md-form text-start mt-1">
                        <div class="">
                            <span class="border rounded-6 p-1 text-white" style="font-size: 0.70rem;">05</span>&nbsp;
                            <span class="font-small text-start text-white" style="font-size: 0.75rem;">Are you planning on attending the tours?</span>
                        </div>

                        <div class="border-1 border-bottom mt-2 mx-4">
                            <select type="text" id="parent_attending" name="parent_attending" class="w-100"
                                    value="{{ old('parent_attending') ? old('parent_attending') : '' }}"
                                    data-mdb-select-init>
                                <option value="Y">Yes</option>
                                <option value="N" selected>No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="md-form text-start mt-1">
                        <div class="">
                            <span class="border rounded-6 p-1 text-white" style="font-size: 0.70rem;">06</span>&nbsp;
                            <span class="font-small text-start text-white" style="font-size: 0.75rem;">Volunteer To Be Chaperone?</span>
                        </div>

                        <div class="border-1 border-bottom mt-2 mx-4">
                            <select type="text" id="chaperone" name="chaperone" class="w-100"
                                    value="{{ old('chaperone') ? old('chaperone') : '' }}" data-mdb-select-init>
                                <option value="Y">Yes</option>
                                <option value="N" selected>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 text-left">
                    <button class='btn btn-mdb-color border border-1 rounded-9 text-white' type='submit'>Send
                        Registration Form <i
                            class="fas fa-location-arrow"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- Contact Form -->

    <!-- Scripts For Input Formatting -->
    <script type="text/javascript" src="{{ asset('js/md-form.js') }}"></script>

    <script type="text/javascript">
        function addGuardian(e) {
            if (document.getElementById('parent_input_div').classList.contains('d-none')) {
                document.getElementById('parent_input_div').classList.remove('d-none');
            } else {
                document.getElementById('parent_input_div').classList.add('d-none');
            }
        }
    </script>
</div>

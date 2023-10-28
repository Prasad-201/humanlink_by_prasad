@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        @if (session()->has('error') || session()->has('success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @if (session()->has('error'))
                    <small class="form-text">{{ session()->get('error') }}</small>
                @endif
                @if (session()->has('success'))
                    <small class="form-text">{{ session()->get('success') }}</small>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="profile-Accordion accordionOpen opened">
            <div class="accordionContent accordionContentOpen" aria-expanded="true">
                <form action="{{ url('/Talent/edit-profile') }}" method="post" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label class="required_label">Name</label>
                            <input type="text" placeholder="Enter First Name" name="full_name"
                                value="{{ $talentInfo->full_name }}" class="form-control-element">
                            @if ($errors->has('full_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('full_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label>Gender</label>
                            <select class="form-control-element" name="gender" id="">
                                <option value="" disabled selected>Select Gender</option>
                                <option @if ($talentInfo->gender == 'Male') {{ 'selected' }} @endif value="Male">
                                    Male</option>
                                <option @if ($talentInfo->gender == 'Female') {{ 'selected' }} @endif value="Female">
                                    Female</option>
                                <option @if ($talentInfo->gender == 'Other') {{ 'selected' }} @endif value="Other">
                                    Other </option>
                            </select>
                            @if ($errors->has('gender'))
                                <div>
                                    <small class="text-danger form-text">
                                        {{ $errors->first('gender') }}
                                    </small>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label>Date of Birth</label>
                            <div class="react-datepicker-wrapper date-wrapper">
                                <div class="react-datepicker__input-container">
                                    <input type="date" name="date_of_birth" placeholder="Enter Date"
                                        class="form-control-element" value="{{ $talentInfo->birth_date }}">
                                    @if ($errors->has('date_of_birth'))
                                        <small class="text-danger form-text">
                                            {{ $errors->first('date_of_birth') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label>Email</label>
                            <input type="text" placeholder="Enter Email" disabled="true" name="email_address"
                                value="{{ $talentInfo->email_address }}" class="form-control-element">
                        </div>
                        <div class="col-lg-12 col-xl-8 form-group">
                            <label class="required_label">Phone Number</label>
                            <input pattern="[\d]+" name="contact_number" type="text"
                                value="{{ $talentInfo->mobile_number }}" class="form-control-element">
                            @if ($errors->has('contact_number'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('contact_number') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Address</label>
                            <input type="text" placeholder="Enter Address" name="address"
                                class="form-control-element" value="{{ $talentInfo->address }}">
                            @if ($errors->has('address'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('address') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>City</label>
                            <input type="text" placeholder="Enter City" name="city"
                                value="{{ $talentInfo->city_name }}" class="form-control-element">
                            @if ($errors->has('city'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('city') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Pincode</label>
                            <input type="text" placeholder="Enter Pincode" value="{{ $talentInfo->pincode }}"
                                name="pincode" class="form-control-element">
                            @if ($errors->has('pincode'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('pincode') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>LinkedIn Profile</label>
                            <input type="text" placeholder="Add link here" name="linkedin_id"
                                value="{{ $talentInfo->linkedin_profile }}" class="form-control-element">
                            @if ($errors->has('linkedin_id'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('linkedin_id') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-12  form-group">
                            @if ($errors->has('upload_resume'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('upload_resume') }}
                                </small>
                            @endif
                            <label class="required_label">Resume</label>
                            <div class="d-flex flex-wrap">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="resumeDiv">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/talentconnet/profile/file-minus.svg') }}">
                                            <?php
                                            $str = $talentInfo->emp_resume;
                                            $resume_profile = explode('/', $str);
                                            ?>
                                            &nbsp;{{ end($resume_profile) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="filewrap resumeReplaceBtn">
                                        <input id="resumeReplace" name="upload_resume" type="file">
                                        <label for="resumeReplace">Replace Existing Resume</label>
                                    </div>
                                </div>
                                <input type="hidden" name="hidden_resume" value="{{ $talentInfo->emp_resume }}">
                            </div>
                        </div>
                        <div class="col-md-12 profileFormAction pb-4">
                            <button class="saveBtn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

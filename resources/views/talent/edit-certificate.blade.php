@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <small class="form-text">{{ session()->get('error') }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="profile-Accordion accordionOpen opened">
            <div class="accordionContent accordionContentOpen">
                <form action="{{ url('/Talent/edit-certificate') . '/' . $talentCertifcate->id }}" method="post"
                    autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Course Name <span class="text-danger">*</span></label>
                            <select name="course_name" class="form-control-element">
                                <option value="" disabled selected>Select Course</option>
                                <option @if ($talentCertifcate->course_name == 'JAVA') {{ 'selected' }} @endif value="JAVA">JAVA
                                </option>
                                <option @if ($talentCertifcate->course_name == 'PHP') {{ 'selected' }} @endif value="PHP">PHP
                                </option>
                                <option @if ($talentCertifcate->course_name == 'Angular') {{ 'selected' }} @endif value="Angular JS">
                                    Angular JS</option>
                                <option @if ($talentCertifcate->course_name == 'React JS') {{ 'selected' }} @endif value="React JS">
                                    React JS</option>
                                <option @if ($talentCertifcate->course_name == 'Google') {{ 'selected' }} @endif value="Google">
                                    Google</option>
                            </select>
                            @if ($errors->has('course_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('course_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Issuing Organization</label>
                            <input type="text" name="organization" class="form-control-element"
                                value="{{ $talentCertifcate->issue_organization }}">
                            @if ($errors->has('organization'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('organization') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Issue Date <span class="text-danger">*</span></label>
                            <input type="date" name="issue_date" class="form-control-element"
                                value="{{ $talentCertifcate->issue_date }}" required>
                            @if ($errors->has('issue_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('issue_date') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Expiration Date (Optional)</label>
                            <input type="date" name="expiration_date" class="form-control-element"
                                value="{{ $talentCertifcate->expire_date }}">
                            @if ($errors->has('expiration_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('expiration_date') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Credential ID (Optional)</label>
                            <input type="text" name="credential_id" class="form-control-element"
                                value="{{ $talentCertifcate->credential_id }}">
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Credential URL (Optional)</label>
                            <input type="text" name="credential_url" class="form-control-element"
                                value="{{ $talentCertifcate->credential_url }}">
                        </div>
                        <div class="col-md-12 profileFormAction pb-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-6" style="text-align: right;">
                                    <button type="submit" class="saveBtn">Save Changes</button>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <button type="button" class="saveBtn">
                                        <a href="{{ url('/Talent/profile') }}" class="text-dark">Back</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

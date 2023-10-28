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
            <div class="accordionContent accordionContentOpen">
                <form action="{{ url('/Talent/edit-prefernces') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label class="required_label">Current Job Title</label>
                            <input type="text" placeholder="Your Designation" name="current_job_title"
                                value="{{ $talentInfo->position_applied }}" class="form-control-element">
                            @if ($errors->has('current_job_title'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('current_job_title') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label>Current Employment Status</label>
                            <select name="current_employment_status" class="form-control-element" required>
                                <option value="" disabled selected>Select Status</option>
                                <option @if ($talentInfo->curret_employment_status == 'employment') {{ 'selected' }} @endif value="employment">
                                    Full-Time Employemet
                                </option>
                                <option @if ($talentInfo->curret_employment_status == 'freelancing') {{ 'selected' }} @endif
                                    value="freelancing">Full-Time Freelancing</option>
                                <option @if ($talentInfo->curret_employment_status == 'on-contract') {{ 'selected' }} @endif
                                    value="on-contract">On Contract</option>
                                <option @if ($talentInfo->curret_employment_status == 'unemployed') {{ 'selected' }} @endif value="unemployed">
                                    Unemployed</option>
                            </select>
                            @if ($errors->has('current_employment_status'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('current_employment_status') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label>Years of Work Experience</label>
                            <div class="react-datepicker-wrapper date-wrapper">
                                <div class="react-datepicker__input-container">
                                    <input pattern="[\d]+" max="2" type="text" name="work_experience"
                                        placeholder="work Experience" class="form-control-element"
                                        value="{{ $talentInfo->work_experience }}">
                                    @if ($errors->has('work_experience'))
                                        <small class="text-danger form-text">
                                            {{ $errors->first('work_experience') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label>Notice Period (Days)</label>
                            <select name="notice_period" class="form-control-element" required>
                                <option value="" disabled selected>Select Notice Period
                                </option>
                                <option @if ($talentInfo->notice_period == 'immediately') {{ 'selected' }} @endif
                                    value="immediately">Immediately
                                </option>
                                <option @if ($talentInfo->notice_period == 'within-2-week') {{ 'selected' }} @endif
                                    value="within-2-week">Within 2 Week</option>
                                <option @if ($talentInfo->notice_period == '2-to-4-weeks') {{ 'selected' }} @endif
                                    value="2-to-4-weeks">2 to 4 Week</option>
                                <option @if ($talentInfo->notice_period == '4-to-8-weeks') {{ 'selected' }} @endif
                                    value="4-to-8-weeks">4 to 8 Week</option>
                                <option @if ($talentInfo->notice_period == 'more-than-8-week') {{ 'selected' }} @endif
                                    value="more-than-8-week">More than 8 Week</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label class="required_label">Current Pay Annually (INR)</label>
                            <input type="number" name="current_pay_annually" class="form-control-element"
                                value="{{ $talentInfo->curret_ctc }}">
                            @if ($errors->has('current_pay_annually'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('current_pay_annually') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-4 form-group">
                            <label class="required_label">Expected Pay Annually (INR)</label>
                            <input type="number" name="expected_pay_annually" class="form-control-element"
                                value="{{ $talentInfo->expected_ctc }}">
                            @if ($errors->has('expected_pay_annually'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('expected_pay_annually') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 col-xl-12 form-group-inline">
                            <label class="required_label">Worked with International Clients: </label>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            @php
                                $noChecked = '';
                                $yesChecked = '';
                                if ($talentInfo->international_client == 'No') {
                                    $noChecked = 'checked';
                                } elseif ($talentInfo->international_client == 'Yes') {
                                    $yesChecked = 'checked';
                                } else {
                                    $noChecked = 'checked';
                                }
                            @endphp
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="international_client"
                                    value="Yes" {{ $yesChecked }}>
                                <label class="form-check-label" for="">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="international_client"
                                    value="No" {{ $noChecked }}>
                                <label class="form-check-label" for="">No</label>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>
                                Your preferred method of working (select atleast 1 preference)
                                <span class="text-danger">*</span>
                            </label>
                            <div class="row">
                                <div class="col-lg-4 col-xl-4">
                                    <div class="edit-box">
                                        <select name="work_method_1" class="form-control-element" required>
                                            <option value="" disabled selected>Select working Method</option>
                                            <option @if ($talentInfo->work_method_1 == 'in-office') {{ 'selected' }} @endif
                                                value="in-office">In Office</option>
                                            <option @if ($talentInfo->work_method_1 == 'remote') {{ 'selected' }} @endif
                                                value="remote">Remote</option>
                                            <option @if ($talentInfo->work_method_1 == 'hybrid') {{ 'selected' }} @endif
                                                value="hybrid">Hybrid</option>
                                        </select>
                                        @if ($errors->has('work_method_1'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('work_method_1') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4">
                                    <div class="edit-box">
                                        <select name="work_method_2" class="form-control-element" required>
                                            <option value="" disabled selected>Select working Method</option>
                                            <option @if ($talentInfo->work_method_2 == 'in-office') {{ 'selected' }} @endif
                                                value="in-office">In Office</option>
                                            <option @if ($talentInfo->work_method_2 == 'remote') {{ 'selected' }} @endif
                                                value="remote">Remote</option>
                                            <option @if ($talentInfo->work_method_2 == 'hybrid') {{ 'selected' }} @endif
                                                value="hybrid">Hybrid</option>
                                        </select>
                                        @if ($errors->has('work_method_2'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('work_method_2') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4">
                                    <div class="edit-box">
                                        <select name="work_method_3" class="form-control-element" required>
                                            <option value="" disabled selected>Select working Method</option>
                                            <option @if ($talentInfo->work_method_3 == 'in-office') {{ 'selected' }} @endif
                                                value="in-office">In Office</option>
                                            <option @if ($talentInfo->work_method_3 == 'remote') {{ 'selected' }} @endif
                                                value="remote">Remote</option>
                                            <option @if ($talentInfo->work_method_3 == 'hybrid') {{ 'selected' }} @endif
                                                value="hybrid">Hybrid</option>
                                        </select>
                                        @if ($errors->has('work_method_3'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('work_method_3') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>
                                Your preferable slot of working hours (select atleast 1 preference)
                                <span class="text-danger">*</span>
                            </label>
                            <div class="row">
                                <div class="col-lg-4 col-xl-4">
                                    <div class="edit-box">
                                        <select name="work_hour_1" class="form-control-element" required>
                                            <option value="" disabled selected>Select working hours</option>
                                            <option @if ($talentInfo->work_hour_1 == 'us full shift') {{ 'selected' }} @endif
                                                value="us full shift">US Full Shift (8:00 PM to 5:00 AM/ 9:00 PM to
                                                6:00 AM)</option>
                                            <option @if ($talentInfo->work_hour_1 == 'uk full shift') {{ 'selected' }} @endif
                                                value="uk full shift">UK Full Shift (2:00 PM to 11:00 PM)</option>
                                            <option @if ($talentInfo->work_hour_1 == 'ak full shift') {{ 'selected' }} @endif
                                                value="ak full shift">AK Full Shift (4:00 AM to 1:00 PM)</option>
                                        </select>
                                        @if ($errors->has('work_hour_1'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('work_hour_1') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4">
                                    <div class="edit-box">
                                        <select name="work_hour_2" class="form-control-element" required>
                                            <option value="" disabled selected>Select working hours</option>
                                            <option @if ($talentInfo->work_hour_2 == 'us full shift') {{ 'selected' }} @endif
                                                value="us full shift">US Full Shift (8:00 PM to 5:00 AM/ 9:00 PM to
                                                6:00 AM)</option>
                                            <option @if ($talentInfo->work_hour_2 == 'uk full shift') {{ 'selected' }} @endif
                                                value="uk full shift">UK Full Shift (2:00 PM to 11:00 PM)</option>
                                            <option @if ($talentInfo->work_hour_2 == 'ak full shift') {{ 'selected' }} @endif
                                                value="ak full shift">AK Full Shift (4:00 AM to 1:00 PM)</option>
                                        </select>
                                        @if ($errors->has('work_hour_2'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('work_hour_2') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4">
                                    <div class="edit-box">
                                        <select name="work_hour_3" class="form-control-element" required>
                                            <option value="" disabled selected>
                                                Select working hours</option>
                                            <option @if ($talentInfo->work_hour_3 == 'us full shift') {{ 'selected' }} @endif
                                                value="us full shift">US Full Shift (8:00 PM to 5:00 AM/ 9:00 PM to
                                                6:00 AM)</option>
                                            <option @if ($talentInfo->work_hour_3 == 'uk full shift') {{ 'selected' }} @endif
                                                value="uk full shift">UK Full Shift (2:00 PM to 11:00 PM)</option>
                                            <option @if ($talentInfo->work_hour_3 == 'ak full shift') {{ 'selected' }} @endif
                                                value="ak full shift">AK Full Shift (4:00 AM to 1:00 PM)</option>
                                        </select>
                                        @if ($errors->has('work_hour_3'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('work_hour_3') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Interests<span class="text-danger">*</span></label>
                            @php
                                $interest = [];
                                if ($talentInfo->interest != '') {
                                    $interest = explode(',', $talentInfo->interest);
                                }
                            @endphp
                            <div class="edit-box">
                                <select class="multiple-select form-control-element" name="interests[]"
                                    multiple="multiple" required>
                                    <option @if (in_array('watching tv', $interest)) {{ 'selected' }} @endif
                                        value="watching tv">Watching TV</option>
                                    <option @if (in_array('cooking', $interest)) {{ 'selected' }} @endif
                                        value="cooking">Cooking</option>
                                    <option @if (in_array('swimming', $interest)) {{ 'selected' }} @endif
                                        value="swimming">Swimming</option>
                                    <option @if (in_array('painting', $interest)) {{ 'selected' }} @endif
                                        value="painting">Painting</option>
                                    <option @if (in_array('tracking', $interest)) {{ 'selected' }} @endif
                                        value="tracking">Tracking</option>
                                    <option @if (in_array('traveling', $interest)) {{ 'selected' }} @endif
                                        value="traveling">Traveling</option>
                                </select>
                                @if ($errors->has('interests[]'))
                                    <small class="text-danger form-text">
                                        {{ $errors->first('interests[]') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Introduction <span class="text-danger">*</span></label>
                            <textarea name="introduction" class="form-control-element" required>{{ $talentInfo->introduction }}</textarea>
                            @if ($errors->has('introduction'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('introduction') }}
                                </small>
                            @endif
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

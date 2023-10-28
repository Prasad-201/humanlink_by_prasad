@include('talent_temp.header')

<main>
    <div class="container-fluid">
        <div class="gs-form">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-8">
                        <div class="contain-section registration-content">
                            <div class="logo">
                                <img src="{{ asset('/assets/talentconnet/uplers-talent-vertical-logo.svg') }}"
                                    alt="">
                            </div>
                            <div class="heading">
                                <h2>Hi, thank you for showing interest in becoming an Uplers Certified Talent</h2>
                                <p>Let’s get to know you, fill in the following details to get started</p>
                            </div>
                            <div class="common-form">
                                <form action="{{ url('/Talent/submit-talent-info') }}" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6">
                                            @csrf
                                            <div class="input-wrap">
                                                @if ($errors->has('full_name'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('full_name') }}
                                                    </small>
                                                @endif
                                                <label class="input-title required_label required_label">
                                                    Full Name <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <input type="text" class="form-control" placeholder="full name"
                                                        name="full_name" value="{{ $talentinfo->full_name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Email <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        name="email_address" value="{{ $talentinfo->email_address }}"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-wrap">
                                                @if ($errors->has('mobile_number'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('mobile_number') }}
                                                    </small>
                                                @endif
                                                <label class="input-title required_label required_label">
                                                    Phone <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <input type="number" class="form-control" placeholder="Phone"
                                                        name="mobile_number" value="{{ $talentinfo->mobile_number }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    LinkedIn Profile <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <input type="url" class="form-control" name="linkedin_profile"
                                                        placeholder="LinkedIn Profile"
                                                        value="{{ old('linkedin_profile') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Position applied <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <select name="position_applied" class="form-control" required>
                                                        <option value="" disabled selected>Select Position</option>
                                                        <option value="WordPress Full Stack Developer">WordPress Full
                                                            Stack Developer</option>
                                                        <option value="Back End">Back End</option>
                                                        <option value="Front End">Front End</option>
                                                        <option value="Search / Performance Analyst">Search /
                                                            Performance Analyst</option>
                                                        <option value="Mobile App Developer">Mobile App Developer
                                                        </option>
                                                        <option value="DevOps Engineer">DevOps Engineer</option>
                                                        <option value="Shopify Developer">Shopify Developer</option>
                                                        <option value="UI Designer">UI Designer</option>
                                                        <option value="PHP Developer">PHP Developer</option>
                                                        <option value="SEO Specialist">SEO Specialist</option>
                                                        <option value="JAVA Developer">JAVA Developer</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    What is your current employment status? <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <select name="curret_employment_status" class="form-control"
                                                        required>
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="employment">Full-Time Employemet</option>
                                                        <option value="freelancing">Full-Time Freelancing</option>
                                                        <option value="on-contract">On Contract</option>
                                                        <option value="unemployed">Unemployed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            @if ($errors->has('work_experience'))
                                                <small class="text-danger form-text">
                                                    {{ $errors->first('work_experience') }}
                                                </small>
                                            @endif
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Relevant Work Experience <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <input type="number" maxlength="2" name="work_experience"
                                                        class="form-control" placeholder="Ex.6" min="0"
                                                        value="{{ old('work_experience') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Your usual notice period? <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <select name="notice_period" class="form-control" required>
                                                        <option value="" disabled selected>Select Notice Period
                                                        </option>
                                                        <option value="Immediately">Immediately</option>
                                                        <option value="Within 2 Week">Within 2 Week</option>
                                                        <option value="2 to 4 Week">2 to 4 Week</option>
                                                        <option value="4 to 8 Week">4 to 8 Week</option>
                                                        <option value="More than 8 Week">More than 8 Week</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            @if ($errors->has('curret_ctc'))
                                                <small class="text-danger form-text">
                                                    {{ $errors->first('curret_ctc') }}
                                                </small>
                                            @endif
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Current pay annually? (in INR) <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <input type="number" name="curret_ctc" class="form-control"
                                                        placeholder="Current CTC" value="{{ old('curret_ctc') }}"
                                                        value="0" min="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            @if ($errors->has('expected_ctc'))
                                                <small class="text-danger form-text">
                                                    {{ $errors->first('expected_ctc') }}
                                                </small>
                                            @endif
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Expected pay annually? (in INR) <span class="text-danger">*</span>
                                                </label>
                                                <div class="edit-box">
                                                    <input type="number" name="expected_ctc" class="form-control"
                                                        placeholder="Expected CTC" value="{{ old('expected_ctc') }}"
                                                        min="1" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    What is your preferred method of working? (select
                                                    atleast 1 preference) <span class="text-danger">*</span>
                                                </label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="edit-box">
                                                            <select name="work_method_1" class="form-control"
                                                                required>
                                                                <option value="" disabled selected>
                                                                    Select working Method</option>
                                                                <option value="in-office">In Office</option>
                                                                <option value="remote">Remote</option>
                                                                <option value="hybrid">Hybrid</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="edit-box">
                                                            <select name="work_method_2" class="form-control"
                                                                required>
                                                                <option value="" disabled selected>
                                                                    Select working Method</option>
                                                                <option value="in-office">In Office</option>
                                                                <option value="remote">Remote</option>
                                                                <option value="hybrid">Hybrid</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="edit-box">
                                                            <select name="work_method_3" class="form-control"
                                                                required>
                                                                <option value="" disabled selected>
                                                                    Select working Method</option>
                                                                <option value="in-office">In Office</option>
                                                                <option value="remote">Remote</option>
                                                                <option value="hybrid">Hybrid</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Your preferable slot of working hours (select atleast 1 preference)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="edit-box">
                                                            <select name="work_hour_1" class="form-control" required>
                                                                <option value="" disabled selected>
                                                                    Select working hours</option>
                                                                <option value="us full shift">US Full Shift (8:00 PM to
                                                                    5:00
                                                                    AM/
                                                                    9:00 PM to 6:00 AM)</option>
                                                                <option value="uk full shift">UK Full Shift (2:00 PM to
                                                                    11:00
                                                                    PM)</option>
                                                                <option value="ak full shift">AK Full Shift (4:00 AM to
                                                                    1:00
                                                                    PM)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="edit-box">
                                                            <select name="work_hour_2" class="form-control" required>
                                                                <option value="" disabled selected>
                                                                    Select working hours</option>
                                                                <option value="us full shift">US Full Shift (8:00 PM to
                                                                    5:00
                                                                    AM/
                                                                    9:00 PM to 6:00 AM)</option>
                                                                <option value="uk full shift">UK Full Shift (2:00 PM to
                                                                    11:00
                                                                    PM)</option>
                                                                <option value="ak full shift">AK Full Shift (4:00 AM to
                                                                    1:00
                                                                    PM)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="edit-box">
                                                            <select name="work_hour_3" class="form-control" required>
                                                                <option value="" disabled selected>
                                                                    Select working hours</option>
                                                                <option value="us full shift">US Full Shift (8:00 PM to
                                                                    5:00
                                                                    AM/
                                                                    9:00 PM to 6:00 AM)</option>
                                                                <option value="uk full shift">UK Full Shift (2:00 PM to
                                                                    11:00
                                                                    PM)</option>
                                                                <option value="ak full shift">AK Full Shift (4:00 AM to
                                                                    1:00
                                                                    PM)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @if ($errors->has('upload_resume'))
                                                <small class="text-danger form-text">
                                                    {{ $errors->first('upload_resume') }}
                                                </small>
                                            @endif
                                            <div class="input-wrap">
                                                <label class="input-title required_label required_label">
                                                    Resume <span class="text-danger">*</span>
                                                </label>
                                                <div class="file-wrap">
                                                    <label for="upload_resume">Upload the resume</label>
                                                    <input type="file" id="upload_resume" name="upload_resume"
                                                        accept="application/pdf" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="submit-btn">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="registration-sidebar">
                            <div class="content">
                                <div class="logo">
                                    <img src="{{ asset('/assets/talentconnet/uplers-talent-vertical-logo.svg') }}"
                                        alt="">
                                </div>
                                <div class="item">
                                    <div class="sliderItemElement">
                                        <img src="{{ asset('/assets/talentconnet/registration/long-term-opp.png') }}">
                                        <h6>Long-term Opportunities</h6>
                                        <p>You can set aside the uncertainty of job security. We are here to provide
                                            opportunities, keeping long-term interest in mind..</p>
                                    </div>
                                    <div class="sliderItemElement">
                                        <img
                                            src="{{ asset('/assets/talentconnet/registration/choose-employer.png') }}">
                                        <h6>Choose Your Employer</h6>
                                        <p>With us, you get the freedom to choose your employer from the organizations
                                            associated with us and only move forward with the one you like.</p>
                                    </div>
                                    <div class="sliderItemElement">
                                        <img src="{{ asset('/assets/talentconnet/registration/full-support.png') }}">
                                        <h6>We’ll Be There For You</h6>
                                        <p class="mb-2">As you become a part of Uplers Talent Solutions, we ensure
                                            your
                                            career growth and development. Not just this, our success coaches are there
                                            for
                                            you whenever you need them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->

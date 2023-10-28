@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="contain-section">
            <div class="on-board-form">
                <div class="section-title">
                    <h3>
                        Kindly fill in these details below so that we can match you with the right fit from our pool
                        Experienced professionals
                    </h3>
                </div>
                <div class="form-step-process">
                    <ul>
                        <li class="step-one active" data-count="1">
                            <span class="step-circle"></span>
                            Basic Brief
                        </li>
                        <li class="step-two" data-count="2">
                            <span class="step-circle"></span>
                            Tech Brief
                        </li>
                    </ul>
                </div>
                <div class="common-form step-form">
                    <form action="{{ url('/HireTalent/hiring-request') }}" method="POST" enctype="multipart/form-data"
                        id="hiringRequest">
                        <div class="input-combo-wrap">
                            <div class="combo-wrap combo-box-padding-bottom">
                                @csrf
                                {{-- JD available --}}
                                <div class="brand-box-row pt-2 basic-brief">
                                    <h3 class="brand-box-title">Do you have any JD available?</h3>
                                    <div class="option-swap">
                                        <label class="option-btn">
                                            <input type="radio" class="request-radio" onclick="checkJDStatus('1')"
                                                name="jsavailable" value="Yes" checked="checked">
                                            <span class="lbl-txt">Yes</span>
                                        </label>
                                        <label class="option-btn">
                                            <input type="radio" class="request-radio" onclick="checkJDStatus('0')"
                                                name="jsavailable" value="not">
                                            <span class="lbl-txt">No</span>
                                        </label>
                                    </div>
                                    <div class="step-id" id="step-id-1" style="display: block;">
                                        <small class="major-error form-text text-danger"></small>
                                        <div class="input-label-fld row">
                                            <div class="col-md-12">
                                                <label class="label-fld">
                                                    Upload the JD <small class="form-text text-danger">(Accept only pdf
                                                        file)</small>
                                                </label>
                                                <small class="job-desc-file form-text text-danger"></small>
                                            </div>
                                            <div class="input-wrap col-md-12">
                                                <input type="file" name="job_desc_file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="divider">
                                                <div class="hr-divide"></div>
                                                <p class="para-divide">Or</p>
                                                <div class="hr-divide"></div>
                                            </div>
                                        </div>
                                        <div class="input-label-fld row">
                                            <div class="col-md-12">
                                                <label class="label-fld ">
                                                    Paste the JD
                                                </label>
                                                <small class="job-desc form-text text-danger"></small>
                                            </div>
                                            <div class="input-wrap col-md-12">
                                                <textarea cols="10" name="jdManual" placeholder="Paste JD Here"></textarea>
                                            </div>
                                        </div>
                                        <div class="input-label-fld row">
                                            <div class="col-lg-3 col-md-12">
                                                <label class="label-fld">
                                                    Select Role for your new hire <span class="text-danger">*</span>
                                                    <small class="select-role form-text text-danger"></small>
                                                </label>
                                            </div>
                                            <div class="input-wrap col-md-9">
                                                <div class="form-group">
                                                    <select name="developer_role_jd_available" class="form-control">
                                                        <option value="" disabled selected>Select</option>
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
                                        <div class="input-label-fld row">
                                            <div class="col-lg-3 col-md-12">
                                                <label class="label-fld">
                                                    Add skills which you like to see in your hire
                                                </label>
                                                <small class="select-skills form-text text-danger"></small>
                                            </div>
                                            <div class="input-wrap col-md-9">
                                                <div class="form-group">
                                                    <select name="skills_jd_available[]"
                                                        class="form-control multiple-select" multiple="multiple">
                                                        <option value="Wordpress">Wordpress</option>
                                                        <option value="JAVA">JAVA</option>
                                                        <option value="xampp"> Xampp</option>
                                                        <option value="PHP"> PHP</option>
                                                        <option value="HTML/CSS">HTML/CSS</option>
                                                        <option value="Laravel">Laravel</option>
                                                        <option value="Git">Git</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-id" id="step-id-2" style="display: none">
                                        <div class="input-label-fld row">
                                            <label class="label-fld col-lg-3 col-md-12">Select Role for your new hire <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-wrap col-md-9">
                                                <div class="form-group">
                                                    <select name="developer_role" class="form-control">
                                                        <option value="" disabled selected>Select</option>
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
                                        <div class="input-label-fld row">
                                            <label class="label-fld col-lg-3 col-md-12">Add skills which you like to see in your
                                                hire</label>
                                            <div class="input-wrap col-md-9">
                                                <div class="form-group">
                                                    <select name="skills[]" class="form-control multiple-select"
                                                        multiple="multiple">
                                                        <option value="Wordpress">Wordpress</option>
                                                        <option value="JAVA">JAVA</option>
                                                        <option value="xampp"> Xampp</option>
                                                        <option value="PHP"> PHP</option>
                                                        <option value="HTML/CSS">HTML/CSS</option>
                                                        <option value="Laravel">Laravel</option>
                                                        <option value="Git">Git</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tech Brief Info --}}
                                <div class="tech-brief d-none">
                                    <div class="brd-box-row">
                                        <label class="brd-box-title">
                                            Working Time Zone <span class="text-danger">*</span>
                                            <small class="form-text text-danger time-zone"></small>
                                        </label>
                                        <div class="rev-select p-0 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <select name="time_zone" class="form-control">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="IST Shift">IST Shift</option>
                                                    <option value="UK Shift">UK Shift</option>
                                                    <option value="AU Overlapping">AU Overlapping</option>
                                                    <option value="AU Full Shift">AU Full Shift</option>
                                                    <option value="US Overlapping">US Overlapping</option>
                                                    <option value="US Full Shift">US Full Shift</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="brd-box-row">
                                        <h3 class="brd-box-title">For how long are you looking to have the full-time
                                            developer? <span class="text-danger">*</span></h3>
                                        <div class="option-wrap p-0 col-lg-6 col-md-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="option-box">
                                                        <input type="radio" name="working_time_period"
                                                            class="req-radio" value="Long Term" checked="true">
                                                        <span class="lbl-text">Long Term / On-going (12+ months)</span>
                                                    </label>
                                                </div>
                                                <div class="col-12">
                                                    <label class="option-box">
                                                        <input type="radio" name="working_time_period"
                                                            class="req-radio" value="Short Term">
                                                        <span class="lbl-text">Short Term / For a limited time period
                                                            (3 to 12 months)</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="brd-box-row">
                                        <h3 class="brd-box-title">What type of Engagement you are looking for?
                                            <span class="text-danger">*</span>
                                            <small class="form-text text-danger time-period"></small>
                                        </h3>
                                        <div class="rev-select p-0 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <select name="time_period" class="form-control">
                                                    <option value="" disabled selected>Select type of Engagement
                                                    </option>
                                                    <option value="Full Time">Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Project to Project">Project to Project</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="brd-box-row">
                                        <h3 class="brd-box-title">How many years of experience do you need?
                                            <span class="text-danger">*</span>
                                            <small class="form-text text-danger experience-required"></small>
                                        </h3>
                                        <div class="option-wrap p-0 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <input type="number" min="1" class="form-control"
                                                    name="experience_year"
                                                    oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="brd-box-row">
                                        <h3 class="brd-box-title">How soon do you want to onboard the developer(s)?
                                            <span class="text-danger">*</span>
                                            <small class="form-text text-danger onboard-time-period"></small>
                                        </h3>
                                        <div class="rev-select p-0 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                @if ($errors->has('onborading_time_period'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('onborading_time_period') }}
                                                    </small>
                                                @endif
                                                <select name="onborading_time_period" class="form-control">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="15 Days">15 Days</option>
                                                    <option value="30 Days">30 Days</option>
                                                    <option value="45 Days">45 Days</option>
                                                    <option value="60 Days">60 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="brd-box-row">
                                        <h3 class="brd-box-title">How many developer(s) do you need?
                                            <span class="text-danger">*</span>
                                            <small class="form-text text-danger developer-required"></small>
                                        </h3>
                                        <div class="option-wrap p-0 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <input type="number" min="1" class="form-control"
                                                    name="developer_count"
                                                    oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="selection-list">
                                        <div class="brd-box-row">
                                            <h3 class="brd-box-title">Have you allotted any specific budget for this
                                                role?
                                                <span class="text-danger">*</span>
                                            </h3>
                                        </div>
                                        <div class="selection-box">
                                            <div>
                                                <div class="gray-sub-title">Please select the relevant option:(Enter
                                                    the amount whenever applicable)</div>
                                                <div class="row m-0 mr-2 mb-3 align-items-center">
                                                    <div class="default-select mr-2">
                                                        <input type="radio" class="custom-control-input"
                                                            name="radio-option" checked="checked">
                                                        <label class="lbl-text">
                                                            I'm willing to spend not more than
                                                        </label>
                                                    </div>
                                                    <div class="rel-textbox">
                                                        <input type="number">
                                                    </div>
                                                </div>
                                                <div class="row m-0 mr-2 mb-3 align-items-center">
                                                    <div class="default-select">
                                                        <input type="radio" class="custom-control-input"
                                                            name="radio-option">
                                                        <span class="lbl-text">
                                                            It can be anywhere between
                                                        </span>
                                                    </div>
                                                    <div class="rel-textbox">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="number" value="0">
                                                            </div>
                                                            <div class="col-1">
                                                                <label for="">To</label>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="number" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-0 mr-2 mb-3 align-items-center">
                                                    <div class="default-select">
                                                        <input type="radio" class="custom-control-input"
                                                            name="radio-option">
                                                        <span class="lbl-text">
                                                            No bar for the right candidate
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-wrap col-sm-12" style="text-align: right;">
                                <button type="button" class="common-btn nextBtn">NEXT</button>
                                <button type="button" class="common-btn nextSubmitBtn d-none">NEXT</button>
                                <button type="submit" class="common-btn submitBtn d-none">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')
<script>
    // $('body').on('change', '.input-combo-wrap .combo-wrap .step-file-wrap input[name="job_desc_file"]', function() {
    //     // $.ajax({
    //     //     url: "{{ url('HireTalent/hiring-job-description') }}",
    //     //     type: "POST",
    //     //     contentType: 'multipart/form-data',
    //     //     cache: false,
    //     //     contentType: false,
    //     //     processData: false,
    //     //     data: $('#hiring-request').serialize(),
    //     //     success: function(response) {
    //     //         console.log(response);
    //     //     }
    //     // });
    // });
</script>

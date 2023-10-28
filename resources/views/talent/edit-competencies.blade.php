@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

@php
    if (!$data->isEmpty()) {
        $coreCompetencies = $data[0];
        $skills = explode(',', $coreCompetencies->skills);
        $tools = explode(',', $coreCompetencies->application_tool_used);
        $position_open = $coreCompetencies->position_open_for;
        $portfolio = $coreCompetencies->portfolio;
        $coreAchievement = $coreCompetencies->coreCompetencieAchivements;
    } else {
        $position_open = '';
        $tools = [];
        $portfolio = '';
        $skills = [];
    }
@endphp

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
                <form action="{{ url('/Talent/edit-competencies') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Position You’re Open For <span class="text-danger">*</span></label>
                            <select name="position_open" class="form-control-element">
                                <option value="" disabled selected>Select Position</option>
                                <option @if ($position_open == 'DevOps Engineer') {{ 'selected' }} @endif
                                    value="DevOps Engineer">DevOps Engineer</option>
                                <option @if ($position_open == 'Shopify Developer') {{ 'selected' }} @endif
                                    value="Shopify Developer">Shopify Developer</option>
                                <option @if ($position_open == 'NodeJS Developer') {{ 'selected' }} @endif
                                    value="NodeJS Developer">NodeJS Developer</option>
                                <option @if ($position_open == 'PHP Developer') {{ 'selected' }} @endif
                                    value="PHP Developer">PHP Developer</option>
                                <option @if ($position_open == 'JAVA Developer') {{ 'selected' }} @endif
                                    value="JAVA Developer">JAVA Developer</option>
                            </select>
                            @if ($errors->has('position_open'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('position_open') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Applications & Tools Used <span class="text-danger">*</span></label>
                            <select name="application_tool[]" class="form-control-element multiple-select"
                                multiple="multiple">
                                <option @if (in_array('Wordpress', $tools)) {{ 'selected' }} @endif value="Wordpress">
                                    Wordpress</option>
                                <option @if (in_array('xampp', $tools)) {{ 'selected' }} @endif value="xampp">
                                    Xampp</option>
                                <option @if (in_array('PHP', $tools)) {{ 'selected' }} @endif value="PHP">PHP
                                </option>
                                <option @if (in_array('Cpanel', $tools)) {{ 'selected' }} @endif value="Cpanel">
                                    CPanel</option>
                                <option @if (in_array('HTML/CSS', $tools)) {{ 'selected' }} @endif value="HTML/CSS">
                                    HTML/CSS</option>
                                <option @if (in_array('Laravel', $tools)) {{ 'selected' }} @endif value="Laravel">
                                    Laravel</option>
                                <option @if (in_array('Git', $tools)) {{ 'selected' }} @endif value="Git">
                                    Git</option>
                            </select>
                            @if ($errors->has('application_tool'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('application_tool') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Portfolio / Code Repository URL</label>
                            <input type="text" name="portfolio_link" class="form-control-element"
                                value="{{ $portfolio }}">
                            @if ($errors->has('portfolio_link'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('portfolio_link') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Skills <span class="text-danger">*</span></label>
                            <select name="skills[]" class="form-control-element multiple-select" multiple="multiple">
                                <option @if (in_array('Wordpress', $skills)) {{ 'selected' }} @endif
                                    value="Wordpress">Wordpress</option>
                                <option @if (in_array('JAVA', $skills)) {{ 'selected' }} @endif value="JAVA">
                                    JAVA</option>
                                <option @if (in_array('xampp', $skills)) {{ 'selected' }} @endif value="xampp">
                                    Xampp</option>
                                <option @if (in_array('PHP', $skills)) {{ 'selected' }} @endif value="PHP">
                                    PHP</option>
                                <option @if (in_array('HTML/CSS', $skills)) {{ 'selected' }} @endif
                                    value="HTML/CSS">HTML/CSS</option>
                                <option @if (in_array('Laravel', $skills)) {{ 'selected' }} @endif value="Laravel">
                                    Laravel</option>
                                <option @if (in_array('Git', $skills)) {{ 'selected' }} @endif value="Git">
                                    Git</option>
                            </select>
                            @if ($errors->has('skills'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('skills') }}
                                </small>
                            @endif
                        </div>
                        <div class="row" id="achievementAdd">
                            <label>Your Achievements</label>
                            @if (!$data->isEmpty())
                                @foreach ($data as $item)
                                    @if (!$item->core->isEmpty())
                                        @foreach ($item->core as $value)
                                            <div class="col-lg-11 col-xl-11 form-group">
                                                <div class="row">
                                                    <div class="col-lg-6 col-xl-6">
                                                        <input type="hidden" name="achievementHidden[]" value="1">
                                                        <input name="achievement_note[]" class="form-control-element"
                                                            value="{{ $value->achievement }}">
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6">
                                                        <input type="hidden" name="hiddenAchiveFile[]"
                                                            value="{{ $value->achievement_profile }}">
                                                        <input type="file" name="achievement_file[]"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                            <div class="addBtn col-lg-1 col-xl-1">
                                <button type="button">
                                    <img src="{{ asset('assets/talentconnet/profile/plus.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12 profileFormAction pb-4">
                            <button type="submit" class="saveBtn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

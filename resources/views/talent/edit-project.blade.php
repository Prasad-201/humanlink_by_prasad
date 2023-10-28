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
                <form action="{{ url('/Talent/edit-project') . '/' . $talentProject->id }}" method="post"
                    autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label class="required_label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Project Name" name="project_name"
                                value="{{ $talentProject->project_name }}" class="form-control-element">
                            @if ($errors->has('project_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('project_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="company_name" class="form-control-element"
                                placeholder="Enter Company Name" value="{{ $talentProject->company_name }}" required>
                            @if ($errors->has('company_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('company_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Skills <span class="text-danger">*</span></label>
                            @php
                                $skills = explode(',', $talentProject->skills);
                            @endphp
                            <select name="skills[]" class="form-control-element multiple-select" multiple="multiple">
                                <option @if (in_array('Wordpress', $skills)) {{ 'selected' }} @endif value="Wordpress">
                                    Wordpress</option>
                                <option @if (in_array('JAVA', $skills)) {{ 'selected' }} @endif value="JAVA">JAVA
                                </option>
                                <option @if (in_array('xampp', $skills)) {{ 'selected' }} @endif value="xampp">
                                    Xampp</option>
                                <option @if (in_array('PHP', $skills)) {{ 'selected' }} @endif value="PHP">PHP
                                </option>
                                <option @if (in_array('HTML/CSS', $skills)) {{ 'selected' }} @endif value="HTML/CSS">
                                    HTML/CSS</option>
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
                        <div class="col-lg-12 form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control-element" required>{{ $talentProject->description }}</textarea>
                            @if ($errors->has('description'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('description') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Start Date <span class="text-daner">*</span></label>
                            <input type="date" name="start_date" class="form-control-element"
                                placeholder="Enter Company Name" value="{{ $talentProject->start_date }}" required>
                            @if ($errors->has('start_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('start_date') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group" id="not-work-with">
                            <label>End Date <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" class="form-control-element"
                                placeholder="Enter Company Name" value="{{ $talentProject->end_date }}">
                            @if ($errors->has('end_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('end_date') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-md-12 profileFormAction pb-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-6" style="text-align: right;">
                                    <button class="saveBtn">Save Changes</button>
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

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
                <form action="{{ url('/Talent/add-project') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label class="required_label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Project Name" name="project_name"
                                value="{{ old('project_name') }}" class="form-control-element">
                            @if ($errors->has('project_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('project_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="company_name" class="form-control-element"
                                placeholder="Enter Company Name" value="{{ old('company_name') }}" required>
                            @if ($errors->has('company_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('company_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control-element" required>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('description') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Skills <span class="text-danger">*</span></label>
                            <select name="skills[]" class="form-control-element multiple-select" multiple="multiple">
                                <option value="Wordpress">Wordpress</option>
                                <option value="JAVA">JAVA</option>
                                <option value="xampp">Xampp</option>
                                <option value="PHP">PHP</option>
                                <option value="HTML/CSS">HTML/CSS</option>
                                <option value="Laravel">Laravel</option>
                                <option value="Git">Git</option>
                            </select>
                            @if ($errors->has('skills'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('skills') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Start Date <span class="text-daner">*</span></label>
                            <input type="date" name="start_date" class="form-control-element"
                                placeholder="Enter Company Name" value="{{ old('start_date') }}" required>
                            @if ($errors->has('start_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('start_date') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group" id="not-work-with">
                            <label>End Date <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" class="form-control-element"
                                placeholder="Enter Company Name" value="{{ old('end_date') }}">
                            @if ($errors->has('end_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('end_date') }}
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

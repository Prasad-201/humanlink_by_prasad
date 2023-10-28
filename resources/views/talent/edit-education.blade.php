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
                <form action="{{ url('/Talent/edit-education') . '/' . $talentEducation->id }}" method="post"
                    autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Degree/Stream <span class="text-danger">*</span></label>
                            <input type="text" name="degree" class="form-control-element"
                                value="{{ $talentEducation->degree }}">
                            @if ($errors->has('degree'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('degree') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>University/School <span class="text-danger">*</span></label>
                            <input type="text" name="uiversity" class="form-control-element"
                                value="{{ $talentEducation->university }}">
                            @if ($errors->has('uiversity'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('uiversity') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Start Date <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" class="form-control-element"
                                value="{{ $talentEducation->start_date }}">
                            @if ($errors->has('start_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('start_date') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>End Date (or expected) <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" class="form-control-element"
                                value="{{ $talentEducation->end_date }}">
                            </select>
                            @if ($errors->has('end_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('end_date') }}
                                </small>
                            @endif
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

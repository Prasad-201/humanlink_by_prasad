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
                <form action="{{ url('/Talent/add-education') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Degree/Stream <span class="text-danger">*</span></label>
                            <input type="text" name="degree" class="form-control-element" value="{{ old('degree') }}">
                            @if ($errors->has('degree'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('degree') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>University/School <span class="text-danger">*</span></label>
                            <input type="text" name="uiversity" class="form-control-element" value="{{ old('uiversity') }}">
                            @if ($errors->has('uiversity'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('uiversity') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Start Date <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" class="form-control-element"
                                value="{{ old('start_date') }}">
                            @if ($errors->has('start_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('start_date') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>End Date (or expected) <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" class="form-control-element">
                            </select>
                            @if ($errors->has('end_date'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('end_date') }}
                                </small>
                            @endif
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

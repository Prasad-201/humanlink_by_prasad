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
                <form action="{{ url('/Talent/edit-testimonial') . '/' . $talentTestimonial->id }}" method="post"
                    autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Client Name</label>
                            <input type="text" name="client_name" value="{{ $talentTestimonial->client_name }}"
                                class="form-control-element">
                            @if ($errors->has('course_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('course_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6 form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" value="{{ $talentTestimonial->company_name }}"
                                class="form-control-element">
                            @if ($errors->has('company_name'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('company_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Testimonial <span class="text-danger">*</span></label>
                            <textarea name="testimonial" class="form-control-element" required>{{ $talentTestimonial->testimonial }}</textarea>
                            @if ($errors->has('testimonial'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('testimonial') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-md-12 profileFormAction pb-4">
                            <div class="row">
                                <div class="col-lg-6" style="text-align: right;">
                                    <button type="submit" class="saveBtn">Save Changes</button>
                                </div>
                                <div class="col-lg-6">
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

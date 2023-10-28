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
                <form action="{{ url('/Talent/add-assessment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 form-group">
                            <label>Assessment <span class="text-danger">*</span></label>
                            <select name="assessment[]" class="form-control-element multiple-select"
                                multiple="multiple">
                                @foreach ($assessments as $assessment)
                                    <option value="{{ $assessment->assessments_id }}">
                                        {{ $assessment->assessment_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('assessment'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('assessment') }}
                                </small>
                            @endif
                        </div>
                        <div class="col-md-12 profileFormAction pb-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-6">
                                    <button class="saveBtn">Save Changes</button>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <button type="button" class="saveBtn" style="background: #000;">
                                        <a href="{{ url('/Talent/profile') }}" style="color: #FFDA30;">Back</a>
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

<script>
    // $('select[name="assessment[]"] option[value="1"]').prop('selected', true);
</script>
@include('talent_temp.footer')

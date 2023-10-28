@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="heading">
                <h2>Welcome to Assessment Section!</h2>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-md-1">
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>{{ $assessment->assessment_name }}</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="border-box-body-wrap">
                                <div class="profile-Accordion">
                                    <div class="accordionContentOpen assessmentContent">
                                        <form
                                            action="{{ url('/SuperAdmin/add-question') . '/' . $assessment->assessments_id }}"
                                            method="POST" autocomplete="OFF">
                                            <div class="row">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Question</label>
                                                        <textarea placeholder="Enter Question" name="assessment_question" class="form-control-element">{{ old('assessment_question') }}</textarea>
                                                        @error('assessment_question')
                                                            <small class="text-danger form-text">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Option 1</label>
                                                        <input placeholder="Option One" name="option_one"
                                                            class="form-control-element"
                                                            value="{{ old('option_one') }}">
                                                        @error('option_one')
                                                            <small class="text-danger form-text">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Option 2</label>
                                                        <input placeholder="Option two" name="option_two"
                                                            class="form-control-element"
                                                            value="{{ old('option_two') }}">
                                                        @error('option_two')
                                                            <small class="text-danger form-text">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Option 3</label>
                                                        <input placeholder="Option three" name="option_three"
                                                            class="form-control-element"
                                                            value="{{ old('option_three') }}">
                                                        @error('option_three')
                                                            <small
                                                                class="text-danger form-text">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Option 4</label>
                                                        <input placeholder="Option Four" name="option_four"
                                                            class="form-control-element"
                                                            value="{{ old('option_four') }}">
                                                        @error('option_four')
                                                            <small class="text-danger form-text">{{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Right Option</label>
                                                        <input placeholder="Ex. A" name="right_answer"
                                                            class="form-control-element"
                                                            value="{{ old('right_answer') }}">
                                                        @error('right_answer')
                                                            <small class="text-danger form-text">{{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 profileFormAction pb-4">
                                                    <button class="saveBtn">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

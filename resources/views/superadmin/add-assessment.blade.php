@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading">
                <h2>Welcome to Assessment Section!</h2>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-md-1">
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>Assessment</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="border-box-body-wrap">
                                <div class="profile-Accordion">
                                    <div class="accordionContentOpen assessmentContent">
                                        <form action="{{ url('/SuperAdmin/add-assessment') }}" method="POST"
                                            autocomplete="OFF">
                                            <div class="row">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Assessment Name</label>
                                                        <input type="text" placeholder="Assessment Name"
                                                            name="assessment_name" class="form-control-element"
                                                            value="{{ old('assessment_name') }}">
                                                        @error('assessment_name')
                                                            <small class="text-danger form-text">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 profileFormAction pb-4">
                                                    <button class="saveBtn btn-w-100">Submit</button>
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

@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading">
                <h2>Welcome to Video Module!</h2>
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
            </div>
            <div class="row">
                <div class="col-sm-10 offset-md-1">
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>Video Module</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="border-box-body-wrap">
                                <div class="profile-Accordion">
                                    <div class="accordionContentOpen assessmentContent">
                                        <form action="{{ url('/SuperAdmin/add-module') }}" method="POST"
                                            autocomplete="OFF">
                                            <div class="row">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Video Module Name</label>
                                                        <input type="text" placeholder="Video Module Name"
                                                            name="moduleName" class="form-control-element"
                                                            value="{{ old('moduleName') }}">
                                                        @error('moduleName')
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

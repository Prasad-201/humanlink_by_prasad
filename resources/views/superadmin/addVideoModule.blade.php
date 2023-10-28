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
                            <h4>{{ $VideoModule->moduleName }}</h4>
                        </div>
                        <div class="border-box-body" style="margin-top: 10px;">
                            <div class="border-box-body-wrap">
                                <div class="profile-Accordion">
                                    <div class="accordionContentOpen assessmentContent">
                                        <form
                                            action="{{ url('/SuperAdmin/add-video-module') . '/' . $VideoModule->id }}"
                                            method="POST" autocomplete="OFF" enctype="multipart/form-data">
                                            <div class="row">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Video Heading</label>
                                                        <input type="text" name="videoHeading" placeholder="Video Heading"
                                                            class="form-control-element" value="{{ old('videoHeading') }}">
                                                        @error('videoHeading')
                                                            <small class="text-danger form-text">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Enter Youtube Link</label>
                                                        <input type="text" name="videoLink" placeholder="Youtube Link"
                                                            class="form-control-element" value="{{ old('videoLink') }}">
                                                        @error('videoLink')
                                                            <small class="text-danger form-text">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Select Video File</label>
                                                        <input type="file" name="videoFile"
                                                            class="form-control-element">
                                                        @error('videoFile')
                                                            <small class="text-danger form-text">{{ $message }}</small>
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

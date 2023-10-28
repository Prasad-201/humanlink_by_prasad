@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading mb-0">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>{{ $VideoModule->moduleName }} Module</h2>
                    </div>
                </div>
            </div>
            <div class="talent-listing" style="margin-top: 10px">
                <div class="row">
                    @if ($videoModules->empty())
                        @foreach ($videoModules as $videoModule)
                            <div class="col-md-6">
                                <div class="talent-box">
                                    <div class="box-head w-btn">
                                        <div class="left-box">
                                            <h4>{{ $videoModule->videoHeading }}</h4>
                                        </div>
                                    </div>
                                    <div class="box-info">
                                        <div class="head-attribute">
                                            @if ($videoModule->moduleType == 'file')
                                                <video width="320" height="240" class="iframe-video-player"
                                                    controls>
                                                    <source src="{{ asset($videoModule->videoModuleLink) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <iframe src="{{ $videoModule->videoModuleLink }}"
                                                    class="iframe-video-player" title="YouTube video player"
                                                    frameborder="0" allowfullscreen></iframe>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

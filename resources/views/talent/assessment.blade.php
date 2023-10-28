@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container containSection assessment">
        <div class="assessment-page-heading">
            <h2>Assessments</h2>
            <p>Static - To join the Uplers Talent Pool, you need to pass the assessments listed below.</p>

            @if (session()->has('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <small class="form-text">{{ session()->get('success') }}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small class="text-danger form-text">{{ session()->get('error') }}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="profileListing">
            <div class="row">
                @if (!$assessments->isEmpty())
                    @foreach ($assessments as $assessment)
                        <div class="col-lg-4 col-md-6">
                            <div class="assessment-box">
                                <div class="profileBox">
                                    <div class="proWrap">
                                        {{-- 
                                            <div class="favorite-tag">
                                                <img src="https://ats.uplers.com/images/talent/rejected.png">
                                            </div>
                                         --}}
                                        <div class="box-content">
                                            <div class="front"><img class="box-image">
                                                <div class="basicInfo">
                                                    <div class="name">
                                                        <h6>{{ $assessment->assessment_name }}</h6>
                                                    </div>
                                                    <div class="job"><strong>Est. Time:</strong> 30 Mins</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="footerWrap">
                                            <form action="{{ url('/Talent/intro-assessment') }}" method="post" id="AssessForm">
                                                @csrf
                                                <input type="hidden" name="assessmentId"
                                                    value="{{ $assessment->assessments_id }}">
                                                <a target="_blank" class="link"
                                                    onclick="$(this).closest('form').submit();">Start
                                                    Assessment</a>
                                            </form>
                                            <a class="link">Note</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</main>

<script>
    // $(window).bind('beforeunload', function() {
    //     return 'Are you sure you want to leave?';
    // });
</script>

@include('talent_temp.footer')

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
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Welcome to Assessment Section!</h2>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div style="text-align: right">
                            <a href="{{ url('/SuperAdmin/add-assessment') }}" class="common-btn">Add Assessment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($assessments as $assessment)
                    <div class="col-sm-6">
                        <div class="border-box">
                            <div class="border-box-head">
                                <h4>{{ ucfirst($assessment->assessment_name) }}</h4>
                            </div>
                            <div class="border-box-body">
                                <div class="border-box-body-wrap">
                                    <h5>Static - We are trusted by leading brands and agencies around the world.</h5>
                                    <div class="row">
                                        <div class="col-md-6" style="text-align: left;">
                                            <a href="{{ url('/SuperAdmin/view-questions') . '/' . $assessment->assessments_id }}"
                                                class="link-btn">View Question</a>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <a href="{{ url('/SuperAdmin/add-question') . '/' . $assessment->assessments_id }}"
                                                class="link-btn">Add Question</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

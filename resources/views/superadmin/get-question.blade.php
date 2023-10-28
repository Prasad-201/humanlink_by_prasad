@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading mb-0">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>All Question</h2>
                        <p>Static - Below is your open position for which the interview and feedback process is going on. </p>
                    </div>
                    <div class="col-sm-4" style="text-align: right;">
                        <a class="common-btn" href="{{ url('/SuperAdmin/add-question') . '/' . $param }}">Add
                            Question</a>
                    </div>
                </div>
            </div>
            <div class="talent-listing">
                @if (!$assessmentQuestion->isEmpty())
                    @foreach ($assessmentQuestion as $question)
                        <div class="talent-box">
                            <div class="box-head w-btn">
                                <div class="left-box">
                                    <h4>{{ $loop->index + 1 . '] ' . $question->assessment_question }}</h4>
                                </div>
                                <div class="right-box">
                                    <a class="preview-btn text-decoration-none"
                                        href="{{ url('/SuperAdmin/edit-question') . '/' . $question->id }}">Edit</a>
                                </div>
                            </div>
                            <div class="box-info">
                                <div class="head-attribute">
                                    <div class="row">
                                        <div class="attribute-box">
                                            <p>{{ 'A] ' . $question->assessment_option_1 }}</p>
                                            <p>{{ 'B] ' . $question->assessment_option_2 }}</p>
                                            @if (isset($question->assessment_option_3))
                                                <p>{{ 'C] ' . $question->assessment_option_3 }}</p>
                                            @endif
                                            @if (isset($question->assessment_option_4))
                                                <p>{{ 'D] ' . $question->assessment_option_4 }}</p>
                                            @endif
                                            <div class="view-answer-content">
                                                <button type="button" class="view-btn">View Answer</button>
                                                <h5 class="sub-title">Answer : Option {{ $question->assessment_answer }}
                                                </h5>
                                            </div>
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

@include('talent_temp.footer')

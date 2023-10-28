@include('talent_temp.header')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/assessment.css') }}">

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-8">
            <div class="rounded assessment-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="student-name">{{ $talent->full_name }}</h3>
                        <input type="hidden" name="assessAppearID" value="{{ $assAppear->assCandAppearID }}">
                    </div>
                    <div class="col-md-4">
                        <h3>Violation Count : <span class="text-danger violationCount">0</span></h3>
                    </div>
                    <div class="col-md-4">
                        <h3>Time left : <strong><span class="stopwatch">10:00</span> Min</strong></h3>
                    </div>
                </div>
            </div>
            <div class="container container-section mt-1 border rounded border-2">
                <ul class="nav nav-pills mb-3" role="tablist">
                    @foreach ($assessments as $assessment)
                    @if ($loop->index == 0)
                    <li class="nav-item">
                        <div class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-{{ $loop->index + 1 }}"
                            role="tab">
                            {{ $loop->index + 1 }}
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <div class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-{{ $loop->index + 1 }}"
                            role="tab">
                            {{ $loop->index + 1 }}
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <form action="{{ url('/Talent/save-assessment') }}" method="post">
                    @csrf
                    <div class="tab-content">
                        @foreach ($assessments as $assessment)
                        @if ($loop->index == 0)
                        <div class="tab-pane fade show active" id="tab-{{ $loop->index + 1 }}">
                            <div class="question-answer-container">
                                <div class="question">
                                    <h5 data-option="{{ $assessment->assessment_answer }}">
                                        {{ $loop->index + 1 }})
                                        {{ $assessment->assessment_question }}</h5>
                                </div>
                                <div class="answer">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="A"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_1 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="B"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_2 }}
                                        </label>
                                    </div>
                                    @if (isset($assessment->assessment_option_3))
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="C"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_3 }}
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($assessment->assessment_option_4))
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="D"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_4 }}
                                        </label>
                                    </div>
                                    @endif
                                </div>
                                <div class="next-btn-element">
                                    <button type="button" name="next" class="btn btn-warning next-btn">Next</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="tab-pane fade" id="tab-{{ $loop->index + 1 }}">
                            <div class="question-answer-container">
                                <div class="question">
                                    <h5 data-option="{{ $assessment->assessment_answer }}">
                                        {{ $loop->index + 1 }})
                                        {{ $assessment->assessment_question }}</h5>
                                </div>
                                <div class="answer">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="A"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_1 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="B"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_2 }}
                                        </label>
                                    </div>
                                    @if (isset($assessment->assessment_option_3))
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="C"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_3 }}
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($assessment->assessment_option_4))
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="D"
                                                name="option-{{ $loop->index + 1 }}">
                                            {{ $assessment->assessment_option_4 }}
                                        </label>
                                    </div>
                                    @endif
                                </div>
                                <div class="next-btn-element">
                                    @if ($loop->index + 1 == count($assessments))
                                    <button type="submit" name="submit"
                                        class="btn btn-warning submit-btn">Submit</button>
                                    @else
                                    <button type="button" name="next" class="btn btn-warning next-btn">Next</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/vendor/js/assessment.js') }}"></script>
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            totalMark = 0;
            attemptQuestion = 0;
            $.each($('.question-answer-container'), function(index, value) {
                rightAnwer = $(this).find('.question h5').attr('data-option');
                checkedAnswer = $(this).find('input[type=radio]:checked').val();
                if (checkedAnswer == rightAnwer) {
                    totalMark = totalMark + 2;
                }
                if(checkedAnswer){
                    attemptQuestion++;
                }
            });

            assessAppearID = $('input[name="assessAppearID"]').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: "{{ url('/Talent/save-assessment') }}",
                method: 'POST',
                data: {
                    assessAppearID: assessAppearID,
                    totalMark: totalMark,
                    attemptQuestion: attemptQuestion,
                },
                success: function(response) {
                    // console.log(response);
                    window.location.replace("{{ url('/Talent/assessments') }}");
                }
            });
        });
    });
</script>
@include('talent_temp.footer')
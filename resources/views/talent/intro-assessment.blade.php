@include('talent_temp.header')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 md-auto sm-auto pt-3">
            <div class="border border-info bg-light p-3">
                <div class="border-bottom border-info mb-3">
                    <h2 class="text-info">Test Information</h2>
                </div>
                <h5>Test Name</h5>
                <h5 class="text-info">{{ $assessment->assessment_name }}</h5>
                <br>

                <h5>Duration</h5>
                <h5 class="text-info">Static - 10 minutes</h5>
                <br>

                <h5>No. of Questions</h5>
                <h5 class="text-info">Static - 5</h5>
                <br>

            </div>
            <div style="padding-top: 20px;">
                <form action="{{ url('/Talent/start-assessment') }}" method="post" target="_blank">
                    <a href="{{ url('Talent/assessments') }}" style="text-decoration:none; font-size:20px"
                        class="btn btn-info">Back</a>
                    @csrf
                    <input type="hidden" name="assessmentId" value="{{ $assessment->assessments_id }}">
                    <button onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-outline-info"
                        style="text-decoration:none; font-size:20px">Begin Assessment</button>
                </form>
            </div>
        </div>
        <div class="col-lg-6 sm-auto md-auto" style="padding: 20px; color: black;">
            <h1>Static - Instructions</h1>
            <div style="border-top: 2px solid #707793;padding-top:20px; padding-bottom:20px; ">
                <h5>
                    <p>1. This is an Online Test, please use proper and active internet connectivity</p>
                    <p>2. <span class="text-danger">Do Not Reload the Test Page</span>, If done so the test will
                        terminate</p>
                    <p>3. <span class="text-danger">Do Not Move out of the Test Page</span>, If done so the test will
                        terminate</p>
                    <p>4. Questions can be MCQ, Fill in Blanks or Descriptive, Read carefully before answering</p>
                    <p>5. You can skip the questions and visit them later .</p>
                    <p>
                        6. The test is webcam proctered, <span class="text-danger">moving out of the frame will cause
                            disqualification</span>.
                    </p>
                </h5>
            </div>
        </div>
    </div>
</div>

<script>
    // var myForm = document.getElementById('formID');
    // myForm.onsubmit = function() {
    //     var w = window.open('about:blank', 'Popup_Window',
    //         'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=300,left = 312,top = 234'
    //     );
    //     this.target = 'Popup_Window';
    // };
</script>
@include('talent_temp.footer')



<main id="main" class="main">
    <div class="container">
        <div class="container containSection assessment">
            <div class="assessment-page-heading">
                <h2>Message From: {{$feedbackMail['emp_name']}}</h2>
            </div>
            <div class="common-box-main">
                <h3>Feedback To:{{ $feedbackMail['candidate_name']}}</h3>   
                
                <p>{{ $feedbackMail['candidate_name']}} </P>
                <p>{{ $feedbackMail['feedback']}}</p>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

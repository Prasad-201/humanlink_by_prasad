
<main id="main" class="main">
    <div class="container">
        <div class="container containSection assessment">
            <div class="assessment-page-heading">
                <h2>Mail</h2>
            </div>
            <div class="common-box-main">
                <h3>Tickets from:{{ $mailData['emp_name']}}</h3>   
                <!-- <p>{{ $mailData['body']}}</p> -->
                <p>{{ $mailData['ticket_description']}} </P>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

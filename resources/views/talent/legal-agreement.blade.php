@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="container containSection assessment">
            <div class="assessment-page-heading">
                <h2>Static - Legal Agreement</h2>
                <p>Static - There is no legal agreement added yet. Once you clear all the assessments, you will receive the Pool Onboarding agreement.</p>
            </div>
            <div class="common-box-main">
                <h5>Static - Legal Contracts</h5>
                <p>
                    Static - MSA & NDA contracts above are designed to inform you of your rights and obligations when using the Uplers Talent Solutions service.
                </p>
                <ul>
                    <li>It includes information that should be considered as confidential</li>
                    <li>It explains which information doesn't undergo NDA policy</li>
                    <li>It protects intellectual property rights</li>
                    <li>It pinpoints a duration of legal binding (usually valid for 2, 5, or 10 years)</li>
                    <li>It set conditions for breaking the contract</li>
                    <li>It includes payment terms (the rate, deadlines, covered and uncovered expenses)</li>
                    <li>It includes audits that cover the ways a client can check the progress of the project completion</li>
                    <li>It covers all aspects of dispute resolution</li>
                </ul>
                <h5>Static - Privacy Policy</h5>
                <p>
                    You have already agreed to our <a href="{{ url('/Talent/privacy-policy') }}" class="link">Privacy Policy</a> and terms of use.
                </p>
                <ul>
                    <li>It governs your relationship with Uplers</li>
                    <li>It sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us</li>
                    <li>It sets out practices that will be followed on the collection and use of your personal data</li>
                </ul>
                <p>
                   <a href="{{ url('/Talent/point-of-contact') }}" class="link">Have Doubts? Contact TSC</a>
                </p>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

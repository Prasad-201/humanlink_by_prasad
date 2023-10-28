@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="container containSection assessment">
            <div class="assessment-page-heading">
                <h2>Feedback</h2>
            </div>
            <div class="common-box-main">
                @if (!$feedbacks->isEmpty())
                    @foreach ($feedbacks as $feedback)
                        <h5 class="mt-1">{{ ucfirst($feedback->emloyer_name) }}</h5>
                        <p>{{ $feedback->feedback_text }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

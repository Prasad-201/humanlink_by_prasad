@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading mb-0">
                @if (session()->has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="text-dark">{{ session()->get('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="text-danger">{{ session()->get('error') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">Interview<span></span></h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employer Name</th>
                            <th scope="col">Interview Date</th>
                            <th scope="col">Interview Time</th>
                            <th scope="col">Action</th>
                            {{-- <th scope="col">Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$interviews->isEmpty())
                            @foreach ($interviews as $interview)
                                <tr>
                                    <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{ ucfirst($interview->full_name) }}</td>
                                    <td>{{ $interview->interview_date }}</td>
                                    <td>{{ $interview->interview_time }}</td>
                                    <td>
                                        <button class="btn feedback-btn btn-sm btn-primary" data-candidate-id="{{ $interview->id }}"
                                            data-interview-id="{{ $interview->interview_id }}" data-bs-toggle="modal"
                                            data-bs-target="#basicModal">
                                            Feedback
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/HireTalent/send-feedback') }}" autocomplete="off" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            {{ csrf_field() }}
                            <textarea rows="3" cols="3" name="feedback" class="form-control" placeholder="feedback...." required></textarea>
                            <input type="hidden" name="inerview_id">
                            <input type="hidden" name="candidate_id">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Send <i class="bi bi-cursor-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".feedback-btn", function() {
        candidateId = $(this).data("candidate-id");
        interviewId = $(this).data("interview-id");
        $('input[name="inerview_id"]').val(interviewId);
        $('input[name="candidate_id"]').val(candidateId);
    });
</script>
@include('talent_temp.footer')

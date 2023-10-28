@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading">
                <h2>Shortlisted Talent</h2>
            </div>
            <div class="row">
                @if (!$shortlist_candidate->isEmpty())
                    @foreach ($shortlist_candidate as $candidate)
                        <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                            <div class="profile-box">
                                <div class="profile-wrap">
                                    <div class="box-content">
                                        <div class="front-box front">
                                            <figure>
                                                @if (File::exists(public_path($candidate->user_profile)) && $candidate->user_profile != null)
                                                    <img class="blurimage" alt="profile"
                                                        src="{{ asset($candidate->user_profile) }}">
                                                @else
                                                    <img class="blurimage" alt="profile"
                                                        src="{{ asset('/assets/talentconnet/hireTalent/dashboard/profile.png') }}">
                                                @endif
                                            </figure>
                                            <div class="basic-info basicInfo">
                                                <div class="name">{{ ucwords($candidate->full_name) }}</div>
                                                <div class="job">{{ ucwords($candidate->position_applied) }}</div>
                                            </div>
                                            <div class="job-type jobtype">
                                                <div class="req-list request-list">
                                                    <img
                                                        src="{{ asset('assets/talentconnet/hireTalent/dashboard/cc.png') }}">
                                                    <div class="desc"><strong>Availability:</strong>
                                                        {{ $candidate->notice_period }}
                                                    </div>
                                                </div>
                                                <div class="req-list request-list">
                                                    <img
                                                        src="{{ asset('assets/talentconnet/hireTalent/dashboard/cc.png') }}">
                                                    <div class="desc"><strong>Engagement Type:</strong> Full Time
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="back-box back">
                                            <div class="job-typejobtype">
                                                @if ($candidate->skills)
                                                    <div class="req-list request-list">
                                                        <img
                                                            src="{{ asset('assets/talentconnet/hireTalent/dashboard/skill-icon.png') }}">
                                                        <div class="desc"><strong>Skills:</strong>
                                                            {{ $candidate->skills }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="req-list request-list">
                                                    <img
                                                        src="{{ asset('assets/talentconnet/hireTalent/dashboard/skill-icon.png') }}">
                                                    <div class="desc"><strong>Talent Cost:</strong>
                                                        Open to any budget USD
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="footer-wrap footerWrap">
                                        <a target="blank" class="link"
                                            href="{{ url('/HireTalent/view-talent-profile') . '/' . $candidate->id }}">
                                            View Profile
                                        </a>
                                        <a class="link scedule-interview-btn" href="javascript:void(0)"
                                            data-bs-toggle="modal" data-bs-target="#basicModal"
                                            data-candidate-id="{{ $candidate->id }}">
                                            Scedule Interview
                                        </a>
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

<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Scedule Interview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/HireTalent/scedule-interview') }}" autocomplete="off" method="POST"
                    id="scefule-interview-form">
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label datepicker">Date</label>
                        <div class="col-sm-10">
                            {{ csrf_field() }}
                            <input type="date" name="interview_date" class="form-control" required />
                            <input type="hidden" name="inerview_candidate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-10">
                            <input type="time" name="interview_time" class="form-control" required />
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Scedule Interview</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".scedule-interview-btn", function() {
        candidateId = $(this).data("candidate-id");
        $('input[name="inerview_candidate"]').val(candidateId);
    });
</script>
@include('talent_temp.footer')

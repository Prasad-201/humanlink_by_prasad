@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading">
                <h2>Talent Pool</h2>
            </div>
            <div class="row">
                @if (!$talentInfo->isEmpty())
                    @foreach ($talentInfo as $talent)
                        @if($talent->empoyer_id == '' || $talent->empoyer_id == $employerId) 
                        <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                            <div class="profile-box">
                                <div class="profile-wrap">
                                    <div class="box-content">
                                        <div class="front-box front">
                                            <figure>
                                                @if (File::exists(public_path($talent->user_profile)) && $talent->user_profile != null)
                                                    <img class="blurimage" alt="profile"
                                                        src="{{ asset($talent->user_profile) }}">
                                                @else
                                                    <img class="blurimage" alt="profile"
                                                        src="{{ asset('/assets/talentconnet/hireTalent/dashboard/profile.png') }}">
                                                @endif
                                            </figure>
                                            <div class="basic-info basicInfo">
                                                <div class="name">{{ ucwords($talent->full_name) }}</div>
                                                <div class="job">{{ ucwords($talent->position_applied) }}</div>
                                            </div>
                                            <div class="job-type jobtype">
                                                <div class="req-list request-list">
                                                    <img
                                                        src="{{ asset('assets/talentconnet/hireTalent/dashboard/cc.png') }}">
                                                    <div class="desc"><strong>Availability:</strong>
                                                        {{ $talent->notice_period }}
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
                                                @if ($talent->skills)
                                                    <div class="req-list request-list">
                                                        <img
                                                            src="{{ asset('assets/talentconnet/hireTalent/dashboard/skill-icon.png') }}">
                                                        <div class="desc"><strong>Skills:</strong>
                                                            {{ $talent->skills }}
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
                                            href="{{ url('/HireTalent/view-talent-profile') . '/' . $talent->id }}">
                                            View Profile
                                        </a>
                                        @if ($talent->shortlist_id != null && $talent->empoyer_id == session()->get(HLINKID))
                                            <a class="link bg-danger shortlist-btn text-decoration-none p-2"
                                                href="{{ url('HireTalent/remove-shortlist-candidate') . '/' . $talent->shortlist_id }}">
                                                Remove
                                            </a>
                                        @else
                                            <a class="link bg-warning shortlist-btn text-decoration-none p-2"
                                                href="{{ url('HireTalent/shortlist-candidate') . '/' . $talent->id }}">
                                                Short List
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

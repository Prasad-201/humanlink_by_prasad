@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading">
                <h2>All Company</h2>
                <p>All Company Based on Open Position.</p>
            </div>
            <div class="row">
                @foreach ($all_company as $company)
                    <div class="col-sm-4 mb-3">
                        <div class="profile-box">
                            <div class="profile-wrap">
                                <div class="box-content box-content-none">
                                    <div class="front-box front">
                                        <figure>
                                            @if (File::exists(public_path($company->hiretalent_profile)) && $company->hiretalent_profile != null)
                                                <img class="" alt="profile"
                                                    src="{{ asset($company->hiretalent_profile) }}">
                                            @else
                                                <img class="" alt="profile"
                                                    src="{{ asset('/assets/talentconnet/hireTalent/dashboard/profile.png') }}">
                                            @endif
                                        </figure>
                                        <div class="basic-info basicInfo">
                                            <div class="name">{{ ucwords($company->full_name) }}</div>
                                            <div class="job">{{ ucwords($company->company_name) }}</div>
                                        </div>
                                        <div class="job-type jobtype">
                                            <div class="req-list request-list">
                                                <img
                                                    src="{{ asset('assets/talentconnet/hireTalent/dashboard/cc.png') }}">
                                                <div class="desc">
                                                    <strong>Designation:</strong>
                                                    {{ ucwords($company->designation) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="footer-wrap footerWrap">
                                    <a target="blank" class="link"
                                        href="{{ url('/SuperAdmin/hiring-request') . '/' . $company->id }}">
                                        View Hiring Request
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

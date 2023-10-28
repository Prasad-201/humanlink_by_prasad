@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading mb-0">
                @if (session()->has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="text-danger">{{ session()->get('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="text-danger">{{ session()->get('error') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-8">
                        <h2>Open Positions</h2>
                    </div>
                    <div class="col-sm-4 text-right">
                    </div>
                </div>
            </div>
            <div class="talent-listing">
                @if (!$hiring_requests->isEmpty())
                    @foreach ($hiring_requests as $open_position)
                        <div class="talent-box">
                            <div class="box-head w-btn">
                                <div class="left-box">
                                    <h4>{{ $open_position->developer_role }}</h4>
                                </div>
                                <div class="right-box">
                                    <div class="preview-btn">{{ $open_position->position_unique_id }}</div>
                                    <div class="preview-btn">Open</div>
                                </div>
                            </div>
                            <div class="box-info">
                                <div class="head-attribute">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="attribute-box">
                                                <h5 class="sub-title">Package</h5>
                                                <p>$3000 USD to $4950 USD / Month</p>
                                            </div>
                                            <div class="attribute-box">
                                                <h5 class="sub-title">Years of Experience</h5>
                                                <p>{{ $open_position->experience_required }} Years</p>
                                            </div>
                                            <div class="attribute-box">
                                                <h5 class="sub-title">Time Zone</h5>
                                                <p>{{ $open_position->working_time_zone }}</p>
                                            </div>
                                            <div class="attribute-box">
                                                <h5 class="sub-title">Duration</h5>
                                                <p>{{ $open_position->working_with_period }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 attribute-box-element brad-list">
                                            <div class="attribute-box">
                                                <h5 class="sub-title">Availability</h5>
                                                <p>{{ $open_position->time_period }}</p>
                                            </div>
                                            <div class="attribute-box">
                                                <h5 class="sub-title">Joining</h5>
                                                <p>{{ $open_position->onboard_time_period }}</p>
                                            </div>
                                            <div class="attribute-box">
                                                <h5 class="sub-title">Number of Talent Requested</h5>
                                                <p>{{ $open_position->required_developers }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3>No Data Found</h3>
                @endif

                {!! $hiring_requests->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

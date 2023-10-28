@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="heading">
                @php
                    $talentID = getUserId();
                    $talentInfo = \App\Models\HireTalent::where('id', $talentID)->first();
                @endphp
                <h2>Hello <span>{{ ucfirst($talentInfo->full_name) }}</span>! Welcome to HumanLink Talent Solutions.</h2>
                <div class="subhead"></div>
                <div class="grayText">
                    <p>
                        static - Hire India's top 3.5% WordPress Developers from our pool of pre-vetted, experienced, and
                        ready-to-join talents. Get the best talent to join your workforce today!
                    </p>
                </div>
            </div>
            @if (!$openPosition->isEmpty())
                <div class="boxStyle-one">
                    <div class="boxStyle-one-wrap ">
                        <div class="box-head">
                            <h4>Pending Action</h4>
                        </div>
                        <!-- actions Listing START -->
                        <div class="actionListing content _mCS_1">
                            <div class="mCustomScrollBox mCSB_inside">
                                <div class="mCSB_container">
                                    @foreach ($openPosition as $position)
                                        <div class="actionBox recent-req">
                                            <div class="iconBox">
                                                <img class="mCS_img_loaded"
                                                    src="{{ asset('/assets/talentconnet/hireTalent/profile/pin-black-icon.png') }}">
                                            </div>
                                            <div class="actionDetail">
                                                <div class="actionInfo">
                                                    <h4>New Open Position for {{ $position->developer_role }}<div
                                                            class="rightCode">
                                                            <div class="hrCode">{{ $position->position_unique_id }}
                                                            </div>
                                                        </div>
                                                    </h4>
                                                    <div class="intinfo">
                                                        <div class="int-title">Open Position</div>
                                                        <div class="int-time">
                                                            {{ date('d M Y H', strtotime($position->created_at)) }}
                                                        </div>
                                                        <div class="int-link">
                                                            <a href="{{ url('/HireTalent/open-position') }}">
                                                                View More
                                                                <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                                                    class="mCS_img_loaded">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    Static - 
                    <div class="video-box">
                        <img src="{{ asset('assets/talentconnet/hireTalent/george.jpg') }}" alt="">
                        <a href="https://www.youtube.com/watch?v=Bzf-ngn_JAw" class="play-btn" target="_BLOCK">
                            <i class="bi bi-play-fill"></i>
                        </a>
                    </div>
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>Static - Our Clients</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="border-box-body-wrap">
                                <h5>We are trusted by leading brands and agencies around the world.</h5>
                                <div class="clientLogo-slider">
                                    <figure>
                                        <img src="{{ asset('assets\talentconnet\hireTalent\our-client\amazone.svg') }}"
                                            alt="">
                                    </figure>
                                    <figure>
                                        <img src="{{ asset('assets\talentconnet\hireTalent\our-client\DHL.svg') }}"
                                            alt="">
                                    </figure>
                                    <figure>
                                        <img src="{{ asset('assets\talentconnet\hireTalent\our-client\disney.svg') }}"
                                            alt="">
                                    </figure>
                                    <figure>
                                        <img src="{{ asset('assets\talentconnet\hireTalent\our-client\national-geography.svg') }}"
                                            alt="">
                                    </figure>
                                    <figure>
                                        <img src="{{ asset('assets\talentconnet\hireTalent\our-client\oracle.svg') }}"
                                            alt="">
                                    </figure>
                                    <figure>
                                        <img src="{{ asset('assets\talentconnet\hireTalent\our-client\rc.svg') }}"
                                            alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="border-box">
                                <div class="border-box-head">
                                    <h4>Static - Frequently Asked Questions</h4>
                                </div>
                                <div class="border-box-body">
                                    <div class="border-box-body-wrap simple-border-box-body">
                                        <figure class="ratio-image">
                                            <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/faq-img.jpg') }}"
                                                alt="">
                                        </figure>
                                        <div class="detail">
                                            <p>Get answers to all your queries from our FAQs curated just for you.</p>
                                            <div class="blox-link">
                                                <a href="" target="_BLANK">
                                                    Learn More
                                                    <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="border-box">
                                <div class="border-box-head">
                                    <h4>Static - Frequently Asked Questions</h4>
                                </div>
                                <div class="border-box-body">
                                    <div class="border-box-body-wrap simple-border-box-body">
                                        <figure class="ratio-image">
                                            <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/talent-thumb.jpg') }}"
                                                alt="">
                                        </figure>
                                        <div class="detail">
                                            <h4>Meet Shah</h4>
                                            <p>Sr. WordPress Developer | HumanLink</p>
                                            <div class="blox-link">
                                                <a href="" target="_BLANK">
                                                    Learn More
                                                    <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                                        alt="">
                                                </a>
                                                <span class="date">Dec 6, 2019</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>Static - UTS Top Related Blogs</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="simple-list align-items-center">
                                <figure class="ratio-image">
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/blog/blog01.jpg') }}"
                                        alt="">
                                </figure>
                                <div class="detail">
                                    <h5>
                                        <a href="javascript:void(0)" target="_blank" rel="noopener noreferrer">Top
                                            Event-Based WordPress themes for 2021</a>
                                    </h5>
                                    <div class="time">1/17/2021 3:29:42 PM</div>
                                </div>
                            </div>
                            <div class="simple-list align-items-center">
                                <figure class="ratio-image">
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/blog/blog03.jpg') }}"
                                        alt="">
                                </figure>
                                <div class="detail">
                                    <h5>
                                        <a href="javascript:void(0)" target="_blank" rel="noopener noreferrer">Why
                                            Vetting Talent is Important and How We Do It</a>
                                    </h5>
                                    <div class="time">12/12/2020 12:00:00 AM</div>
                                </div>
                            </div>
                            <div class="simple-list align-items-center">
                                <figure class="ratio-image">
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/blog/blog02.jpg') }}"
                                        alt="">
                                </figure>
                                <div class="detail">
                                    <h5>
                                        <a href="javascript:void(0)" target="_blank" rel="noopener noreferrer">7
                                            Important Hiring Trends To Watch Out For in 2021</a>
                                    </h5>
                                    <div class="time">2/1/2020 12:00:00 AM</div>
                                </div>
                            </div>
                            {{-- view all Link --}}
                            <div class="view-all">
                                <a href="{{ url('/blogs') }}" rel="noopener noreferrer">
                                    view All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>Static - UTS Top Related Blogs</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="simple-list align-items-center">
                                <figure class="ratio-image">
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/blog/blog01.jpg') }}"
                                        alt="">
                                </figure>
                                <div class="detail">
                                    <h5>
                                        <p>Get befitting talent for your requirement, shortlisted for you from our
                                            curated pool of India’s best WordPress Developers.</p>
                                    </h5>
                                    <div class="blox-link">
                                        <a href="{{ url('/HireTalent/open-position') }}">
                                            View More <img
                                                src="{{ asset('/assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>Static - Company Updates</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="simple-list">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/pin-white-icon.png') }}"
                                        alt="">
                                </div>
                                <div class="detail">
                                    <p>We have deployed 50+ WordPress Developers through HumanLink Talent connect with
                                        clientele like Ogilvy, Amazon, Disney, etc</p>
                                    <div class="time">3/1/2021 3:20:20 PM</div>
                                </div>
                            </div>
                            <div class="simple-list">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/pin-white-icon.png') }}"
                                        alt="">
                                </div>
                                <div class="detail">
                                    <p>Overall team size of developer is 400+ and WordPress developer is 100+</p>
                                    <div class="time">3/1/2021 3:20:20 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-box">
                        <div class="border-box-head">
                            <h4>Static - Company Updates</h4>
                        </div>
                        <div class="border-box-body">
                            <div class="testimonials-slider">
                                <div class="item">
                                    <figure>
                                        <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/quote-iconHome.png') }}"
                                            alt="">
                                    </figure>
                                    <div class="desk">
                                        <p>
                                            We have an incredible experience working with HumanLink. The team working for
                                            us on our website development project have been very responsive to our
                                            constant loop of feedback and excessive queries and are superbly proactive.
                                        </p>
                                        <div class="name">Riddhi Shriyan</div>
                                        <div class="designation">Digital & Communications Producer, Divergent
                                            Consulting</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <figure>
                                        <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/quote-iconHome.png') }}"
                                            alt="">
                                    </figure>
                                    <div class="desk">
                                        <p>
                                            Digital agencies need to hand off the implementation of services to remain
                                            competitive. HumanLink has the reliable implementation team you can trust and
                                            afford... and their work is winning awards: what more could you ask for?
                                        </p>
                                        <div class="name">Emma Lynch</div>
                                        <div class="designation">Founder & Managing Director, BBD Boom</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

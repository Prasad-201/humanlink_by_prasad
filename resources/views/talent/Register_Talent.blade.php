@include('talent_temp.header')

<main>
    <div class="container-fluid">
        <section class="section sign-up-page min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="signup-left-side-image">
                            <img src="{{ asset('/assets/talentconnet/login-bg.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 registration-form">
                        <div class="card card-box-shadow candidate-register-card card-border sign-up-card mb-3">
                            <div class="pt-4 pb-2 sign-up-ciard-header">
                                <h4 class="card-title sign-up-card-first-title registration-first-title">
                                    Register and become one of the Uplers Certified Talents....
                                </h4>
                            </div>
                            <form class="row g-3" method="POST" action="{{ url('/Talent/store_basic_info') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        @if ($errors->has('full_name'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('full_name') }}
                                            </small>
                                        @endif
                                        <input type="text" name="full_name" class="form-control"
                                            placeholder="Full Name *" value="{{ old('full_name') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        @if ($errors->has('email_address'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('email_address') }}
                                            </small>
                                        @endif
                                        <input type="email" name="email_address" class="form-control"
                                            placeholder="Email Address" value="{{ old('email_address') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        @if ($errors->has('mobile_number'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('mobile_number') }}
                                            </small>
                                        @endif
                                        <input type="number" name="mobile_number" class="form-control"
                                            placeholder="Mobile Number" valu1e="{{ old('mobile_number') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        @if ($errors->has('password'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('password') }}
                                            </small>
                                        @endif
                                        <div class="input-group password-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" val1ue="{{ old('password') }}">
                                            <span class="input-group-text eye-button cursor-pointer">
                                                <i class="bi bi-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="otp_number" value="{{ $otp_number }}">
                                    <button class="btn sign-up-btn w-100" type="submit">Create Account</button>
                                </div>
                            </form>
                            <div class="divider">
                                <div class="hr-divide"></div>
                                <p class="para-divide">Or</p>
                                <div class="hr-divide"></div>
                            </div>
                            <p class="card-text sign-up-card-text text-center">
                                I have an account? <a class="login-link" href="{{ url('/') }}">Login</a>
                            </p>

                            <div class="uplersAddress text-center">
                                <div class="policy">
                                    <a href="javascript:void(0)">Privacy Policy</a>
                                    <span style="margin: 0px 8px;">|</span>
                                    <a href="javascript:void(0)">ISMS Policy</a>
                                </div>
                                <div>© 2022 Uplers Solutions Private Limited. All rights reserved.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->


@include('talent_temp.footer')
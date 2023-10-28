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
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-box-shadow card-border sign-up-card mb-3">
                            <div class="pt-4 pb-2 sign-up-card-header">
                                <h3 class="card-title sign-up-card-title" style="text-align: left;">OTP Verification for
                                    Uplers Talent Solutions</h3>
                                <p class="card-text sign-up-card-text" style="text-align: left; font-size: 16px;">
                                    We have sent you an email on
                                    <strong>{{ Session()->get(HLINKMAILID) }}</strong>
                                    containing the OTP. Kindly verify it to proceed further.
                                </p>
                            </div>
                            <form class="row g-3" method="POST" action="{{ url('/Talent/check-otp') }}">
                                @csrf
                                <div class="col-12">
                                    @if ($errors->has('otp_number'))
                                        <small class="text-danger form-text">
                                            {{ $errors->first('otp_number') }}
                                        </small>
                                    @endif
                                    <div class="input-group">
                                        <input type="number" name="otp_number" class="form-control"
                                            placeholder="OTP *">
                                        <input type="hidden" name="hidden_otp_number"
                                            value="{{ Session()->get('jobEntryTalent.otp_number') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6 text-center">
                                            <button type="button" class="btn btn-link">Re-send</button>
                                        </div>
                                        <div class="col-lg-6 text-center">
                                            <button type="submit" class="btn btn-link">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->

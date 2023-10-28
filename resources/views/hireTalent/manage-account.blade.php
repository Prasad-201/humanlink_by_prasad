@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection manage-account-page">
            <div class="heading mb-0">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Your Personal Information & Preferences</h2>
                        <p>Below are some of your personal details and work preferences available in our system.</p>
                    </div>
                </div>
            </div>
            <div class="contain-section" style="padding: 0">
                <form action="{{ url('/HireTalent/manage-account') }}" method="post" enctype="multipart/form-data"
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="common-form">
                        <div class="personal-details-section">
                            <div class="contain-section-head">
                                <h2>Personal & Professional Information</h2>
                            </div>
                            <div class="boxStyle-one">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        @php
                                            $full_name = explode(' ', $hireTalentInfo->full_name);
                                        @endphp
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                First Name <span class="text-danger">*</span>
                                                @if ($errors->has('first_name'))
                                                    <small class="form-text text-danger">
                                                        {{ $errors->first('first_name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" class="form-control disabled-input"
                                                    placeholder="First Name" name="first_name"
                                                    value="{{ $full_name[0] }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Last Name <span class="text-danger">*</span>
                                                @if ($errors->has('last_name'))
                                                    <small class="form-text text-danger">
                                                        {{ $errors->first('last_name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" class="form-control disabled-input"
                                                    placeholder="last Name" name="last_name"
                                                    value="{{ end($full_name) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Email Address
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" class="form-control" placeholder="Email Address"
                                                    name="email_address" value="{{ $hireTalentInfo->email_address }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Designation
                                                @if ($errors->has('designation'))
                                                    <small class="form-text text-danger">
                                                        {{ $errors->first('designation') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" class="form-control disabled-input"
                                                    placeholder="Designation" name="designation"
                                                    value="{{ $hireTalentInfo->designation }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Years Of Experience
                                                @if ($errors->has('year_experience'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('year_experience') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="number" min="1" class="form-control"
                                                    value="{{ $hireTalentInfo->experience }}" name="year_experience"
                                                    placeholder="Years Of Experience"
                                                    oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Profile Image
                                                @if ($errors->has('profile_image'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('profile_image') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="file-wrap">
                                                <label for="profile_image">Set New Profile Image</label>
                                                <input type="file" id="profile_image" name="profile_image"
                                                    accept="image/*" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="company-details-section">
                            <div class="contain-section-head">
                                <h2>Company Details</h2>
                            </div>
                            <div class="boxStyle-one">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title ">
                                                Company Name <span class="text-danger">*</span>
                                                @if ($errors->has('company_name'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('company_name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" name="company_name" class="form-control"
                                                    placeholder="Company Name"
                                                    value="{{ $hireTalentInfo->company_name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Domain Name
                                                @if ($errors->has('domain_name'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('domain_name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <select name="domain_name" class="form-control">
                                                    <option value="" disabled selected>Select Domain</option>
                                                    <option
                                                        @if ($hireTalentInfo->domain_name == 'Domain') {{ 'selected' }} @endif
                                                        value="Domain">Domain</option>
                                                    <option
                                                        @if ($hireTalentInfo->domain_name == 'AI') {{ 'selected' }} @endif
                                                        value="AI">AI</option>
                                                    <option
                                                        @if ($hireTalentInfo->domain_name == 'Digital Agency') {{ 'selected' }} @endif
                                                        value="Digital Agency">Digital Agency</option>
                                                    <option
                                                        @if ($hireTalentInfo->domain_name == 'Ecommerce') {{ 'selected' }} @endif
                                                        value="Ecommerce">Ecommerce</option>
                                                    <option
                                                        @if ($hireTalentInfo->domain_name == 'FMCG') {{ 'selected' }} @endif
                                                        value="FMCG">FMCG</option>
                                                    <option
                                                        @if ($hireTalentInfo->domain_name == 'Real Estate') {{ 'selected' }} @endif
                                                        value="Real Estate">Real Estate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Contact Number <span class="text-danger">*</span>
                                                @if ($errors->has('contact_number'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('contact_number') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="number" min="1" class="form-control"
                                                    value="{{ $hireTalentInfo->mobile_number }}"
                                                    placeholder="Contact Number" name="contact_number"
                                                    oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Company Size <span class="text-danger">*</span>
                                                @if ($errors->has('company_size'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('company_size') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="number" min="1" class="form-control"
                                                    placeholder="Company Size" name="company_size"
                                                    value="{{ $hireTalentInfo->company_size }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="input-wrap">
                                            <label class="input-title ">
                                                City
                                                @if ($errors->has('city_name'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('city_name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" name="city_name" class="form-control"
                                                    placeholder="City" value="{{ $hireTalentInfo->city_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                State
                                                @if ($errors->has('state_name'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('state_name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" name="state_name" class="form-control"
                                                    placeholder="State" value="{{ $hireTalentInfo->state_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="input-wrap">
                                            <label class="input-title ">
                                                Zip
                                                @if ($errors->has('zip_code'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('zip_code') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="number" min="1" class="form-control"
                                                    name="zip_code" value="{{ $hireTalentInfo->zip_code }}"
                                                    placeholder="Zip Code"
                                                    oninput="javascript: if (this.value.length > 6) this.value = this.value.slice(0, 6);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Country Name
                                                @if ($errors->has('country_name'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('country_name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" name="country_name" class="form-control"
                                                    placeholder="Country" value="{{ $hireTalentInfo->country_name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Address <span class="text-danger">*</span>
                                                @if ($errors->has('address'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('address') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" class="form-control" placeholder="Address"
                                                    name="address" value="{{ $hireTalentInfo->address }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-details-section">
                            <div class="contain-section-head">
                                <h2>Social Profiles</h2>
                            </div>
                            <div class="boxStyle-one">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title ">
                                                Linked In <span class="text-danger">*</span>
                                                @if ($errors->has('linked_in'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('linked_in') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" name="linked_in" class="form-control" value="{{ $hireTalentInfo->linkedIn_profile }}"
                                                    placeholder="Linked In Link" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Skype
                                                @if ($errors->has('skype'))
                                                    <small class="text-danger form-text">
                                                        {{ $errors->first('skype') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <input type="text" name="skype" class="form-control" value="{{ $hireTalentInfo->skype_profile }}"
                                                    placeholder="Skype">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="submit-btn">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

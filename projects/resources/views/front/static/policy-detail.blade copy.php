@extends('front.layouts.master')
@section('title', $data->meta_title)
@section('keywords', $data->meta_keywords)
@section('description', $data->meta_description)
@section('logo', $data->image)
@section('header-section')
    {!! $data->header_section !!}
@stop
<?php
error_reporting(0);
?>
@section('footer-section')
    {!! $data->footer_section !!}
@stop
@section('container')
    @php
        $name = $insurance->name;
        $bannerImage = asset('front/images/inner-banner.png');
        if ($insurance->bannerImage) {
            $bannerImage = asset($insurance->bannerImage);
        }
    @endphp

    <!--========================inner banner section start =======================================-->

    @include('front.layouts.banner')

    <!--========================inner banner section end =======================================-->


    <!-- ═══════════════════════════════════════
                     SECTION 1 – HERO QUOTE
                ═══════════════════════════════════════ -->
    <section class="hero-quote">
        <div class="container" style="position:relative;z-index:1;">
            <div class="row">

                <!-- LEFT -->
                <div class="col-lg-6 mt-0">
                    <div class="hero-left sr">
                        <div class="img--div">
                            <img src="{{ asset('front/images/Bposo.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <!-- RIGHT – FORM -->
                <div class="col-lg-6">
                    <div class="quote-card sr">
                        <div class="qc-header">
                            <div class="qc-header-tag"><i class="fas fa-bolt me-1"></i> Get Instant Quote</div>
                            <h3>{{$insurance->name}}</h3>
                            <div class="qc-header-sub">Fill in your details to view the best available plans</div>
                        </div>
                        <form id="getPolicyFromId" action="{{ route('contactPost') }}" method="post">
                            @csrf
                            <input type="hidden" name="service" value="{{ $insurance->id }}">
                            <div class="qc-body">
                                <!-- Name + Mobile -->
                                <div class="form-row-2">
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-user"></i> Full Name <em>*</em>
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="text" placeholder="Rahul Sharma" name="name"
                                                required>
                                            <i class="fas fa-user input-icon"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-mobile-screen"></i> Mobile <em>*</em>
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="tel" placeholder="+91 9999999999" name="mobile"
                                                required>
                                            <i class="fas fa-mobile-screen input-icon"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email + City -->
                                <div class="form-row-2">
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-envelope"></i> Email Address (optional)
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="email" name="email" placeholder="rahul@email.com">
                                            <i class="fas fa-envelope input-icon"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-location-dot"></i> City
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="text" name="city" placeholder="New Delhi">
                                            <i class="fas fa-location-dot input-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="form-group">
                                    <div class="form-label-pl">
                                        <i class="fa-regular fa-message"></i> Message
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input has-icon" type="text" placeholder="Hello.." name="message">
                                        <i class="fa-regular fa-message input-icon"></i>
                                    </div>
                                </div>


                                <!-- Checkbox -->
                                {{-- <label class="check-wrap">
                                    <input type="checkbox" checked>
                                    <span class="check-label">
                                        I accept to receive notifications on <strong>SMS, emails, and WhatsApp</strong>
                                        about my
                                        insurance plans and policy updates.
                                    </span>
                                </label> --}}

                                <!-- Submit -->
                                <button class="btn-submit">
                                    Submit
                                    <i class="fas fa-arrow-right fa-sm"></i>
                                </button>

                                <div class="qc-footer">
                                    <i class="fas fa-lock"></i>
                                    Your data is safe &amp; encrypted · No spam, ever
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @php
        $Keyfeature = App\Models\KeyFeature::where('publish', 'published')->orderBy('ordering')->get();
    @endphp
    @if ($Keyfeature->count() > 0)
        <!-- ═══ BENEFITS ═══ -->
        <section class="benefits" id="benefits">
            <div class="container">
                <div class="text-center mb-5 sr">
                  {!!$data->mediumDescription!!}
                </div>
                <div class="row g-4">
                    @foreach ($Keyfeature as $f)
                        <div class="col-sm-6 col-lg-3 sr sr-d1">
                            <div class="benefit-card bc1">
                                <i class="{{ $f->icon_class }}"></i>
                                <h5>{{ $f->title }}</h5>
                                <p>{{ $f->descreption }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    <!-- ═══════════════════════════════════════
                     SECTION 3 – POLICY DESCRIPTION
                ═══════════════════════════════════════ -->
    <section class="policy-desc-section">
        <div class="container">

            <div class="text-center mb-5 sr">
                <div class="eyebrow"><span class="dot"></span> Policy Overview</div>
                <h2 class="sec-h mb-3">Understanding <em>{{$insurance->name}}</em></h2>
                {!! $insurance->shortDescription !!}
            </div>
        </div>
    </section>


    <!-- Scripts -->
    <script> 
        /* Car plate input formatting */
        let plateInput = document.querySelector('.car-input');
        if (plateInput) {
            plateInput.addEventListener('input', function() {
                this.value = this.value.toUpperCase().replace(/[^A-Z0-9\s]/g, '');
            });
        }
    </script>

@stop

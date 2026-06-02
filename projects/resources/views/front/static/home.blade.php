@extends('front.layouts.master')
@section('title', $data->meta_title)
@section('keywords', $data->meta_keywords)
@section('description', $data->meta_description)
@section('logo', $data->image)
@section('header-section')
    {!! $data->header_section !!}

@stop
@section('footer-section')
    {!! $data->footer_section !!}
@stop
@section('css')

@stop
@section('container')
    @php $name=$data->name; @endphp


    @include('front.layouts.slider')

    <!-- ═══ Services ═══ -->
    @if ($insuranceData->count() > 0)
        <section class="categories" id="categories">
            <div class="container">
                <div class="text-center mb-5 sr">
                    {!! $data->shortDescription !!}
                </div>

                <div class="cat-grid">

                    @foreach ($insuranceData as $s)
                        <div class="cat-card sr sr-d1">
                            <div class="cat-icon-bg"><i class="{{ $s->icon_class }}"></i></div>
                            <div class="cat-name">{{ $s->name }}</div>
                            <div class="cat-desc">{{ $s->description }}</div>
                            <a href="{{ url($s->seo_url) }}" class="cat-link">View Plans <div class="cat-link-icon"><i
                                        class="fas fa-arrow-right"></i></div></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div class="divider"></div>
    @php
        $whychooseus = App\Models\WhyChooseUs::where('publish', 'published')->orderBy('ordering')->get();
    @endphp
    @if ($whychooseus->count() > 0)
        <!-- ═══ WHY CHOOSE US ═══ -->
        <section class="why" id="why">
            <div class="container">
                <div class="row align-items-center mb-5 sr">
                  {!! $data->mediumDescription !!}
                </div>
                <div class="row g-4">
                    @foreach ($whychooseus as $wc)
                        <div class="col-sm-6 col-lg-3 sr sr-d1">
                            <div class="why-card">
                                <div class="why-icon wi-w{{ $wc->ordering }}"><i class="fas fa-chart-bar"></i></div>
                                <h5>{{ $wc->title }}</h5>
                                <p>{{ $wc->descreption }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @php
        $workingProcess = App\Models\WelcomePackage::where('publish', 'published')->orderBy('ordering')->get();
    @endphp
    @if ($workingProcess->count() > 0)
        <!-- ═══ HOW IT WORKS ═══ -->
        <section class="hiw" id="how">
            <div class="container">
                <div class="text-center mb-5 sr">
                    {!!$data->longDescription!!}
                </div>
                <div class="hiw-steps sr">
                    <div class="hiw-conn"></div>

                    @foreach ($workingProcess as $k => $w)
                        <div class="hiw-step">
                            <div class="hiw-num hn{{ $w->ordering }}"><i class="{{ $w->seo_url }}"></i>
                                <div class="step-badge">{{ $w->ordering }}</div>
                            </div>
                            <h6>{{ $w->name }}</h6>
                            <p>{{ $w->longDescription }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <div class="divider"></div>
    @php
        $Keyfeature = App\Models\KeyFeature::where('publish', 'published')->orderBy('ordering')->get();
    @endphp
    @if ($Keyfeature->count() > 0)
        <!-- ═══ BENEFITS ═══ -->
        <section class="benefits" id="benefits">
            <div class="container">
                <div class="text-center mb-5 sr">
                  {!!$data->longDescriptiontwo!!}
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



    <!-- ═══ STATS ═══ -->
    <section class="stats" id="trust">
        <div class="container" style="position:relative;z-index:1">
            <div class="text-center mb-3 sr">
                <div class="section-eyebrow"
                    style="background:rgba(255,255,255,.07);color:rgba(255,255,255,.6);border-color:rgba(255,255,255,.1)">
                    <span class="dot" style="background:rgba(255,255,255,.4)"></span> Our Numbers
                </div>
                <h2 class="section-h" style="color:var(--white)">Trusted Across <em style="color:#93c5fd">India</em>
                </h2>
            </div>
            <div class="row g-0 sr">
                <div class="col-6 col-md-3">
                    <div class="stat-block">
                        <div class="stat-num">{{ $setting_data['project completed'] }}<span>+</span></div>
                        <div class="stat-lbl">Happy Customers</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-block">
                        <div class="stat-num">{{ $setting_data['Working hours'] }}<span>+</span></div>
                        <div class="stat-lbl">Insurance Companies</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-block">
                        <div class="stat-num">{{ $setting_data['Experienced Staff'] }}<span>%</span></div>
                        <div class="stat-lbl">Claim Settlement Ratio</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-block">
                        <div class="stat-num">{{ $setting_data['Happy Clients'] }}<span>/7</span></div>
                        <div class="stat-lbl">Customer Support</div>
                    </div>
                </div>
            </div>

            @php
                $ourPartners = App\Models\OurClient::where('publish', 'published')->orderBy('id', 'desc')->get();
            @endphp
            @if ($ourPartners->count() > 0)


                <div class="partners-section sr">
                    <div class="partners-lbl">Our Insurance Partners</div>
                    <div class="slider--">
                        <div class="slide-track">
                            @foreach ($ourPartners as $p)
                                <div class="client">
                                    <img src="{{ asset($p->image ?? '') }}" alt="{{ $p->title }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @php
        $blogs = App\Models\Blogs\Blog::where('publish', 'published')->limit(5)->get();
    @endphp
    @if ($blogs->count() > 0)

        <!-- ═══ BLOGS ═══ -->
        <section class="blogs">
            <div class="container">

                <div class="text-center mb-5 sr">
                    <div class="section-eyebrow"><span class="dot"></span> Policy Updates</div>
                    <h2 class="section-h mb-3">Our Latest <em>Blogs</em></h2>
                </div>

                <div class="swiper blogSwiper">

                    <div class="swiper-wrapper">

                        <!-- BLOG ITEM -->
                        @foreach ($blogs as $b)
                            <div class="swiper-slide">
                                <div class="blog-box">
                                    <article class="blog-item blog-item-box">

                                        <div class="blog-item-img">
                                            <img class="blog-img"
                                                src="{{ asset($b->featureImage ?? 'https://voteyour.com/uploads/blogs/681b330890f8c.png') }}">
                                        </div>

                                        <div class="blog-item-content">
                                            <h5 class="blog-item-title">
                                                <a
                                                    href="{{ url('blog/' . $b->seo_url) }}">{{ $b->title ?? 'Marketing Insurance' }}</a>
                                            </h5>

                                            <p>{{ $b->shortDescription ?? 'What is captive insurance? How can it benefit the industry?' }}
                                            </p>

                                            <div class="blog-item-details">
                                                <span class="blog-item-date">
                                                    <i class="fas fa-calendar-week"></i>
                                                    {{ \Carbon\Carbon::today()->format('Y-m-d') }}
                                                </span>
                                            </div>

                                        </div>

                                    </article>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <!-- Navigation Buttons (Correct Position) -->
                    <div class="swiper-button-prev blog-prev"></div>
                    <div class="swiper-button-next blog-next"></div>

                </div>

            </div>
        </section>

    @endif

    @php
        $testimonials = App\Models\Testimonial::where('publish', 'published')->get();
    @endphp
    @if ($testimonials->count() > 0)

        <!-- ═══ TESTIMONIALS ═══ -->
        <section class="testimonials">
            <div class="container">

                <div class="text-center mb-5 sr">
                    <div class="section-eyebrow"><span class="dot"></span> Customer Stories</div>
                    <h2 class="section-h mb-3">What Our <em>Customers Say</em></h2>
                </div>

                <div class="swiper testimonialSwiper">

                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $t)
                            <!-- testimonial 1 -->
                            <div class="swiper-slide">
                                <div class="testi-card">
                                    <div class="testi-stars">
                                        @for ($i = 0; $i < $t->score; $i++)
                                            ★
                                        @endfor

                                    </div>

                                    <div class="testi-quote">
                                        "{{ $t->message }}"
                                    </div>

                                    <div class="testi-author">
                                        <div class="testi-av av1">
                                            {{ strtoupper(collect(explode(' ', $t->name))->map(fn($w) => $w[0])->implode('')) }}
                                        </div>
                                        <div>
                                            <div class="testi-name">{{ $t->name }}</div>
                                            <div class="testi-plan">{{ $t->profile }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                        <!-- Navigation Buttons (Correct Position) -->

                    </div>
                    <div class="swiper-button-prev blog-prev"></div>
                    <div class="swiper-button-next blog-next"></div>


                </div>

            </div>
        </section>
    @endif



    <!-- ═══════════════════════════════════════
                     SECTION 6 – FAQ
                ═══════════════════════════════════════ -->

                <section class="faq-section">
  <div class="container">

    {{-- Title --}}
    <div class="row mb-4 sr">
      <div class="col-12 text-center">
        <h2 class="section-h">Frequently Asked <em>Questions</em></h2>
      </div>
    </div>

    @if($policydata->count() > 0)

    {{-- Tab Buttons --}}
    <div class="faq-tab-wrapper">
      <div class="faq-tab-bar" id="faqTabBar">
        @foreach($policydata as $i => $p)
          <button
            class="faq-tab-btn {{ $i === 0 ? 'active' : '' }}"
            onclick="switchFaqTab(this, 'faq-panel-{{ $i }}')"
          >
            {{ $p->name }}
          </button>
        @endforeach
      </div>
    </div>

    {{-- FAQ Panels --}}
    <div class="faq-panels-wrap">
      @foreach($policydata as $i => $p)
        <div class="faq-panel {{ $i === 0 ? 'active' : '' }}" id="faq-panel-{{ $i }}">
          @foreach($p->faqs as $k => $f)
            <div class="faq-item {{ ($k === 0) ? 'open' : '' }}">
              <div class="faq-q" onclick="toggleFaq(this)">
                <span class="faq-q-text">{{ $f->question }}</span>
                <div class="faq-icon"><i class="fas fa-plus"></i></div>
              </div>
              <div class="faq-a">{!! $f->answer !!}</div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>

    @endif
  </div>
</section>




    <!-- ═══ CTA BANNER ═══ -->
    <section class="cta-banner">
        <div class="container" style="position:relative;z-index:1">
            <div class="sr">
                {!!$data->longDescriptionthree!!}
                <div class="cta-acts">
                    <a href="{{ $setting_data['whatsapp_url'] }}" target="_blank" class="btn-cta-main"><i class="fa-brands fa-whatsapp"
                            style="color:var(--green)"></i> WhatsApp Us</a>
                    <a href="tel:{{ $setting_data['mobile'] }}" class="btn-white-outline">Talk to an Advisor <i
                            class="fas fa-headset fa-sm"></i></a>
                </div>
            </div>
        </div>
    </section>




    <script>
        /* FAQ toggle */
        function switchFaqTab(btn, panelId) {
            // tabs
            document.querySelectorAll('.faq-tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            // panels
            document.querySelectorAll('.faq-panel').forEach(p => p.classList.remove('active'));
            const panel = document.getElementById(panelId);
            panel.classList.add('active');
            }

            function toggleFaq(el) {
            const item = el.closest('.faq-item');
            const isOpen = item.classList.contains('open');
            // sibling items close
            item.closest('.faq-panel')
                .querySelectorAll('.faq-item')
                .forEach(i => i.classList.remove('open'));
            if (!isOpen) item.classList.add('open');
            }

        // function toggleFaq(el) {
        //     const item = el.closest('.faq-item');
        //     const isOpen = item.classList.contains('open');
        //     document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
        //     if (!isOpen) item.classList.add('open');
        // }

        // owlCarousel start
        document.addEventListener("DOMContentLoaded", function() {

            // TESTIMONIAL SLIDER
            var testimonialSwiper = new Swiper(".testimonialSwiper", {

                loop: true,

                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },


                navigation: {
                    nextEl: ".blog-next",
                    prevEl: ".blog-prev"
                },
                spaceBetween: 30,

                breakpoints: {

                    0: {
                        slidesPerView: 1
                    },

                    768: {
                        slidesPerView: 2
                    },

                    992: {
                        slidesPerView: 3
                    }

                }

            });


            // BLOG SLIDER
            var blogSwiper = new Swiper(".blogSwiper", {

                loop: true,

                spaceBetween: 25,

                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },

                navigation: {
                    nextEl: ".blog-next",
                    prevEl: ".blog-prev"
                },

                breakpoints: {

                    0: {
                        slidesPerView: 1
                    },

                    768: {
                        slidesPerView: 2
                    },

                    992: {
                        slidesPerView: 3
                    }

                }

            });

        });
        // owlCarousel end
    </script>


@stop
@section('js')

@stop

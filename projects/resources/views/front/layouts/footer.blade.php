<!-- Modal -->
<div class="modal fade" id="getQuoteModel" tabindex="-1" aria-labelledby="getQuoteModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="section-h">Get in <em> Touch</em></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="getInTauchFormId" action="{{ route('contactPost') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="quote-card-u sr">
                        <div class="p-2">
                        <div class="form-row-2">
                            <!-- Select Policy -->
                            <div class="form-group">
                                <div class="form-label-pl">
                                    <i class="fas fa-shield-halved"></i> Select Policy <em>*</em>
                                </div>
                                <select class="city-select" name="service" required>
                                    <option value="">Select Policy</option>
                                    @foreach ($insuranceData as $inc)
                                        <option value="{{ $inc->id }}">{{ $inc->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Name -->
                            <div class="form-group">
                                <div class="form-label-pl">
                                    <i class="fas fa-user"></i> Full Name <em>*</em>
                                </div>
                                <div class="input-wrap">
                                    <input class="form-input has-icon" name="name" type="text" placeholder="Rahul Sharma"
                                        required>
                                    <i class="fas fa-user input-icon"></i>
                                </div>
                            </div>
                            </div>

                            <!-- MObile + Email -->
                            <div class="form-row-2">
                                <div class="form-group">
                                    <div class="form-label-pl">
                                        <i class="fas fa-mobile-screen"></i> Mobile <em>*</em>
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input has-icon" name="mobile" type="tel" placeholder="+91 98765 43210"
                                            required>
                                        <i class="fas fa-mobile-screen input-icon"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-label-pl">
                                        <i class="fas fa-envelope"></i> Email Address (optional)
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input has-icon" name="email" type="email" placeholder="rahul@email.com">
                                        <i class="fas fa-envelope input-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="form-group">
                                <div class="form-label-pl">
                                    <i class="fa-regular fa-message"></i> Message
                                </div>
                                <div class="input-wrap">
                                    <input class="form-input has-icon" name="message" type="text" placeholder="Hello..">
                                    <i class="fa-regular fa-message input-icon"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <!-- Submit -->
                    <button class="btn-submit">
                        Submit
                        <i class="fas fa-arrow-right fa-sm"></i>
                    </button>

                    <div class="qc-footer text-center">
                        <i class="fas fa-lock"></i>
                        Your data is safe &amp; encrypted · No spam, ever
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>





<!-- ═══ FOOTER ═══ -->
<footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="foot-logo">
                <img src="{{ asset($setting_data['footer_logo'] ?? 'front/images/logo.png') }}" alt="Logo">
                </div>
                <p class="foot-desc">{{ $setting_data['about'] }}</p>
                <div class="foot-social">
                    @if(!empty($setting_data['facebook']))
                    <a href="{{$setting_data['facebook']}}" class="fsoc"><i class="fab fa-facebook-f"></i></a>
                    @endif
                      @if(!empty($setting_data['twitter']))
                    <a href="{{$setting_data['twitter']}}" class="fsoc"><i class="fab fa-twitter"></i></a>
                    @endif
                      @if(!empty($setting_data['instagram']))
                    <a href="{{$setting_data['instagram']}}" class="fsoc"><i class="fab fa-instagram"></i></a>
                    @endif
                      @if(!empty($setting_data['linkedin']))
                    <a href="{{$setting_data['linkedin']}}" class="fsoc"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                      @if(!empty($setting_data['youtube']))
                    <a href="{{$setting_data['youtube']}}" class="fsoc"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
                {{-- <div class="foot-irdai">
                    <i class="fas fa-certificate fi-icon"></i>
                    <div>
                        <div class="fi-title">IRDAI Registered Broker</div>
                        <div class="fi-reg">Reg. No. PB567 · Direct Broker (Life &amp; General)</div>
                    </div>
                </div> --}}
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="foot-col-h">Company</div>
                <ul class="foot-links">
                    <li><a href="{{ url('about-us') }}">About Us</a></li>
                    <li><a href="{{ url('blogs') }}">Blogs</a></li>
                    <li><a href="{{ url('become-a-posp') }}">Become A POSP</a></li>
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="foot-col-h">Insurance</div>
                <ul class="foot-links">
                    @foreach ($insuranceData as $in)
                        <li><a href="{{ url($in->seo_url) }}">{{ $in->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-6 col-lg-2">
                <div class="foot-col-h">Legal</div>
                <ul class="foot-links">
                    <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                    <li><a href="{{ url('disclaimer') }}">Disclaimer</a></li>
                </ul>
            </div>
        </div>
        <div class="foot-bottom">
            <div class="foot-copy">{{$setting_data['copyright']}}</div>
        </div>
    </div>
</footer>
<script>
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 50), {
        passive: true
    });
    document.getElementById('mobToggle').addEventListener('click', () => {
        const m = document.getElementById('mobileMenu');
        m.style.display = m.style.display === 'block' ? 'none' : 'block';
    });
    const srEls = document.querySelectorAll('.sr');
    const io = new IntersectionObserver(entries => entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('in');
            io.unobserve(e.target)
        }
    }), {
        threshold: .1
    });
    srEls.forEach(el => io.observe(el));
</script>



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
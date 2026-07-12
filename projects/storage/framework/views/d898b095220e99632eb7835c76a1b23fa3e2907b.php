<?php $__env->startSection('title', $data->meta_title); ?>
<?php $__env->startSection('keywords', $data->meta_keywords); ?>
<?php $__env->startSection('description', $data->meta_description); ?>
<?php $__env->startSection('logo', $data->image); ?>
<?php $__env->startSection('header-section'); ?>
    <?php echo $data->header_section; ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-section'); ?>
    <?php echo $data->footer_section; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <?php $name=$data->name; ?>


    <?php echo $__env->make('front.layouts.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- ═══ Services ═══ -->
    <?php if($insuranceData->count() > 0): ?>
        <section class="categories" id="categories">
            <div class="container">
                <div class="text-center mb-5 sr">
                    <?php echo $data->shortDescription; ?>

                </div>

                <div class="cat-grid">

                    <?php $__currentLoopData = $insuranceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cat-card sr sr-d1">
                            <div class="cat-icon-bg"><i class="<?php echo e($s->icon_class); ?>"></i></div>
                            <div class="cat-name"><?php echo e($s->name); ?></div>
                            <div class="cat-desc"><?php echo e($s->description); ?></div>
                            <a href="<?php echo e(url($s->seo_url)); ?>" class="cat-link">View Plans <div class="cat-link-icon"><i
                                        class="fas fa-arrow-right"></i></div></a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <div class="divider"></div>
    <?php
        $whychooseus = App\Models\WhyChooseUs::where('publish', 'published')->orderBy('ordering')->get();
    ?>
    <?php if($whychooseus->count() > 0): ?>
        <!-- ═══ WHY CHOOSE US ═══ -->
        <section class="why" id="why">
            <div class="container">
                <div class="row align-items-center mb-5 sr">
                  <?php echo $data->mediumDescription; ?>

                </div>
                <div class="row g-4">
                    <?php $__currentLoopData = $whychooseus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-lg-3 sr sr-d1">
                            <div class="why-card">
                                <div class="why-icon wi-w<?php echo e($wc->ordering); ?>"><i class="fas fa-chart-bar"></i></div>
                                <h5><?php echo e($wc->title); ?></h5>
                                <p><?php echo e($wc->descreption); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
        $workingProcess = App\Models\WelcomePackage::where('publish', 'published')->orderBy('ordering')->get();
    ?>
    <?php if($workingProcess->count() > 0): ?>
        <!-- ═══ HOW IT WORKS ═══ -->
        <section class="hiw" id="how">
            <div class="container">
                <div class="text-center mb-5 sr">
                    <?php echo $data->longDescription; ?>

                </div>
                <div class="hiw-steps sr">
                    <div class="hiw-conn"></div>

                    <?php $__currentLoopData = $workingProcess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="hiw-step">
                            <div class="hiw-num hn<?php echo e($w->ordering); ?>"><i class="<?php echo e($w->seo_url); ?>"></i>
                                <div class="step-badge"><?php echo e($w->ordering); ?></div>
                            </div>
                            <h6><?php echo e($w->name); ?></h6>
                            <p><?php echo e($w->longDescription); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <div class="divider"></div>
    <?php
        $Keyfeature = App\Models\KeyFeature::where('publish', 'published')->orderBy('ordering')->get();
    ?>
    <?php if($Keyfeature->count() > 0): ?>
        <!-- ═══ BENEFITS ═══ -->
        <section class="benefits" id="benefits">
            <div class="container">
                <div class="text-center mb-5 sr">
                  <?php echo $data->longDescriptiontwo; ?>

                </div>
                <div class="row g-4">
                    <?php $__currentLoopData = $Keyfeature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-lg-3 sr sr-d1">
                            <div class="benefit-card bc1">
                                <i class="<?php echo e($f->icon_class); ?>"></i>
                                <h5><?php echo e($f->title); ?></h5>
                                <p><?php echo e($f->descreption); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>



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
                        <div class="stat-num"><?php echo e($setting_data['project completed']); ?><span>+</span></div>
                        <div class="stat-lbl">Happy Customers</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-block">
                        <div class="stat-num"><?php echo e($setting_data['Working hours']); ?><span>+</span></div>
                        <div class="stat-lbl">Insurance Companies</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-block">
                        <div class="stat-num"><?php echo e($setting_data['Experienced Staff']); ?><span>%</span></div>
                        <div class="stat-lbl">Claim Settlement Ratio</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-block">
                        <div class="stat-num"><?php echo e($setting_data['Happy Clients']); ?><span>/7</span></div>
                        <div class="stat-lbl">Customer Support</div>
                    </div>
                </div>
            </div>

            <?php
                $ourPartners = App\Models\OurClient::where('publish', 'published')->orderBy('id', 'desc')->get();
            ?>
            <?php if($ourPartners->count() > 0): ?>


                <div class="partners-section sr">
                    <div class="partners-lbl">Our Insurance Partners</div>
                    <div class="slider--">
                        <div class="slide-track">
                            <?php $__currentLoopData = $ourPartners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="client">
                                    <img src="<?php echo e(asset($p->image ?? '')); ?>" alt="<?php echo e($p->title); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php
        $blogs = App\Models\Blogs\Blog::where('publish', 'published')->limit(5)->get();
    ?>
    <?php if($blogs->count() > 0): ?>

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
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="blog-box">
                                    <article class="blog-item blog-item-box">

                                        <div class="blog-item-img">
                                            <img class="blog-img"
                                                src="<?php echo e(asset($b->featureImage ?? 'https://voteyour.com/uploads/blogs/681b330890f8c.png')); ?>">
                                        </div>

                                        <div class="blog-item-content">
                                            <h5 class="blog-item-title">
                                                <a
                                                    href="<?php echo e(url('blog/' . $b->seo_url)); ?>"><?php echo e($b->title ?? 'Marketing Insurance'); ?></a>
                                            </h5>

                                            <p><?php echo e($b->shortDescription ?? 'What is captive insurance? How can it benefit the industry?'); ?>

                                            </p>

                                            <div class="blog-item-details">
                                                <span class="blog-item-date">
                                                    <i class="fas fa-calendar-week"></i>
                                                    <?php echo e(\Carbon\Carbon::today()->format('Y-m-d')); ?>

                                                </span>
                                            </div>

                                        </div>

                                    </article>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>

                    <!-- Navigation Buttons (Correct Position) -->
                    <div class="swiper-button-prev blog-prev"></div>
                    <div class="swiper-button-next blog-next"></div>

                </div>

            </div>
        </section>

    <?php endif; ?>

    <?php
        $testimonials = App\Models\Testimonial::where('publish', 'published')->get();
    ?>
    <?php if($testimonials->count() > 0): ?>

        <!-- ═══ TESTIMONIALS ═══ -->
        <section class="testimonials">
            <div class="container">

                <div class="text-center mb-5 sr">
                    <div class="section-eyebrow"><span class="dot"></span> Customer Stories</div>
                    <h2 class="section-h mb-3">What Our <em>Customers Say</em></h2>
                </div>

                <div class="swiper testimonialSwiper">

                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- testimonial 1 -->
                            <div class="swiper-slide">
                                <div class="testi-card">
                                    <div class="testi-stars">
                                        <?php for($i = 0; $i < $t->score; $i++): ?>
                                            ★
                                        <?php endfor; ?>

                                    </div>

                                    <div class="testi-quote">
                                        "<?php echo e($t->message); ?>"
                                    </div>

                                    <div class="testi-author">
                                        <div class="testi-av av1">
                                            <?php echo e(strtoupper(collect(explode(' ', $t->name))->map(fn($w) => $w[0])->implode(''))); ?>

                                        </div>
                                        <div>
                                            <div class="testi-name"><?php echo e($t->name); ?></div>
                                            <div class="testi-plan"><?php echo e($t->profile); ?></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- Navigation Buttons (Correct Position) -->

                    </div>
                    <div class="swiper-button-prev blog-prev"></div>
                    <div class="swiper-button-next blog-next"></div>


                </div>

            </div>
        </section>
    <?php endif; ?>



    <!-- ═══════════════════════════════════════
                     SECTION 6 – FAQ
                ═══════════════════════════════════════ -->

                <section class="faq-section">
  <div class="container">

    
    <div class="row mb-4 sr">
      <div class="col-12 text-center">
        <h2 class="section-h">Frequently Asked <em>Questions</em></h2>
      </div>
    </div>

    <?php if($policydata->count() > 0): ?>

    
    <div class="faq-tab-wrapper">
      <div class="faq-tab-bar" id="faqTabBar">
        <?php $__currentLoopData = $policydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button
            class="faq-tab-btn <?php echo e($i === 0 ? 'active' : ''); ?>"
            onclick="switchFaqTab(this, 'faq-panel-<?php echo e($i); ?>')"
          >
            <?php echo e($p->name); ?>

          </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    
    <div class="faq-panels-wrap">
      <?php $__currentLoopData = $policydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="faq-panel <?php echo e($i === 0 ? 'active' : ''); ?>" id="faq-panel-<?php echo e($i); ?>">
          <?php $__currentLoopData = $p->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="faq-item <?php echo e(($k === 0) ? 'open' : ''); ?>">
              <div class="faq-q" onclick="toggleFaq(this)">
                <span class="faq-q-text"><?php echo e($f->question); ?></span>
                <div class="faq-icon"><i class="fas fa-plus"></i></div>
              </div>
              <div class="faq-a"><?php echo $f->answer; ?></div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php endif; ?>
  </div>
</section>




    <!-- ═══ CTA BANNER ═══ -->
    <section class="cta-banner">
        <div class="container" style="position:relative;z-index:1">
            <div class="sr">
                <?php echo $data->longDescriptionthree; ?>

                <div class="cta-acts">
                    <a href="<?php echo e($setting_data['whatsapp_url']); ?>" target="_blank" class="btn-cta-main"><i class="fa-brands fa-whatsapp"
                            style="color:var(--green)"></i> WhatsApp Us</a>
                    <a href="tel:<?php echo e($setting_data['mobile']); ?>" class="btn-white-outline">Talk to an Advisor <i
                            class="fas fa-headset fa-sm"></i></a>
                </div>
            </div>
        </div>
    </section>



<!-- 
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
    </script> -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed-softwares\xampp-8.2.12\htdocs\laravel-projects\policykholo\projects\resources\views/front/static/home.blade.php ENDPATH**/ ?>
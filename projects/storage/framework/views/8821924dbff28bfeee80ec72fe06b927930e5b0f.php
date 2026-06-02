
<?php $__env->startSection('title', $data->meta_title); ?>
<?php $__env->startSection('keywords', $data->meta_keywords); ?>
<?php $__env->startSection('description', $data->meta_description); ?>
<?php $__env->startSection('logo', $data->image); ?>
<?php $__env->startSection('header-section'); ?>
    <?php echo $data->header_section; ?>

<?php $__env->stopSection(); ?>
<?php
error_reporting(0);
?>
<?php $__env->startSection('footer-section'); ?>
    <?php echo $data->footer_section; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <?php
        $name = $insurance->name;
        $bannerImage = asset('front/images/inner-banner.png');
        if ($insurance->bannerImage) {
            $bannerImage = asset($insurance->bannerImage);
        }
    ?>

    <!--========================inner banner section start =======================================-->

    <?php echo $__env->make('front.layouts.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                            <img src="<?php echo e(asset('front/images/Bposo.png')); ?>" alt="">
                        </div>
                    </div>
                </div>

                <!-- RIGHT – FORM -->
                <div class="col-lg-6">
                    <div class="quote-card sr">
                        <div class="qc-header">
                            <div class="qc-header-tag"><i class="fas fa-bolt me-1"></i> Get Instant Quote</div>
                            <h3><?php echo e($insurance->name); ?></h3>
                            <div class="qc-header-sub">Fill in your details to view the best available plans</div>
                        </div>
                        <form id="getPolicyFromId" action="<?php echo e(route('contactPost')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="service" value="<?php echo e($insurance->id); ?>">
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

    <?php
        $Keyfeature = App\Models\KeyFeature::where('publish', 'published')->orderBy('ordering')->get();
    ?>
    <?php if($Keyfeature->count() > 0): ?>
        <!-- ═══ BENEFITS ═══ -->
        <section class="benefits" id="benefits">
            <div class="container">
                <div class="text-center mb-5 sr">
                  <?php echo $data->mediumDescription; ?>

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


    <!-- ═══════════════════════════════════════
                     SECTION 3 – POLICY DESCRIPTION
                ═══════════════════════════════════════ -->
    <section class="policy-desc-section">
        <div class="container">

            <div class="text-center mb-5 sr">
                <div class="eyebrow"><span class="dot"></span> Policy Overview</div>
                <h2 class="sec-h mb-3">Understanding <em><?php echo e($insurance->name); ?></em></h2>
                <?php echo $insurance->shortDescription; ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/static/policy-detail.blade.php ENDPATH**/ ?>
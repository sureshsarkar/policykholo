
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
        $name = $data->name;
        $bannerImage = asset('front/images/inner-banner.png');
        if ($data->bannerImage) {
            $bannerImage = asset($data->bannerImage);
        }
    ?>

    <!--========================inner banner section start =======================================-->

    <?php echo $__env->make('front.layouts.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--========================inner banner section end =======================================-->

    <!--========================contact section start =======================================-->

    <section class="contact-page-wrapp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="img--div">
                        <img src="<?php echo e(asset('front/images/Bposo.png')); ?>" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12">
                    <div class="leave-comment posp-form-desc">
                        <?php echo $data->shortDescription; ?>

                        <form action="<?php echo e(route('contactPost')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <input type="text" name="name" class="form-control" id="nameId"
                                        placeholder="Name*" minlength="3" maxlength="25"
                                        onkeydown="return /[a-z ]/i.test(event.key)" onkeyup="useRefShow('nameId')"
                                        required>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <input type="text" name="email" id="emailId" class="form-control"
                                        placeholder="Email*" onkeyup="useRefShow('emailId')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <input type="text" name="mobile" id="mobileId" class="form-control"
                                        placeholder="Mobile*" minlength="10" maxlength="10"
                                        onkeypress="return digitKeyOnly(event)" onkeyup="useRefShow('mobileId')" required>
                                </div>
                                   <input type="hidden" name="service"  value="Become A Posp">
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-12">
                                    <textarea class="form-control" name="message" id="messageId" minlength="10" maxlength="150"
                                        placeholder="Write Your Comments*" onkeyup="useRefShow('messageId')" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-12">
                                    <button type="submit" id="submitBtnId" class="btn btn-post-com">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--========================contact section end =======================================-->

        <!-- ═══ WHY CHOOSE US ═══ -->
 

    <?php
        $whychooseus = App\Models\WhyChooseUs::where('publish', 'published')->orderBy('ordering')->get();
    ?>
    <?php if($whychooseus->count() > 0): ?>
        <!-- ═══ WHY CHOOSE US ═══ -->
        <section class="why" id="why">
            <div class="container">
                <div class="row align-items-center mb-5 sr">
                  <?php echo $data->shortDescription; ?>

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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/static/become-a-posp.blade.php ENDPATH**/ ?>
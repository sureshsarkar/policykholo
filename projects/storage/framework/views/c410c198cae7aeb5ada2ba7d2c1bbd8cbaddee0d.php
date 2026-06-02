
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
<?php $__env->startSection('container'); ?>

    <?php
        $name = $data->name;
        $bannerImage = asset('front/images/inner-banner.png');
        if ($data->bannerImage) {
            $bannerImage = asset($data->bannerImage);
        }
    ?>

    <?php echo $__env->make('front.layouts.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--========================About Us section start =======================================-->

    <section class="about-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="about-image">
                        <img src="<?php echo e(asset($data->image ?? 'front/images/abouts.png')); ?>"  alt="<?php echo e($data->name ?? 'About Us'); ?>" title="<?php echo e($data->name ?? ''); ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="home-abt-con">
                        <div class="abt-inner-con">
                            <?php echo $data->shortDescription ?? ''; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--========================About Us section end =======================================-->


    <!--========================step section end =======================================-->
    
    <!--========================step section end =======================================-->

    <section class="about-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-12">
                    <div class="home-abt-con">
                        <div class="abt-inner-con">
                            <?php echo $data->longDescription; ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="about-image">
                        <img src="<?php echo e(asset($data->image2 ?? 'front/images/vision.png')); ?>" alt="<?php echo e($data->name ?? 'About Us'); ?>" title="<?php echo e($data->name ?? ''); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/static/about.blade.php ENDPATH**/ ?>
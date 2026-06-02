
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
        $bannerImage = asset('front/images/banner.png');
        if ($data->bannerImage) {
            $bannerImage = asset($data->bannerImage);
        }
    ?>
    <!-- start banner sec -->


    <!--======================================login page sec start======================================-->

    <section class="login-page-wrapp"> 
            <div class="row">  
                <div class="col-lg-6 col-md-12 col-12 ps-0">
                    <div class="login-page-left">
                        <img src="<?php echo e(asset($data->image ?? 'front/images/login.jpg')); ?>">
                    </div>
                </div> 
                <div class="col-lg-6 col-md-12 col-12 pe-0">
                    <div class="login-form-right">
                        <div class="login-top-head">
                            <img src="<?php echo e(asset('front/images/logo.png')); ?>">
                            <h5><a href="<?php echo e(url('')); ?>"><i class="fas fa-chevron-circle-left"></i> Back to Home</a>
                            </h5>
                        </div>
                        <div class="login-form-inner">
                            <h3>Forgot <span>Password</span></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt. </p>
                            <form action="<?php echo e(route('user.forgot.password')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-sign-in">Get new password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div> 
    </section>

    <!--======================================login page sec end======================================-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/static/forgot-password.blade.php ENDPATH**/ ?>
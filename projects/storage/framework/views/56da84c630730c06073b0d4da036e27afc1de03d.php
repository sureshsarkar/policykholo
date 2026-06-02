
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
        $name = $data->name??$data->title??"";
        $bannerImage = asset('front/images/banner.png');
        if ($data->bannerImage) {
            $bannerImage = asset($data->bannerImage);
        }
    ?>
    <!-- start banner sec -->

    <?php echo $__env->make('front.layouts.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--========================Blog section start =======================================-->
    
    <?php if(count($blogs) > 0): ?>
        <section class="blog-wrapper">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="blog-box">
                                <article class="blog-item blog-item-box">
                                    <div class="blog-item-img">
                                        <img class="blog-img" src="<?php echo e(asset($c->featureImage ?? 'front/images/g1.png')); ?>"
                                            alt="<?php echo e($c->title ?? ''); ?>">
                                        <ul class="blog-item-badge">
                                            <li><a
                                                    href="<?php echo e(url($c->blogCategory->seo_url ?? '')); ?>"><?php echo e($c->blogCategory->title ?? ''); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="blog-item-content">
                                        <h5 class="blog-item-title"><a
                                                href="<?php echo e(url('blog/' . $c->seo_url ?? '')); ?>"><?php echo e($c->title ?? ''); ?></a></h5>
                                        <p><?php echo e($c->shortDescription ?? ''); ?></p>

                                        <div class="blog-item-details">
                                            <span class="blog-item-date"><i
                                                    class="fas fa-calendar-week"></i><?php echo e(Carbon\Carbon::parse($c->created_at)->format("d M' y")); ?></span>
                                        </div>
                                </article>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        </section>
    <?php endif; ?>
    <!--========================Blog section end =======================================-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/static/blogs.blade.php ENDPATH**/ ?>
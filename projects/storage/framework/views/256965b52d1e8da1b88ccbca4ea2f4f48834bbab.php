
<?php $__env->startSection("title","404 - Page not found"); ?>
<?php $__env->startSection("keywords","404 - Page not found"); ?>
<?php $__env->startSection("description","404 - Page not found"); ?>
<?php $__env->startSection("container"); ?>

    <?php
        $gaurav_error_404=true;
        $name='404 - Page Not Found';
      
    
        $bannerImage=asset('front/images/banner.png');
       
    ?>
   
<section class="error-page">
     <div class="container">
       <div class="error-page">
        <div class="error-page-inner">
            <h1>4<i class="theme-clr">0</i>4</h1>
            <span>error! page not found</span>
            <p>It seems we can't find what you're looking for. Perhaps searching can help or go </p>
            <div class="error-button">
                 <a href="<?php echo e(url('/')); ?>"> <i class="fa fa-home"></i> Go Back To Hompage</a>
            </div>
        </div>
    </div>
     </div>
</section>
   


<?php $__env->stopSection(); ?>
<?php echo $__env->make("front.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/errors/404.blade.php ENDPATH**/ ?>
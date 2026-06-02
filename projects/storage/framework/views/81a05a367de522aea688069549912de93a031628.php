<!--
<section class="inner-banner">
    <img src="<?php echo e(asset($bannerImage)); ?>" alt="<?php echo e($name); ?>" title="<?php echo e($name); ?>">
    <div class="inner-page-banner">
        <div class="inner-banner-content">
            <h2><?php echo e(strtoupper($name)); ?></h2>

        </div>
    </div>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>"><i class="fas fa-home"></i> Home</a></li>
        <li><?php echo e(strtoupper($name)); ?></li>
    </ul>
</section>

 -->



<!--========================inner banner section start =======================================-->

<section class="inner-banner-wrapper">
    <div class="inner-banner-img">
        <img src="<?php echo e(asset($bannerImage ?? 'front/images/inner-banner.png')); ?>" alt="<?php echo e($name); ?>"
            title="<?php echo e($name); ?>">
        <div class="inner-banner-main">
            <div class="container">
                <div class=" inner-banner-con">
                    <div class="inner-banner-con-inn">
                        <h2><?php echo e($name ?? ''); ?></h2>
                    </div>
                    <div class="bread-crumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e($name ?? ''); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--========================inner banner section end =======================================-->




<?php /**PATH D:\installed-softwares\xampp-8.2.12\htdocs\laravel-projects\policykholo\projects\resources\views/front/layouts/banner.blade.php ENDPATH**/ ?>
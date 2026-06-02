<!-- Required meta tags -->
<meta charset="utf-8">
<title><?php echo $__env->yieldContent('title'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>" />
<meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />
<meta name="robots" content="index, follow"/>
<meta name="coverage" content="Worldwide" />

<link rel="icon" href="<?php echo e(asset(ModelHelper::getDataFromSetting('favicon') ?? 'front/images/logo.png')); ?>"  />
<meta property="og:site_name" content="<?php echo e(ModelHelper::getDataFromSetting('website')); ?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>" />
<meta property="og:description" content="<?php echo $__env->yieldContent('description'); ?>" />
<meta property="og:url" content="<?php echo e(url()->current()); ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:domain" content="<?php echo e(url()->current()); ?>" />
<meta name="twitter:title" content="<?php echo $__env->yieldContent('title'); ?>" />
<meta name="twitter:description" content="<?php echo $__env->yieldContent('description'); ?>" />
<?php if(isset($gaurav_blog_data)): ?>
	<meta name="twitter:image" content="<?php echo e(asset($data->featureImage)); ?>" />
  	<meta property="og:image" content="<?php echo e(asset($data->featureImage)); ?>" />
<?php else: ?>
	<meta name="twitter:image" content="<?php echo e(asset(ModelHelper::getDataFromSetting('header_logo') ?? 'front/images/logo.png')); ?>" />
  	<meta property="og:image" content="<?php echo e(asset(ModelHelper::getDataFromSetting('header_logo') ?? 'front/images/logo.png')); ?>" />
<?php endif; ?>
<?php if(isset($gaurav_blog_data)): ?>
<link href="<?php echo e(url()->current()); ?>/" rel="canonical">
<?php else: ?>
<link href="<?php echo e(url()->current()); ?>" rel="canonical">
<?php endif; ?>
<?php echo $__env->make("front.layouts.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent("css"); ?>
<?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/layouts/head.blade.php ENDPATH**/ ?>
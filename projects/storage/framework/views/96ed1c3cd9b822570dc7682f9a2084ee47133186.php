
<?php $__env->startSection('title', $data->meta_title); ?>
<?php $__env->startSection('keywords', $data->meta_keywords); ?>
<?php $__env->startSection('description', $data->meta_description); ?>
<?php $__env->startSection('header-section'); ?>
    <?php echo $data->header_section; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-section'); ?>
    <?php echo $data->footer_section; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <?php
        $name = "Blog Detail";// Str::limit($data->title, 30);
        $bannerImage = asset('front/images/inner-banner.png');
        if ($data->image) {
            $bannerImage = asset($data->image);
        }
    ?>


    <?php echo $__env->make('front.layouts.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     
    <section class="blog-detail-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12 col-md-12">
                    <div class="blog-detail-left">
                        <div class="blog-detail-image">
                            <?php if($data->featureImage): ?>
                                <img src="<?php echo e(asset($data->featureImage)); ?>" alt="<?php echo e($data->title); ?>"
                                    title="<?php echo e($data->title); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="blog-detail-title">
                            <h3><?php echo e(Helper::getLangName($data, 'title')); ?></h3>
                        </div>
                        <div class="feat_blog_con">
                            <p>
                                <span><i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    <?php echo e(date('d M Y', strtotime($data->created_at))); ?></span>
                            </p>
                        </div>
                        <div class="blod-detail-description mb-5">
                            <?php echo Helper::getLangName($data, 'longDescription'); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 col-md-12">
                  <section id="recent-posts-2" class="widget widget_recent_entries">
                    <h2 class="widget-title">Recent Post</h2>
                    <ul>
                        <?php $__currentLoopData = App\Models\Blogs\Blog::where('publish', 'published')->where('status', 'active')->where('id', '!=', $data->id)->take(6)->orderBy('id', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="item-recent-post">

                                <div class="thumbnail-post">
                                    <?php if($c->featureImage): ?>
                                        <img src="<?php echo e(asset($c->featureImage)); ?>"
                                            class="attachment-editech-thumbnail size-editech-thumbnail wp-post-image"
                                            alt="<?php echo e($c->title); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="title-post"><a
                                        href="<?php echo e(url('blog/' . $c->seo_url)); ?>/"><?php echo e(Helper::getLangName($c, 'title')); ?></a>
                                    <span class="post-date"><i class="far fa-calendar-check" aria-hidden="true"></i>
                                        <?php echo e(date('d-F,Y', strtotime($c->created_at))); ?></span>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </section>
                    <section id="categories-4" class="widget widget_categories">
                        <h2 class="widget-title">Categories</h2>
                        <ul>
                            <?php $__currentLoopData = App\Models\Blogs\BlogCategory::orderBy('id', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="cat-item cat-item-2"><a
                                        href="<?php echo e(url($c->seo_url)); ?>/"><?php echo e(Helper::getLangName($c, 'title')); ?></a>
                                    <span>(<?php echo e(App\Models\Blogs\Blog::where('blog_category_id', $c->id)->count()); ?>)</span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </section>
                   
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/group/single.blade.php ENDPATH**/ ?>
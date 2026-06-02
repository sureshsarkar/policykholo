
<?php $__env->startSection("title",$data->meta_title); ?>
<?php $__env->startSection("keywords",$data->meta_keywords); ?>
<?php $__env->startSection("description",$data->meta_description); ?>

<?php $__env->startSection("container"); ?>
<?php 
$bannerImage='front/images/inner-banner.jpg';

?>
  <?php
        $name=Helper::getLangName($data,"title");
        $bannerImage=asset('front/images/b1.jpg');;
        if($data->image){
            $bannerImage=asset($data->image);
        }
    ?>






<section class="career-detail-wrap">
   <div class="container">
     <div class="career-detail-main">
        <div class="row">
           <div class="col-lg-8 col-md-12 col-12">
             <div class="career-detail-left">
                <h2><i class="fas fa-briefcase"></i> <?php echo e($data->title); ?></h2>
            
                <?php if($data->company): ?>
                <p> Company: <?php echo e($data->company); ?></p>
                <?php endif; ?>
                <?php if($data->profile): ?>
                <p> Profile: <?php echo e($data->profile); ?></p>
                <?php endif; ?>
            
                <?php if($data->job_type): ?>
                <p> Job Type: <?php echo e($data->job_type); ?></p>
                <?php endif; ?>
                <?php if($data->location): ?>
                
                <p> Location: <?php echo e($data->location); ?></p>
                <?php endif; ?>
                <?php if($data->package): ?>
                <p> Package: <?php echo e($data->package); ?></p>
                <?php endif; ?>
                <p> Job Category: <?php echo e(App\Models\CareerCategory::find($data->category)->title ?? 'N/A'); ?></p>
            
                <?php echo $data->longDescription; ?>

             </div>
           </div>
           <?php
            $jobs=App\Models\Career::where("id","!=",$data->id)->orderBy("id","desc")->paginate(6);
          ?>
           <div class="col-lg-4 col-md-12 col-12">
               <?php if(count($jobs)>0): ?>
              <div class="career-detail-right">
                 <h3>Find More Jobs</h3>
                   
         <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="career-find-job">
                     <div class="career-find-inner">
                        <h4><?php echo e($c->location); ?></h4>
                         <h5><i class="fas fa-briefcase"></i> <?php echo e($c->title); ?></h5>
                         <p><?php echo e($c->profile); ?></p>
                         <a href="<?php echo e(url('career/detail/'.$c->id)); ?>">Browse Job</a>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <?php endif; ?>
           </div>
        </div>
     </div>
   </div>
</section>




<section class="domain-list-cta">
	 <div class="domain-list-main-cta" style="background-image: url(<?php echo e(asset('html/images/domain-list-form.png')); ?>);">
	 	<div class="container">
	 	<div class="domain-list-cta-form">
	 		 <div class="row">
	 		 	 <div class="col-lg-6 col-md-12 col-12">
	 		 	 	<div class="domain-form-left">
	 		 	 		 <h4>Fill Your Detail </h4>
	 		 	 		<?php echo Form::open(["url"=>"domain-feedback","files"=>true]); ?>

	 		 	 		 	<div class="form-row row">
	 		 	 		 	    <input type="hidden" name="service_id" value="<?php echo e($data->title); ?>" />
	 		 	 		 		 <div class="form-group col-lg-6 col-md-6 col-12">
	 		 	 		 		 	 <?php echo Form::label("Name"); ?>

		<?php echo Form::text('name',null,["class"=>"form-control","required"]); ?>

	 		 	 		 		 </div>
	 		 	 		 		 <div class="form-group col-lg-6 col-md-6 col-12">
	 		 	 		 		 	 <?php echo Form::label("Email"); ?>

	 	<?php echo Form::email('email',null,["class"=>"form-control","required"]); ?>

	 		 	 		 		 </div>
	 		 	 		 	</div>
	 		 	 		 	<div class="form-row row">
	 		 	 		 		 <div class="form-group col-lg-6 col-md-6 col-12">
	 		 	 		 		 	 <?php echo Form::label("Contact Number"); ?>

	 	<?php echo Form::text('contactnumber',null,["class"=>"form-control","required"]); ?>

	 		 	 		 		 </div>
	 		 	 		 		 <div class="form-group col-lg-6 col-md-6 col-12">
	 		 	 		 		  <?php echo Form::label("Upload Resume"); ?>

	 	 <?php echo Form::file("image",["class"=>"form-control","required"]); ?>

	 		 	 		 		 </div>
	 		 	 		 	</div>
	 		 	 		 		<div class="form-row row">
	 		 	 		 		 <div class="form-group col-lg-12 col-md-12 col-12">
	 		 	 		 		 	 <?php echo Form::label("Message"); ?>

	 	<?php echo Form::textarea('message',null,["class"=>"form-control","rows"=>2]); ?>

	 		 	 		 		 </div>
	 		 	 		 		
	 		 	 		 	</div>
		 	 		 	 	<div class="form-group">
                				<div class="g-recaptcha" data-sitekey="<?php echo e(getenv('Google_Receptcha_site_key')); ?>">
                				</div>
                			</div>
	 		 	 		 	<div class="cta-submit-button">
	 		 	 		 		 <button type="submit">Submit</button>
	 		 	 		 	</div>
		 	 		 	<?php echo Form::close(); ?>  
	 		 	 	</div>
	 		 	 </div>
	 		 	 <div class="col-lg-6 col-md-12 col-12">
	 		 	 	<div class="domain-list-cta-content">
	 		 	 		<div class="domain-list-cta-inner-content">
	 		 	 		   
	 		 	 		  <h5>Build your career with us </h5>
                            <p> Those who think about changing careers have one thing in common: they're always eager to learn and grow.  </p>
	 		 	 		    <p>Intentional choices and actions create a meaningful career, not chance.</p>
	 		 	 		   
	 		 	 		 </div>
	 		 	 	</div>
	 		 	 </div>
	 		 </div>
	 	</div>
	 </div>
	 </div>
</section>





<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("front.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/career/common.blade.php ENDPATH**/ ?>
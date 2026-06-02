<div class="row">
   <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label("Title"); ?>

            <?php echo Form::text("name",null,["class"=>"form-control","required"=>"required"]); ?>

            <span class="text-danger"><?php echo e($errors->first("name")); ?></span>
        </div>
    </div>


    

    


    <div class="col-md-3">
        <div class="form-group">
              <label> Seo Url </label>
            <?php echo Form::text("seo_url",null,["class"=>"form-control","required"=>"required"]); ?>

            <span class="text-danger"><?php echo e($errors->first("seo_url")); ?></span>
        </div>
    </div>




    <div class="col-md-3 ">
        <div class="form-group">
            <?php echo Form::label("image"); ?>

            <?php echo Form::file("image",["class"=>"form-control"]); ?>

            <span class="text-danger"><?php echo e($errors->first("image")); ?></span>
             <?php if(isset($data)): ?>
                <?php if($data->image!=""): ?>
                    <?php if(preg_match('/\.(jpeg|jpg|png|gif)$/i', asset(($data->image)))): ?>

                    <img src="<?php echo e(asset(($data->image))); ?>" width="200" >
                    <?php else: ?>
                        <video width="320" height="240" controls>
                            <source src="<?php echo e(asset(($data->image))); ?>" type="video/mp4">
                        </video>

                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label("publish"); ?>

            <?php echo Form::select("publish",["published"=>"published","pending"=>"pending"],'published',["class"=>"form-control","required"=>"required"]); ?>

            <span class="text-danger"><?php echo e($errors->first("publish")); ?></span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label("Banner Image"); ?>

            <?php echo Form::file("bannerImage",["class"=>"form-control"]); ?>

            <span class="text-danger"><?php echo e($errors->first("bannerImage")); ?></span>
             <?php if(isset($data)): ?>
                <?php if($data->bannerImage!=""): ?>
                     <img src="<?php echo e(asset(($data->bannerImage))); ?>" width="200" >
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

     <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label("Icon Class Name "); ?>

            <?php echo Form::text("icon_class",null,["class"=>"form-control"]); ?>

            <span class="text-danger"><?php echo e($errors->first("icon_class")); ?></span>
        </div>
    </div>


   



</div>



<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label("Description"); ?>

            <?php echo Form::textarea("description",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("description")); ?></span>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label("shortDescription"); ?>

            <?php echo Form::textarea("shortDescription",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("shortDescription")); ?></span>
        </div>
    </div>

</div>





<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label("meta_title"); ?>

            <?php echo Form::textarea("meta_title",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("meta_title")); ?></span>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label("meta_keywords"); ?>

            <?php echo Form::textarea("meta_keywords",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("meta_keywords")); ?></span>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label("meta_description"); ?>

            <?php echo Form::textarea("meta_description",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("meta_description")); ?></span>
        </div>
    </div>

</div>


<?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/admin/insurance-plan/form.blade.php ENDPATH**/ ?>
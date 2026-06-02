<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label("Title"); ?>

            <?php echo Form::text("name",null,["class"=>"form-control","required"=>"required"]); ?>

            <span class="text-danger"><?php echo e($errors->first("name")); ?></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Icon Class Name *</label>
            <?php echo Form::text("seo_url",null,["class"=>"form-control", "title"=>"Enter Valid SEO URL","required"=>"required"]); ?>

            <span class="text-danger"><?php echo e($errors->first("seo_url")); ?></span>
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label("Ordering"); ?>

            <?php echo Form::text("ordering",null,["class"=>"form-control"]); ?>

            <span class="text-danger"><?php echo e($errors->first("ordering")); ?></span>
        </div>
    </div>

    


    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label("description"); ?>

            <?php echo Form::textarea("longDescription",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("longDescription")); ?></span>
        </div>
    </div>


</div>

<?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/admin/welcome_packages/form.blade.php ENDPATH**/ ?>
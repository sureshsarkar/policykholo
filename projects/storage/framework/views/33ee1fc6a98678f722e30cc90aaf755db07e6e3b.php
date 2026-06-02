<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label("Title"); ?>

            <?php echo Form::text("title",null,["class"=>"form-control","required"=>"required"]); ?>

            <span class="text-danger"><?php echo e($errors->first("title")); ?></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Icon Class Name *</label>
            <?php echo Form::text("icon_class",null,["class"=>"form-control","required"=>"required"]); ?>

            <span class="text-danger"><?php echo e($errors->first("icon_class")); ?></span>
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
            <?php echo Form::label("descreption"); ?>

            <?php echo Form::textarea("descreption",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("descreption")); ?></span>
        </div>
    </div>


</div>

<?php /**PATH D:\installed-softwares\xampp-8.2.12\htdocs\laravel-projects\policykholo\projects\resources\views/admin/key-features/form.blade.php ENDPATH**/ ?>
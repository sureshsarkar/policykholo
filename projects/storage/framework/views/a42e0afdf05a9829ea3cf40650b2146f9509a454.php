<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label("name"); ?>

            <?php echo Form::text("name",null,["class"=>"form-control"]); ?>

            <span class="text-danger"><?php echo e($errors->first("name")); ?></span>
        </div>
    </div>


        
    

    
    <div class="col-md-3 d-none">
        <div class="form-group">
            
            <?php echo Form::label("stay_date"); ?>

            <?php echo Form::text("stay_date",null,["class"=>"form-control datepicker"]); ?>

            <span class="text-danger"><?php echo e($errors->first("stay_date")); ?></span>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            
            <?php echo Form::label("Reviews"); ?>

            <?php echo Form::selectRange("score",1,5,null,["class"=>"form-control"]); ?>

            <span class="text-danger"><?php echo e($errors->first("score")); ?></span>
            
        </div>
    </div>
 
    


    <div class="col-md-3">
        <div class="form-group">
            
            <?php echo Form::label("profile"); ?>

            <?php echo Form::text("profile",null,["class"=>"form-control"]); ?>

            <span class="text-danger"><?php echo e($errors->first("profile")); ?></span>
            
        </div>
    </div>


    
 
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label("message"); ?>

            <?php echo Form::textarea("message",null,["class"=>"form-control","rows"=>2]); ?>

            <span class="text-danger"><?php echo e($errors->first("message")); ?></span>
        </div>
    </div>

  


</div>
<?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/admin/testimonials/form.blade.php ENDPATH**/ ?>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label("question"); ?>

            <?php echo Form::textarea("question",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("question")); ?></span>
        </div>
    </div>
</div>



    <div class="row">
    <div class="col-md-12">
            <?php echo Form::label("Policy Name"); ?>

            <?php echo Form::select("type",ModelHelper::getPolicySelectList(),null,["class"=>"form-control","placeholder"=>"choose parent Page"]); ?>

            <span class="text-danger"><?php echo e($errors->first("type")); ?></span>
        </div>
    </div><br>



 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label("answer"); ?>

            <?php echo Form::textarea("answer",null,["class"=>"form-control","rows"=>"2"]); ?>

            <span class="text-danger"><?php echo e($errors->first("answer")); ?></span>
        </div>
    </div>
 


</div><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/admin/faqs/form.blade.php ENDPATH**/ ?>
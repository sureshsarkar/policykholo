<h5 class="text-warning">JS/CSS Version</h5>

<div class="row">
	<div class="col-md-3"><strong>Version</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['version_css_js']" value="<?php echo e(ModelHelper::getDataFromSetting('version_css_js')); ?>" placeholder="Version">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3"><strong>Website</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<input class="form-control" name="input['website']" placeholder="website without http and www" value="<?php echo e(ModelHelper::getDataFromSetting('website')); ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>favicon</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<input class="form-control" name="input['favicon']" type="file">
			<?php if(ModelHelper::getDataFromSetting('favicon')): ?>
				<img src="<?php echo e(asset(ModelHelper::getDataFromSetting('favicon'))); ?>" width="100px" />
			<?php endif; ?>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Header logo</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<input class="form-control" name="input['header_logo']" type="file">
			<?php if(ModelHelper::getDataFromSetting('header_logo')): ?>
				<img src="<?php echo e(asset(ModelHelper::getDataFromSetting('header_logo'))); ?>" width="200px" />
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Footer logo</strong></div>
	<div class="col-md-9">
		<div class="form-group" style="background: black;">

			<input class="form-control" name="input['footer_logo']" type="file">
			<?php if(ModelHelper::getDataFromSetting('footer_logo')): ?>
				<img src="<?php echo e(asset(ModelHelper::getDataFromSetting('footer_logo'))); ?>" width="200px" />
			<?php endif; ?>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-3"><strong><h2>Counter</h2></strong></div>
	<div class="col-md-9">
		&nbsp;&nbsp;
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Happy Customers</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<input class="form-control" name="input['project completed']" placeholder="project completed" value="<?php echo e(ModelHelper::getDataFromSetting('project completed')); ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Insurance Companies</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<input class="form-control" name="input['Working hours']" placeholder="Working hours" value="<?php echo e(ModelHelper::getDataFromSetting('Working hours')); ?>">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3"><strong>Claim Settlement Ratio</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<input class="form-control" name="input['Experienced Staff']" placeholder="Experienced Staff" value="<?php echo e(ModelHelper::getDataFromSetting('Experienced Staff')); ?>">
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-3"><strong>Customer Support</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<input class="form-control" name="input['Happy Clients']" placeholder="Happy Clients" value="<?php echo e(ModelHelper::getDataFromSetting('Happy Clients')); ?>">
		</div>
	</div>
</div>
<?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/admin/dashboard/sub/admin.blade.php ENDPATH**/ ?>
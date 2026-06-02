<h5 class="text-warning">SMTP Setup</h5>

<div class="row">
	<div class="col-md-3"><strong>Contact Us Mail Receiving E-mail</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['contact_us_receiving_mail']" value="<?php echo e(ModelHelper::getDataFromSetting('contact_us_receiving_mail')); ?>" placeholder="contact_us_receiving_mail">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>NEWSLETTER Mail Receiving E-mail</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['newsletter_receiving_mail']" value="<?php echo e(ModelHelper::getDataFromSetting('newsletter_receiving_mail')); ?>" placeholder="newsletter_receiving_mail">
		</div>
	</div>
</div>
<div class="row ">
	<div class="col-md-3"><strong>Mail Footer</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['mail_footer']" value="<?php echo e(ModelHelper::getDataFromSetting('mail_footer')); ?>" placeholder="mail_footer">
		</div>
	</div>
</div>

<div class="row ">
	<div class="col-md-3"><strong>Mail From</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['mail_from']" value="<?php echo e(ModelHelper::getDataFromSetting('mail_from')); ?>" placeholder="mail_from">
		</div>
	</div>
</div>


<div class="row ">
	<div class="col-md-3"><strong>Mailer Admin Name</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['mailer_admin_name']" value="<?php echo e(ModelHelper::getDataFromSetting('mailer_admin_name')); ?>" placeholder="mailer_admin_name">
		</div>
	</div>
</div>
<div class="row ">
	<div class="col-md-3"><strong>Mail From Name</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['mail_from_name']" value="<?php echo e(ModelHelper::getDataFromSetting('mail_from_name')); ?>" placeholder="mail_from_name">
		</div>
	</div>
</div><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/admin/dashboard/sub/mail.blade.php ENDPATH**/ ?>
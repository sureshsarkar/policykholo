
<div class="row">
	<div class="col-md-3"><strong>Address</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<textarea class="form-control" name="input['address']" placeholder="address"><?php echo e(ModelHelper::getDataFromSetting('address')); ?></textarea>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3"><strong>newsletter</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<textarea class="form-control" name="input['newsletter']" placeholder="newsletter"><?php echo e(ModelHelper::getDataFromSetting('newsletter')); ?></textarea>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3"><strong>about</strong></div>
	<div class="col-md-9">
		<div class="form-group">

			<textarea class="form-control" name="input['about']" placeholder="about"><?php echo e(ModelHelper::getDataFromSetting('about')); ?></textarea>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>map</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['map']" value="<?php echo e(ModelHelper::getDataFromSetting('map')); ?>" placeholder="map ">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Mobile</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['mobile']" value="<?php echo e(ModelHelper::getDataFromSetting('mobile')); ?>" placeholder="mobile ">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>WhatsApp URL</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['whatsapp_url']" value="<?php echo e(ModelHelper::getDataFromSetting('whatsapp_url')); ?>" placeholder="whatsapp">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Email</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['email']" value="<?php echo e(ModelHelper::getDataFromSetting('email')); ?>" placeholder="email ">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Alternate Email</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['email1']" value="<?php echo e(ModelHelper::getDataFromSetting('email1')); ?>" placeholder="email1 ">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Alternate Mobile</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" name="input['mobile1']" value="<?php echo e(ModelHelper::getDataFromSetting('mobile1')); ?>" placeholder="mobile1 ">
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-3"><strong>Open Days</strong></div>
    <div class="col-md-9">
        <div class="form-group">
            <input type="text" class="form-control" name="input['open-office']" value="<?php echo e(ModelHelper::getDataFromSetting('open-office')); ?>" placeholder="open-office ">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"><strong>Office time</strong></div>
    <div class="col-md-9">
        <div class="form-group">
            <input type="text" class="form-control" name="input['office-time']" value="<?php echo e(ModelHelper::getDataFromSetting('office-time')); ?>" placeholder="office-time ">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"><strong>Weekend Closed</strong></div>
    <div class="col-md-9">
        <div class="form-group">
            <input type="text" class="form-control" name="input['weekend-closed']" value="<?php echo e(ModelHelper::getDataFromSetting('weekend-closed')); ?>" placeholder="weekend-closed">
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-3"><strong>Copyright</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea class="form-control" name="input['copyright']" placeholder="copyright"><?php echo e(ModelHelper::getDataFromSetting('copyright')); ?></textarea>
		</div>
	</div>
</div>
<div class="row ">
	<div class="col-md-3"><strong>Chat bot</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea type="text" class="form-control" name="input['chat-bot']"  placeholder="Chat bot "><?php echo e(ModelHelper::getDataFromSetting('chat-bot')); ?></textarea>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"><strong>Google analytics</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea type="text" class="form-control" name="input['google-analytics']" placeholder="Google analytics"><?php echo e(ModelHelper::getDataFromSetting('google-analytics')); ?></textarea>
		</div>
	</div>
</div>
<div class="row ">
	<div class="col-md-3"><strong>Google tag-master</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea type="text" class="form-control" name="input['google-tag-master']" placeholder="Google tag-master"><?php echo e(ModelHelper::getDataFromSetting('google-tag-master')); ?></textarea>
		</div>
	</div>
</div>

<div class="row ">
	<div class="col-md-3"><strong> facebook pixel code</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea type="text" class="form-control" name="input['facebook-pixel-code']"  placeholder="facebook-pixel-code"><?php echo e(ModelHelper::getDataFromSetting('facebook-pixel-code')); ?></textarea>
		</div>
	</div>
</div>

<div class="row ">
	<div class="col-md-3"><strong> Common Footer Data</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea type="text" class="form-control" name="input['common-footer-data']"  placeholder="Common Footer Data"><?php echo e(ModelHelper::getDataFromSetting('common-footer-data')); ?></textarea>
		</div>
	</div>
</div>

<div class="row ">
	<div class="col-md-3"><strong> Common Header Data</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea type="text" class="form-control" name="input['common-header-data']"  placeholder="Common Header Data"><?php echo e(ModelHelper::getDataFromSetting('common-header-data')); ?></textarea>
		</div>
	</div>
</div>
<div class="row ">
	<div class="col-md-3"><strong> Other Thing after start body tag</strong></div>
	<div class="col-md-9">
		<div class="form-group">
			<textarea type="text" class="form-control" name="input['other-thing-on-head']"  placeholder="Other Thing on head"><?php echo e(ModelHelper::getDataFromSetting('other-thing-on-head')); ?></textarea>
		</div>
	</div>
</div>
<?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/admin/dashboard/sub/main.blade.php ENDPATH**/ ?>
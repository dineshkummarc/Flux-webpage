<?php if (!$sf_user->hasFlash('msg')): ?>
	<h1><?php echo $title ?></h1>
	<?php echo $sf_data->getRaw('text'); ?>
	<form method="POST" action="<?php echo url_for('@message')?>" class="contactForm">
	<?php /*echo $form->renderFormTag('sendMessage', array('class' => 'contactForm'))*/ ?>
	<?php echo $form ?>
	<input type="submit" class="customSubmit"/>
	</form>
<?php else: ?>
	<h1><?php echo __('Thank you') ?></h1>
	<p>
		<?php echo __('Message send') ?><br/>
	</p>
	<hr/>
	<p>
		<?php echo __('We contact you as soon as possible.') ?><br/>
	</p>
<?php endif; ?>
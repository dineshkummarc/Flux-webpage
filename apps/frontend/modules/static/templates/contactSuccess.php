<h1><?php echo $title ?></h1>

<?php echo $sf_data->getRaw('text'); ?>

<form method="POST" action="<?php echo url_for('@message')?>" class="contactForm">
<?php /*echo $form->renderFormTag('sendMessage', array('class' => 'contactForm'))*/ ?>
<?php echo $form ?>
<input type="submit" class="customSubmit"/>
</form>

<h1><?php echo $title ?></h1>

<?php echo $sf_data->getRaw('text'); ?>

<?php echo $form->renderFormTag('/static/sendMessage', array('class' => 'contactForm')) ?>
<?php echo $form ?>
<input type="submit" class="customSubmit"/>
</form>

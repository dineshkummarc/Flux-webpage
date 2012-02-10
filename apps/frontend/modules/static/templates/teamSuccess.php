<h1><?php echo __('team')?></h1>

<?php if (count($coreMembers) == 0): ?>
	<p><?php echo __('There are no core members') ?></p>
<?php else: ?>
	<?php $i = 0; ?>
	<?php foreach ($coreMembers as $member): ?>
		<?php if ($i > 0) echo '<hr/>'?>
		<?php if (strlen($member->getAltImage()) > 0) echo "<img src='".$member->getAltImage()."' alt='Photo ".$member->getUser()."' />"; ?>
		<p><?php echo $member->getName().' '.$member->getSurname() ?><br/>
		<?php echo $member->getCategory() ?><br/>
		<?php echo $member->getDescription(ESC_RAW) ?></p>
		<?php $i = 1; ?>
	<?php endforeach; ?>
<?php endif; ?>


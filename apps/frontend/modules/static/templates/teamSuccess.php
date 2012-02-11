<h1><?php echo __('team')?></h1>
<?php if (count($coreMembers) == 0): ?>
	<p><?php echo __('There are no core members') ?></p>
<?php else: ?>
	<?php $i = 0; ?>
	<?php foreach ($coreMembers as $member): ?>
		<?php if ($i > 0) echo '<hr/>'?>
		<?php if (strlen($member->getAltImage()) > 0) echo "<img src='/uploads/".$member->getAltImage()."' alt='Photo ".$member->getUser()."' />"; ?>
		<p><?php echo $member->getName().' '.$member->getSurname() ?><br/>
		<?php echo $member->getCategory() ?><br/>
		<?php echo $member->getDescription(ESC_RAW) ?></p>
		<?php if (count($member->Contact) > 0): ?>
			<?php foreach ($member->Contact as $contacte): ?>
				<?php if ($contacte->Enumeration->getIsActive()) echo $contacte->getKind().': '.$contacte->getTarget(ESC_RAW).'<br/>'?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php $i = 1; ?>
	<?php endforeach; ?>
<?php endif; ?>

<h1 style="margin-top:50px"><?php echo __('partners')?></h1>
<?php if (count($partnerMembers) == 0): ?>
	<p><?php echo __('There are no partner members') ?></p>
<?php else: ?>
	<?php $i = 0; ?>
	<?php foreach ($partnerMembers as $member): ?>
		<?php if ($i > 0) echo '<hr/>'?>
		<?php if (strlen($member->getAltImage()) > 0) echo "<img src='/uploads/".$member->getAltImage()."' alt='Photo ".$member->getUser()."' />"; ?>
		<p><?php echo $member->getName().' '.$member->getSurname() ?><br/>
		<?php echo $member->getCategory() ?><br/>
		<?php echo $member->getDescription(ESC_RAW) ?></p>
		<?php if (count($member->Contact) > 0): ?>
			<?php foreach ($member->Contact as $contacte): ?>
				<?php if ($contacte->Enumeration->getIsActive()) echo $contacte->getKind().': '.$contacte->getTarget(ESC_RAW).'<br/>'?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php $i = 1; ?>
	<?php endforeach; ?>
<?php endif; ?>
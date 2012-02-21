<h1><?php echo __('business core')?></h1>
<?php if (count($coreMembers) == 0): ?>
	<p><?php echo __('There are no business core members') ?></p>
<?php else: ?>
	<?php $i = 0; ?>
	<?php foreach ($coreMembers as $member): ?>
		<?php if ($i > 0) echo '<hr/>'?>
		<?php if (strlen($member->getAltImage()) > 0) echo "<img class='teamPhoto' src='/uploads/".$member->getAltImage()."' alt='Photo ".$member->getUser()."' />"; ?>
		<p><strong><?php echo $member->getName().' '.$member->getSurname() ?></strong><br/>
		<?php echo $member->getCategory() ?><br/>
		<span style="font-size:0.85em;font-style:italic;"><?php echo $member->getDescription(ESC_RAW) ?></span></p>
		<?php if (count($member->Contact) > 0): ?>
			<?php foreach ($member->Contact as $contacte): ?>
				<?php if ($contacte->Enumeration->getIsActive()): ?>
					<?php if ($contacte->getKind() !== 'NO-LINE'): ?>
						<?php echo $contacte->getKind().': '.$contacte->getTarget(ESC_RAW).'<br/>'; ?>
					<?php else: ?>
						<?php echo '&nbsp;<br/>'; ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php $i = 1; ?>
	<?php endforeach; ?>
<?php endif; ?>

<h1 style="margin-top:60px"><?php echo __('collaborators')?></h1>
<?php if (count($partnerMembers) == 0): ?>
	<p><?php echo __('There are no collaborators members') ?></p>
<?php else: ?>
	<?php $i = 0; ?>
	<?php foreach ($partnerMembers as $member): ?>
		<?php if ($i > 0) echo '<hr/>'?>
		<?php if (strlen($member->getAltImage()) > 0) echo "<img class='teamPhoto' src='/uploads/".$member->getAltImage()."' alt='Photo ".$member->getUser()."' />"; ?>
		<p><strong><?php echo $member->getName().' '.$member->getSurname() ?></strong><br/>
		<?php echo $member->getCategory() ?><br/>
		<span style="font-size:0.85em;font-style:italic;"><?php echo $member->getDescription(ESC_RAW) ?></span></p>
		<?php if (count($member->Contact) > 0): ?>
			<?php foreach ($member->Contact as $contacte): ?>
				<?php if ($contacte->Enumeration->getIsActive() && $contacte->getKind() !== 'NO-LINE') echo $contacte->getKind().': '.$contacte->getTarget(ESC_RAW).'<br/>' ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php $i = 1; ?>
	<?php endforeach; ?>
<?php endif; ?>
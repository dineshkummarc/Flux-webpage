<h1><?php echo __('projects')?></h1>

<?php if (count($projects) == 0): ?>
	<p><?php echo __('There are no projects') ?></p>
<?php else: ?>
	<?php foreach ($projects as $project): ?>
		<?php if (strlen($project->getLogo()) > 0) echo "<img src='".$project->getLogo()."' alt='Logo ".$project->getName()."' />"; ?>
		<p><?php if ($project->getUnit()->getName() != 'Skaeda') echo $project->getUnit()->getName(); ?></p>
		<?php echo $project->getUnit()->getSummary(ESC_RAW) ?>
		<p><?php echo link_to('Read more', 'project/show?id='.$project->getId()); ?></p>
		<p><?php echo __('Website: ').link_to($project->getUnit()->getUrl(), 'http://'.$project->getUnit()->getUrl()); ?></p>
		<hr/>
	<?php endforeach; ?>
<?php endif; ?>

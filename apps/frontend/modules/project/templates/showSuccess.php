<h1><?php echo __('projects')?></h1>

<?php if (strlen($project->getLogo()) > 0): ?>
	<img src='<?php echo $project->getLogo() ?>' alt='Logo <?php echo $project->getName() ?>'/>
<?php endif; ?>

<?php if ($project->getUnit()->getName() != 'Skaeda'): ?>
	<p><?php echo $project->getUnit()->getName(); ?></p>
<?php endif; ?>

<p><?php echo $project->getUnit()->getSubtitle(ESC_RAW) ?></p>
<p><?php echo $project->getUnit()->getDescription(ESC_RAW) ?></p>

<?php if (strlen($project->getAltImage()) > 0): ?>
	<img class='projectScreenshot' src='<?php echo $project->getAltImage() ?>' alt='Screenshot <?php echo $project->getName() ?>' />
<?php endif; ?>

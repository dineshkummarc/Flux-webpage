<h1><?php echo __('projects')?></h1>

<p><?php if (strlen($project->getLogo()) > 0) echo "<img src='".$project->getLogo()."' alt='Logo ".$project->getName()."' />"; ?></p>
<p><?php if ($project->getUnit()->getName() != 'Skaeda') echo $project->getUnit()->getName(); ?></p>
<p><?php echo $project->getUnit()->getSubtitle(ESC_RAW) ?></p>
<p><?php echo $project->getUnit()->getDescription(ESC_RAW) ?></p>
<?php if (strlen($project->getAltImage()) > 0): ?>
	<img class='projectScreenshot' src='<?php echo $project->getAltImage() ?>' alt='Screenshot <?php echo $project->getName() ?>' />
<?php endif;?>

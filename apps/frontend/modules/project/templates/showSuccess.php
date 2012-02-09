<h1><?php echo __('projects')?></h1>

<p>
	<?php echo $project->getUnit()->getTitle(ESC_RAW) ?>
	<?php echo $project->getUnit()->getSubtitle(ESC_RAW) ?>
	<?php echo $project->getUnit()->getDescription(ESC_RAW) ?>
</p>

<h1><?php echo __('Projects')?></h1>

<?php if (count($projects) == 0): ?>
	<p><?php echo __('There are no projects') ?></p>
<?php else: ?>
	<?php foreach ($projects as $project): ?>
		<p><?php echo $project->getUnit()->getName(); ?></p>
		<p><?php echo $project->getUnit()->getUrl().' · '.$project->getLogo(); ?></p>
		<hr/>
	<?php endforeach; ?>
<?php endif; ?>

<!-- 
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Unit</th>
      <th>Enumeration</th>
      <th>Logo</th>
      <th>Alt image</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php /* foreach ($projects as $project): ?>
    <tr>
      <td><a href="<?php echo url_for('project/show?id='.$project->getId()) ?>"><?php echo $project->getId() ?></a></td>
      <td><?php echo $project->getUnitId() ?></td>
      <td><?php echo $project->getEnumerationId() ?></td>
      <td><?php echo $project->getLogo() ?></td>
      <td><?php echo $project->getAltImage() ?></td>
      <td><?php echo $project->getCreatedAt() ?></td>
      <td><?php echo $project->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('project/new')*/ ?>">New</a>
-->
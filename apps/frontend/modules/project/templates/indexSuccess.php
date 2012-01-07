<h1>Projects List</h1>

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
    <?php foreach ($projects as $project): ?>
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

  <a href="<?php echo url_for('project/new') ?>">New</a>

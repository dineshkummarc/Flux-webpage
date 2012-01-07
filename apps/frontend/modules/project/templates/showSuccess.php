<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $project->getId() ?></td>
    </tr>
    <tr>
      <th>Unit:</th>
      <td><?php echo $project->getUnitId() ?></td>
    </tr>
    <tr>
      <th>Enumeration:</th>
      <td><?php echo $project->getEnumerationId() ?></td>
    </tr>
    <tr>
      <th>Logo:</th>
      <td><?php echo $project->getLogo() ?></td>
    </tr>
    <tr>
      <th>Alt image:</th>
      <td><?php echo $project->getAltImage() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $project->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $project->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('project/edit?id='.$project->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('project/index') ?>">List</a>

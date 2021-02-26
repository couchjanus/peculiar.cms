<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/brands/create',
    'label' => "New brand",
    'title' => "brands List"
  ]);

?>

<div class="table-responsive">

<?php if(count($brands)>0):?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($brands as $brand) :?>
            <tr>
              <td><?=$brand->id?></td>
              <td><?=$brand->name?></td>
              <td><?=$brand->status?></td>
              <td>
                <a href="/admin/brands/edit/<?=$brand->id?>"><button class="btn btn-sm btn-outline-info">Edit</button></a>
                <a href="/admin/brands/delete/<?=$brand->id?>"><button class="btn btn-sm btn-outline-danger">Delete</button></a>
              </td>
             
            </tr>
            <?php endforeach?>
          </tbody>
        </table>
        <?php endif?>
</div>
<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/categories/create',
    'label' => "New Category",
    'title' => "Categories List"
  ]);

?>

<div class="table-responsive">

<?php if(count($categories)>0):?>
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
              <?php foreach ($categories as $category) :?>
            <tr>
              <td><?=$category->id?></td>
              <td><?=$category->name?></td>
              <td><?=$category->status?></td>
              <td>
                <a href="/admin/categories/edit/<?=$category->id?>"><button class="btn btn-sm btn-outline-info">Edit</button></a>
                <a href="/admin/categories/delete/<?=$category->id?>"><button class="btn btn-sm btn-outline-danger">Delete</button></a>
              </td>
             
            </tr>
            <?php endforeach?>
          </tbody>
        </table>
        <?php endif?>
</div>
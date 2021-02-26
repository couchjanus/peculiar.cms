<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/products/create',
    'label' => "New product",
    'title' => "products List"
  ]);

?>

<div class="table-responsive">

<?php if(count($products)>0):?>
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
              <?php foreach ($products as $product) :?>
            <tr>
              <td><?=$product->id?></td>
              <td><?=$product->name?></td>
              <td><?=$product->status?></td>
              <td>
                <a href="/admin/products/edit/<?=$product->id?>"><button class="btn btn-sm btn-outline-info">Edit</button></a>
                <a href="/admin/products/delete/<?=$product->id?>"><button class="btn btn-sm btn-outline-danger">Delete</button></a>
              </td>
             
            </tr>
            <?php endforeach?>
          </tbody>
        </table>
        <?php endif?>
</div>
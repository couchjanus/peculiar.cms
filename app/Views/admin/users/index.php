<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/users/create',
    'label' => "New user",
    'title' => "Users List"
  ]);

?>

<div class="table-responsive">

<?php if(count($users)>0):?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Status</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($users as $user) :?>
            <tr>
              <td><?=$user->id?></td>
              <td><?=$user->name?></td>
              <td><?=$user->status?></td>
              <td><?=$user->role_id?></td>
              <td>
                <a href="/admin/users/edit/<?=$user->id?>"><button class="btn btn-sm btn-outline-info">Edit</button></a>
                <a href="/admin/users/delete/<?=$user->id?>"><button class="btn btn-sm btn-outline-danger">Delete</button></a>
              </td>
             
            </tr>
            <?php endforeach?>
          </tbody>
        </table>
        <?php endif?>
</div>
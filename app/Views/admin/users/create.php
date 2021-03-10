<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/users',
    'label' => "All users",
    'title' => "Create New user"
  ]);

?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/users/store" enctype="multipart/form-data">
            <div class="row g-3">
                <label class="form-label">Email address:</label>
                <input class="form-control" type="email" name="email" placeholder="Email" required>
            </div>
      
            <div class="row g-3">
                <label class="form-label">Password:</label>
                <input class="form-control"  type="password" name="password" placeholder="Password" required>
            </div>
            
            <div class="row g-3">
                <div class="col">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" required name="role_id">
                    <option value="">Choose...</option>
                    <?php if(is_array($roles)):?>
                        <?php foreach($roles as $role):?>
                            <option value="<?=$role->id?>"><?=$role->name?></option>
                    <?php endforeach?>
                    <?php endif?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid role.
                </div>
                </div>

               
            </div>

            <button type="submit" class="w-100 btn btn-primary btn-lg">Add New user</button>
        </form>
    </div>

</div>
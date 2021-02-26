<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/brands',
    'label' => "All brands",
    'title' => "Create New brand"
  ]);

?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/brands/store">
            <div class="row g-3">
                <label class="form-label">brand Name:</label>
                <input class="form-control" name="name">
            </div>
            <div class="row g-3">
                <div class="form-check">
                <input type="checkbox" name="status"> 
                <label class="form-checl-label">brand Status (Check if active)</label>
                </div>
                
            </div>
            <button type="submit" class="w-100 btn btn-primary btn-lg">Add New brand</button>
        </form>
    </div>

</div>
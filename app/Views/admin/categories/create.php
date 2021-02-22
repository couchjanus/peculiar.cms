<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/categories',
    'label' => "All Categories",
    'title' => "Create New Category"
  ]);

?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/categories/store">
            <div class="row g-3">
                <label class="form-label">Category Name:</label>
                <input class="form-control" name="name">
            </div>
            <div class="row g-3">
                <div class="form-check">
                <input type="checkbox" name="status"> 
                <label class="form-checl-label">Category Status (Check if active)</label>
                </div>
                
            </div>
            <button type="submit" class="w-100 btn btn-primary btn-lg">Add New Category</button>
        </form>
    </div>

</div>
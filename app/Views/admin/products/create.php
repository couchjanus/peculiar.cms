<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/products',
    'label' => "All products",
    'title' => "Create New product"
  ]);

?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/products/store" enctype="multipart/form-data">
            <div class="row g-3">
                <label class="form-label">product Name:</label>
                <input class="form-control" name="name">
            </div>
            
            <div class="row g-3">
                <label class="form-label">Product Price:</label>
                <input class="form-control" name="price">
            </div>

            <div class="row g-3">

                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="status">
                    <label class="btn btn-outline-primary" for="btncheck1">Product Status</label>

                    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" name="is_new">
                    <label class="btn btn-outline-primary" for="btncheck2">Is New?</label>

                    <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" name="is_recommend">
                    <label class="btn btn-outline-primary" for="btncheck3">Is Recommend</label>
                </div>
               
            </div>
            
            <div class="row g-3">
                <div class="col-md-6">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select" id="brand" required name="brand_id">
                    <option value="">Choose...</option>
                    <?php if(is_array($brands)):?>
                        <?php foreach($brands as $brand):?>
                            <option value="<?=$brand->id?>"><?=$brand->name?></option>
                    <?php endforeach?>
                    <?php endif?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid brand.
                </div>
                </div>

                <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" required name="category_id">
                    <option value="">Choose...</option>
                    <?php if(is_array($categories)):?>
                        <?php foreach($categories as $category):?>
                            <option value="<?=$category->id?>"><?=$category->name?></option>
                    <?php endforeach?>
                    <?php endif?>
                </select>
                <div class="invalid-feedback">
                    Please provide a valid category.
                </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <label for="" class="form-label">Product description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>

            <div class="row g-3 mb-3">
                <input type="file" name="image" id="picture" accept="image/*">
                <label for="picture"><strong>Choose a file&hellip;</strong></label> 
            </div>
            
            <button type="submit" class="w-100 btn btn-primary btn-lg">Add New product</button>
        </form>
    </div>

</div>
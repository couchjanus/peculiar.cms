<h2><?=$title?></h2>

<form method="POST" action="">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Street&nbsp; </span>
  <input type="text" class="form-control"  name="street" value="<?=$data['street']?>" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Email&nbsp;&nbsp;  </span>
  <input class="form-control" type="email" name="email" value="<?=$data['email']?>" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </span>
  <input type="text" class="form-control"  name="city" value="<?=$data['city']?>" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Country</span>
  <input type="text" class="form-control"  name="country" value="<?=$data['country']?>" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Mobile&nbsp; </span>
  <input type="text" class="form-control" name="mobile" value="<?=$data['mobile']?>" aria-label="Username" aria-describedby="basic-addon1">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
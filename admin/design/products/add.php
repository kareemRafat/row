
<form method="post" action="functions/products/insert.php">
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input type="text" name="name" value="" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">price</label>
    <input type="number" name="price" value="" class="form-control" id="exampleInputEmail1" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">sale</label>
    <input type="number" name="sale" value="" class="form-control" id="exampleInputEmail1" >
  </div>
<div class="form-group">
    <label for="exampleInputEmail1">image</label>
    <input type="file" name="img" value="" class="form-control" id="exampleInputEmail1" >
  </div>
<br>

  <div class="form-group">
    <label for="exampleFormControlSelect1">category</label>
    <select name="cat_id" class="form-control" id="exampleFormControlSelect1">
    <?php 
    include "functions/connect.php";
    $selectCat = "SELECT * FROM categories";
    $queryCat = $conn->query($selectCat);
    foreach($queryCat as $category){
    ?>
      <option value="<?= $category['id'] ?>" ><?= $category['name'] ?></option>
    <?php     }  ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
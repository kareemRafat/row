
<a class="btn btn-primary" href="?action=add">Add product</a>
				<br>
				<br>
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>name</th>
							<th>price</th>
							<th>sale</th>
							<th>image</th>
							<th>category</th>
							<th>controlls</th>
						</tr>
					</thead>
					<tbody>
	<?php 

	include "functions/connect.php";
	$select = "SELECT * FROM products";
	$query = $conn->query($select);
	foreach($query as $product){
 ?>
						<tr>
							<td><?= $product['id'] ?></td>
							<td><?= $product['name'] ?></td>
							<td><?= $product['price'] ?></td>
							<td><?= $product['sale'] ?></td>
							<td><?= $product['img'] ?></td>
							<td><?php 

			$cat_id = $product['cat_id'] ;
			$selectCat = "SELECT * FROM categories WHERE id = $cat_id";
			$queryCat = $conn->query($selectCat);
			$category = $queryCat -> fetch_assoc();
			echo $category['name'];


							 ?></td>
							<td>
								<a class="btn btn-primary">Edit</a>
								<a class="btn btn-danger">Delete</a>

							</td>
						</tr>
		<?php } ?>
					</tbody>
				</table>
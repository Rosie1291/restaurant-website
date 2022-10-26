<?php

$page_title = 'Price Search';
include('includes/header.html');

require('../mysqli_connect.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = []; 

	if (empty($_POST['price'])) {
		$errors[] = 'You forgot to enter a price.';
	} else {
		$price = mysqli_real_escape_string($dbc, trim($_POST['price']));
	}
				
	$price = $_POST['price'];
	$query = "SELECT dish_name, price FROM dishes WHERE price >= $price ORDER BY price ASC";
	$result = @mysqli_query($dbc, $query); 

	if($result) {
		$num = mysqli_num_rows($result);
		if($num > 0) {}
		echo '<p>The menu items with price starting from $'.$price.' are:</p>'; 
	} else {// if it did not run ok
			echo '<p class="error">The current user could not be retrieved.</p>';
			echo '<p>' .mysqli_error($dbc). '<br><br>Query" '.$query. '</p>';
		
	}
	echo '<table width = 40% class="table">
	<thead>
	<tr>
		<th align="left"><strong>Menu Items</strong></th>
		<th align="left"><strong>Price</strong></th>

	</tr>
	</thead>
	<tbody>';

	$bg = 'lightgray';

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$bg = ($bg == 'lightgray' ? 'white' : 'lightgray'); 
		echo '<tr style="background-color:' .$bg.'">
			<td align="left">' . $row['dish_name'] . '</td>
			<td align="left">' . $row['price'] . '</td>
		</tr>';
	}
	echo '</tbody></table>';
    mysqli_free_result($result);
}

?>
<h1>Search for menu items</h1>
<form action="price.php" method="post">
	<p>Enter a price: <input type="number" step = "0.01" name="price" size="15" maxlength="20" placeholder="00.00" value="<?php if (isset($_POST['price']) && is_float($_POST['price'])) echo '\$ '.$_POST['price']; ?>"></p>
	<p><input type="submit" name="submit" value="Search"></p>
</form>
<?php include('includes/footer.html') ?>
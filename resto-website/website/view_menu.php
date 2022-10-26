<?php
$page_title = 'View Menu';
include('includes/header.html');
echo '<h1>LingLing Restaurant Menu</h1>';

require('../mysqli_connect.php');

$display = 10;

if(isset($_GET['pages']) && is_numeric($_GET['pages'])) {
	$pages = $_GET['pages'];
} else {
	$q = "SELECT COUNT(dish_id) FROM dishes";
	$r = @mysqli_query($dbc, $q);
	$row = @mysqli_fetch_array($r, MYSQLI_NUM); 
	$records = $row[0]; 
	if($records > $display) {
		$pages = ceil($records/$display);
	} else {
		$pages = 1;
	}
}
if(isset($_GET['start']) && is_numeric($_GET['start'])) {
	$start = $_GET['start'];
} else {
	$start = 0;
}

$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'dish_id';

switch($sort) {
	case 'dishnameasc':
		$order_by = 'dish_name ASC';
		break;
	case'priceasc':
		$order_by = 'price ASC';
		break;
	case 'spicyasc':
		$order_by = 'is_spicy ASC';
		break;
	case 'dishid':
		$dish_id = 'dish_id';
	default:
		$order_by = 'dish_id';
		$sort = 'dishid';
		break;
}

$query = "SELECT * FROM dishes ORDER BY $order_by LIMIT $start, $display";
$result = @mysqli_query($dbc, $query);

echo '<table width = 60% class="table">
<thead>
<tr>
	<th align="left"><strong><a href="view_menu.php?sort=dishidasc">No.</strong></th> 
	<th align="left"><strong><a href="view_menu.php?sort=dishnameasc">Menu Items</a></strong></th>
	<th align="left"><strong><a href="view_menu.php?sort=spicyasc">Spicy Level</a></strong></th>
	<th align="left"><strong><a href="view_menu.php?sort=priceasc">Price</a></strong></th>

</tr>
</thead>
<tbody>'; 

$bg = 'lightgray';

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$bg = ($bg == 'lightgray' ? 'white' : 'lightgray'); // if lightgray, change to white; if white, change to lightgray
	echo '<tr style="background-color:' .$bg.'">
		<td align="left">' . $row['dish_id'] . '</td>
		<td align="left">' . $row['dish_name'] . '</td>
		<td align="left">' . $row['is_spicy'] . '</td>
		<td align="left">' . $row['price'] . '</td>
	</tr>';
}
echo '</tbody></table>';
mysqli_free_result($result);
mysqli_close($dbc);

if($pages > 1) {
	echo '<br><p>';
	$current_page = ($start/$display) + 1;

	if($current_page != 1) {
		echo '<a href = "view_menu.php?start='.($start - $display).' &pages='.$pages.'&sort='.$sort.'">Previous</a> ';

	}
	for($index = 1; $index <= $pages; $index++) {
		if($index != $current_page) { // disable the clickable feature of the current page number
			echo '<a href="view_menu.php?start='.(($display * ($index -1))) .'&pages='.$pages.'&sort='.$sort.'"> '.$index.' </a> ';
		} else {
			echo $index.'';
		}
	}

	if($current_page != $pages) {
		echo '<a href="view_menu.php?start='.($start + $display) .'&pages='.$pages.'&sort='.$sort.'">Next</a> ';
	}
	echo '<p>';
}

include('includes/footer.html');
?>
<?php
$page_title = 'Register';
include('includes/header.html');
require('../mysqli_connect.php'); 

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	
	$errors = []; 

	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, htmlspecialchars($_POST['first_name']));
	}

	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, htmlspecialchars($_POST['last_name']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$email = mysqli_real_escape_string($dbc, htmlspecialchars($_POST['email']));
	}

	// Check for a phone number:
	if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone number.';
	} else {
		$phone = mysqli_real_escape_string($dbc, htmlspecialchars($_POST['phone']));
	}

	// Check for a favorite dish:
	if (empty($_POST['dish'])) {
		$errors[] = 'You forgot to select a favorite dish.';
	} else {
		$dish = mysqli_real_escape_string($dbc, htmlspecialchars($_POST['dish']));
	}

	if (empty($errors)) { // If everything's OK.

		// Register the customer in the database

		// Make the query:
		
		$q = "INSERT INTO customers (first_name, last_name, email, phone_num, dish_id) VALUES ('$fn', '$ln', '$email', '$phone', '$dish')";
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>Customer is now registered.</p>';

		} else { // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

		} // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include('includes/footer.html');
		exit();

	} else { // Report the errors.

		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p>';

	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>

<h1>Register</h1>
<form action="register.php" method="post">
	<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"></p>
	<p>Email Address: <input type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
	<p>Phone Number: <input type="number" name="phone" size="20" maxlength="30" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" ></p>
	<p>Select a favorite dish:
	<select name="dish">
    <?php
		$q_dish = "SELECT dish_id, dish_name FROM dishes";
		$r_dish = @mysqli_query($dbc, $q_dish);
    	while ($row = mysqli_fetch_array($r_dish, MYSQLI_ASSOC)) {
			echo '<option value=" '. $row['dish_id'] . '">' . $row['dish_name']. '</option>';
		}
    ?>
  	</select></p> 
	<p><input type="submit" name="submit" value="Confirm customer"></p>
</form>
<?php include('includes/footer.html');?>
<?php
  require_once("Database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marks/Docs Selection</title>
  <link rel="stylesheet" href="Styles/ViewChoice.css">
</head>
<body>
  <div class="container">
        <header>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <h1>TECHNO INTERNATIONAL NEWTOWN</h1>
            <div class="profile-icon" onclick="toggleProfile()">👤</div>
        </header>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="toggleMenu()">×</a>
            <ul>
                <li onclick="navigate('home')">Home</li>
                <li onclick="navigate('about')">About</li>
                <li onclick="navigate('help')">Help</li>
            </ul>
        </div>
        <div id="myProfileOptions" class="profile-options">
            <a href="javascript:void(0)" class="closebtn" onclick="toggleProfile()">×</a>
            <ul>
                <li onclick="navigate('profile')">Profile</li>
                <li onclick="navigate('signout')">Sign Out</li>
                <li onclick="navigate('notifications')">Notifications</li>
                <li onclick="navigate('settings')">Settings</li>
            </ul>
        </div>
		<main>
    		<h2>Hi! Admin</h2>
			<form action="choice.php", method="post">
				<label for="display">What do you want to display? </label>
				<select name="options" id="display" onchange="updateParameters()">
					<option value="">Select an option</option>
					<option value="marks">Marks</option>
					<option value="docs">Docs</option>
				</select><br>

				<label for="parameters">Parameters</label>
				<select name="parameters" id="parameters">
					<option value="">Select a parameter</option>
				</select><br>

				<label>Enter SID: </label>				
				<input type="text" class="input" name="SID" value="" placeholder="Enter SID value" /><br>

			<input type="submit" class="input-button" name="submit" value="Submit" onclick="handleSubmit()" required/><br>
			<!-- <input type="submit" class="input-button" name="back" value="Back" /> -->
			</form>
		</main>
		<footer>
            <p>
                <a href="https://tint.edu.in/">TINT Official Website</a> | 
                <a href="https://www.facebook.com/TINTOfficial">TINT Official Facebook Page</a>
            </p>
            <p>
                Techno International New Town (Formerly known as Techno India College of Technology)<br>
                BLOCK - DG 1/1, ACTION AREA 1 NEW TOWN, RAJARHAT, KOLKATA - 700156<br>
                Phone: +91-33-23242050<br>
                Email: info@tict.edu.in
            </p>
            <p>
                &copy; 2020 - Maintained by department of CSE, Techno International New Town
            </p>
        </footer>
	</div>
  <script>
    function updateParameters() {
      const display = document.getElementById("display").value;
      const parameters = document.getElementById("parameters");

      // Clear previous options
      parameters.innerHTML = '<option value="">Select a parameter</option>';

      if (display === "marks") {
        const options = ["CA Marks", "PCA Marks", "Semester wise Marks"];
        options.forEach(option => {
          const opt = document.createElement("option");
          opt.value = option.toLowerCase().replace(/\s+/g, '_');
          opt.textContent = option;
          parameters.appendChild(opt);
        });
      } else if (display === "docs") {
        const options = ["Admission Docs", "Sem Grade Docs", "Fees Docs"];
        options.forEach(option => {
          const opt = document.createElement("option");
          opt.value = option.toLowerCase().replace(/\s+/g, '_');
          opt.textContent = option;
          parameters.appendChild(opt);
        });
      }
    }

    function handleSubmit() {
      const display = document.getElementById("display").value;
      const parameters = document.getElementById("parameters").value;

      if (!display || !parameters) {
        alert("Please select one option from both !!!");
        return;
      }

      alert(`You selected: ${display} - ${parameters}`);

    }

    function toggleMenuDropdown() {
      const menuDropdown = document.getElementById("menuDropdown");
      menuDropdown.style.display = menuDropdown.style.display === "block" ? "none" : "block";
    }

    function toggleProfileDropdown() {
      const profileDropdown = document.getElementById("profileDropdown");
      profileDropdown.style.display = profileDropdown.style.display === "block" ? "none" : "block";
    }
  </script>
  <!-- <div class="footer">
    <p>Techno International New Town (Formerly known as Techno India College of Technology)<br>
      BLOCK - DG 1/1, ACTION AREA 1 NEW TOWN, RAJARHAT, KOLKATA - 700156<br>
      Phone: +91-33-23242050<br>
      Email: <a href="mailto:info@tict.edu.in">info@tict.edu.in</a></p>
    <p>&copy; 2020 - Maintained by the Department of CSE, Techno International New Town</p>
  </div>  -->
</body>
</html>
<?php
	// if($_SERVER["REQUEST_METHOD"] == "POST")
	// {
	// 	$SID = filter_input(INPUT_POST, "SID", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize SID
	// 	$Option = filter_input(INPUT_POST, "options", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize Options
	// 	$Parameter = filter_input(INPUT_POST, "parameters", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize parameters
	// 	$table = null;

	// 	if($Option == 'marks')
	// 	{
	// 		if($Parameter == 'CA Marks')
	// 		{
	// 			$table = 'internal_marks';
	// 		}
	// 	}
	// 	// $selected_option = $_POST['options']; // Get the selected value
	// 	// $sql = "SELECT * FROM $table WHERE SID = ?";
	// 	$stmt = $conn->prepare("SELECT * FROM ? WHERE SID = ?");
	// 	$stmt->bind_param("si", $table, $SID);
	// 	$stmt->execute();
	// 	$result = $stmt->get_result();
	// 	// $sql = "SELECT * FROM internal_marks WHERE SID = $SID";

	// 	// $result = mysqli_query($conn, $sql);

	// 	echo "<div class='container'><table class='table' broder='2'>";
	// 	echo "<tr><td>TIDINT</td><td>SID</td><td>SUBID</td><td>CA1</td><td>CA2</td><td>CA3</td><td>CA4</td></tr>";
	// 	while($row = mysqli_fetch_assoc($result))
	// 	{
	// 		echo "<tr><td>{$row['TIDINT']}</td><td>{$row['SID']}</td><td>{$row['SUBID']}</td><td>{$row['CA1']}</td><td>{$row['CA2']}</td><td>{$row['CA3']}</td><td>{$row['CA4']}</td></tr>";
	// 	}
	// 	echo "</table></div>";

	// }
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (isset($_POST['submit'])) 
		{
			$selected_option = $_POST['options']; // Get the selected value
			$SID = filter_input(INPUT_POST, "SID", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize username
			if(empty($SID))
			{
				exit;
			}
			$sql = "SELECT * FROM internal_marks WHERE SID = $SID";
			$result = mysqli_query($conn, $sql);
			if($selected_option == 'marks')
			{
				try{
					// $stmt = $conn->prepare("SELECT * FROM internal_marks WHERE SID = ?");
					// $stmt->bind_param("i", $SID);
					// $stmt->execute();
					// $result = $stmt->get_result();

					$sql = "SELECT * FROM internal_marks WHERE SID = $SID";
					$result = mysqli_query($conn, $sql);

					echo "<div name='base' class='container'><table>";
					echo "<tr><td>TIDINT</td><td>SID</td><td>SUBID</td><td>CA1</td><td>CA2</td><td>CA3</td><td>CA4</td></tr>";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr><td>{$row['TIDINT']}</td><td>{$row['SID']}</td><td>{$row['SUBID']}</td><td>{$row['CA1']}</td><td>{$row['CA2']}</td><td>{$row['CA3']}</td><td>{$row['CA4']}</td></tr>";
					}
					echo "</table>";
					// foreach($result as $row){
					// 	echo $row['column_name'];
					// }
					// if(mysqli_num_rows($result) > 0)
					// {
					// 	// print_r($result);
						
					// 	$row = mysqli_fetch_assoc($result);
						
					// 	echo $row["TIDINT"] . "<br>";
					// 	echo $row["SID"] . "<br>";
					// 	echo $row["SUBID"] . "<br>";
					// 	echo $row["CA1"] . "<br>";
					// 	echo $row["CA2"] . "<br>";
					// 	echo $row["CA3"] . "<br>";
					// 	echo $row["CA4"] . "<br>";
					// 	// header('location: marks.php');
					// 	exit;
					// }
					// else
					// {
					// 	echo "No data found";
					// }
					// header_remove();
					//header('location: view.php');
					// exit;

				}catch (Exception $e) {
					echo "$e";
				}
				// header_remove();
				// header('location: view.php');
				// exit;
			} 
			else 
			{
				echo "No option selected.";
			}
		}
		// elseif(isset($_POST['back']))
		// {
		// 	header('location: view.php');
		// }
	}
    mysqli_close($conn);
?>

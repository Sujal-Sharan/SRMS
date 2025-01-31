<?php
  include("Database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marks/Docs Selection</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #007bff;
      color: rgb(243, 246, 247);
      display: flex;
      height:8vh;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      position: relative;
    }

    .header .menu-icon,
    .header .profile-icon {
      font-size: 20px;
      cursor: pointer;
    }

    .header .title {
      font-size: 25px;
      font-weight: bold;
    }

    .menu-dropdown,
    .profile-dropdown {
      position: absolute;
      top: 50px;
      height:56vh;
      background-color: black;
      color: white;
      border: none;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: none;
      width: 200px;
    }

    .menu-dropdown {
      left: 20px;
    }

    .profile-dropdown {
      right: 20px;
    }

    .menu-dropdown a,
    .profile-dropdown a {
      display: block;
      padding: 15px;
      text-decoration: none;
      color: white;
      cursor: pointer;
    }

    .menu-dropdown a:hover,
    .profile-dropdown a:hover {
      background-color: #333;
    }

    .menu-dropdown .close,
    .profile-dropdown .close {
      text-align: right;
      font-weight: bold;
      cursor: pointer;
      padding: 10px;
      color: #007bff;
    }
    

    .container {
      background-color: white;
      padding: 35px;
      height: 75vh;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(148, 111, 111, 0.1);
      width: 350px;
      text-align: center;
      margin: 20px auto;
    }

    select, button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 3px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    .footer {
      background-color: #007bff;
      color: white;
      text-align: center;
      padding: 8px;
      position: fixed;
      bottom: 0;
      width: 100%;
      font-size: 16px;
    }

    .footer a {
      color: #ffcc00;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="menu-icon" onclick="toggleMenuDropdown()">☰</div>
    <div class="title">TECHNO INTERNATIONAL NEWTOWN</div>
    <div class="profile-icon" onclick="toggleProfileDropdown()">☺</div>

    <div class="menu-dropdown" id="menuDropdown">
      <div class="close" onclick="toggleMenuDropdown()">✖</div>
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Help</a>
    </div>

    <div class="profile-dropdown" id="profileDropdown">
      <div class="close" onclick="toggleProfileDropdown()">✖</div>
      <a href="#">Profile</a>
      <a href="#">Notifications</a>
      <a href="#">Settings</a>
      <a href="#">Sign Out</a>
    </div>
  </div>

  <div class="container">
    <h2>Hi! Admin</h2>

    <label for="display">What to display (Marks/Docs)</label>
    <select id="display" onchange="updateParameters(); document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
      <option value="">Select an option</option>
      <option value="marks">Marks</option>
      <option value="docs">Docs</option>
    </select>

    <label for="parameters">Parameters</label>
    <select id="parameters">
      <option value="">Select a parameter</option>
    </select>
    
    <input type="hidden" name="selected_text" id="selected_text" value="" />
    <input type="submit" name="search" value="Search"/>

    <!-- <label> TEST </label>
    <input type="text" name="abc"/> -->
    <!-- <button type="button" onclick="handleSubmit()">SUBMIT</button> -->
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

if(isset($_POST['search']))
{
  $makerValue = $_POST['Make']; // make value

  $maker = mysqli_real_escape_string($conn, $_POST['selected_text']); // get the selected text
  echo $maker;
}
 ?>

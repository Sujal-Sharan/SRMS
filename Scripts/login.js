var count = 2;

function validate() {
    var user = document.login.username.value;
    var password = document.login.password.value;
    var valid = false;
    var usernameArray = ["student"];
    var passwordArray = ["1234"];

    for (var i = 0; i < usernameArray.length; i++) {
        if (user == usernameArray[i] && password == passwordArray[i]) {
            valid = true;
            break;
        }
    }

    if (valid) {
        alert("Login was successful");
        window.location.href = "view.html"; // Redirect to view.html
        return false;
    }

    var again = "tries";
    if (count == 1) {
        again = "try";
    }
    if (count >= 1) {
        alert("Wrong password or username. You have " + count + " " + again + " left.");
        count--;
    } else {
        alert("You have exceeded the number of login attempts.");
        document.login.username.disabled = true;
        document.login.password.disabled = true;
        document.login.submit.disabled = true;
    }
}

function toggleMenu() {
    var sidebar = document.getElementById("mySidebar");
    if (sidebar.style.display === "block") {
        sidebar.style.display = "none";
    } else {
        sidebar.style.display = "block";
    }
}

function toggleProfile() {
    var profileOptions = document.getElementById("myProfileOptions");
    if (profileOptions.style.display === "block") {
        profileOptions.style.display = "none";
    } else {
        profileOptions.style.display = "block";
    }
}

function navigate(action) {
    alert(action + ' clicked');
}

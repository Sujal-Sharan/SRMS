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

// function viewAction() {
//     //window.location.href = "view2_3.php"; // Redirect to view2.html
//     //window.location.href = "http://localhost/Sem_Project/SRMS/view2_3.php";
//     window.location.href = "choice.php";

// }

// function updateAction() {
//     //alert('Update button clicked');
//     window.location.href = "choice.php";
// }

// function deleteAction() {
//     alert('Delete button clicked');
// }

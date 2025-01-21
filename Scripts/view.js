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

function viewAction() {
    window.location.href = "view2.html"; // Redirect to view2.html
}

function updateAction() {
    alert('Update button clicked');
}

function deleteAction() {
    alert('Delete button clicked');
}

function handleSubmit() {
    const display = document.getElementById('display').value;
    const parameters = document.getElementById('parameters').value;

    if (!display || !parameters) {
        alert('Please select all fields.');
        return;
    }

    alert(`Display: ${display}\nParameters: ${parameters}`);
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

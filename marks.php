<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record Management System</title>
    <link rel="stylesheet" href="Styles/marks.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">TECHNO INTERNATIONAL NEW TOWN</div>
            <ul class="nav-links">
                <li><a href="#welocme page">Welcome "Username"</a></li>
                <li><a href="#logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section id="CA MARKS" class="section">
            <h1>CA Mark's Details</h1>
            <div class="controls">
                <button class="btn">Edit</button>
            </div>
            <table class="records-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject name</th>
                        <th>Subject code</th>
                        <th>CA 1</th>
                        <th>CA 2</th>
                        <th>CA 3</th>
                        <th>CA 4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Computer Architecture</td>
                        <td>PCC-CS402</td>
                        <td>23</td>
                        <td>25</td>
                        <td>20</td>
                        <td>22</td>
                    </tr>
                </tbody>
            </table>


        <section id="profile" class="section">
            <h1>Your Profile</h1>
            <div class="profile-container">
                <p><strong>Name:</strong> Admin</p>
                <p><strong>Role:</strong> Administrator</p>
                <button class="btn">Edit Profile</button>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Student Record Management System. All Rights Reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

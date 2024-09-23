<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pass12344');
    define('DB_NAME', 'crs20204');
    $host = 'localhost';  // Your database host
    $dbname = DB_NAME;     // Using the defined constant for database name
    $username = DB_USERNAME; // Using the defined constant for username
    $password = DB_PASSWORD; // Using the defined constant for password

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT district_id, district_name FROM tbl_district2 WHERE region_id = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generate options for the select dropdown
    if ($result->num_rows > 0) {
        echo '<option value="" disabled selected>--Please select--</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . htmlspecialchars($row['district_id']) . '">' . htmlspecialchars($row['district_name']) . '</option>';
        }
        
    } else {
        echo '<option value="" disabled>District found for this category.</option>';
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo '<option value="" disabled>Invalid request method.</option>';
}


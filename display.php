<?php

require $_SERVER["DOCUMENT_ROOT"] . '/Baja_Reynaldo_Lab6/config/database.php';

include 'index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $formInfo = new FormInfoClass();

    $formInfo->setLastName($_POST["lastName"]);
    $formInfo->setFirstName($_POST["firstName"]);
    $formInfo->setMiddleInitial($_POST["middleInitial"]);
    $formInfo->setAge($_POST["age"]);
    $formInfo->setContactNo($_POST["contactNo"]);
    $formInfo->setEmail($_POST["email"]);
    $formInfo->setAddress($_POST["address"]);

    $email = $formInfo->getEmail();

    // Check if the email already exists
    $checkStmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // Email already exists, redirect with error
        $checkStmt->close();
        header("Location: index.php?error=Email Already Exist!");
        exit();
    }

    // Email doesn't exist, proceed with insertion
    $checkStmt->close();

    $lastname = $formInfo->getLastName();
    $firstname = $formInfo->getFirstName();
    $middleinitial = $formInfo->getMiddleInitial();
    $age = $formInfo->getAge();
    $contact = $formInfo->getContactNo();
    $address = $formInfo->getAddress();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (last_name, first_name, m_initial, age, contact, email, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $lastname, $firstname, $middleinitial, $age, $contact, $email, $address);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Display user data in a table
    $result = $conn->query("SELECT * FROM users");

    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h2>Users:</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Last Name</th>";
        echo "<th>First Name</th>";
        echo "<th>Middle Initial</th>";
        echo "<th>Age</th>";
        echo "<th>Contact No.</th>";
        echo "<th>E-mail</th>";
        echo "<th>Address</th>";
        echo "</tr>";

        $latestUser = null;

        while ($row = $result->fetch_assoc()) {
            $latestUser = $row;
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['m_initial'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        if ($latestUser) {
            echo "<div class='latest'>";
            echo "<h2>Your Information:</h2>";
            echo "<p>ID: " . $latestUser['id'] . "</p>";
            echo "<p>Last Name: " . $latestUser['last_name'] . "</p>";
            echo "<p>First Name: " . $latestUser['first_name'] . "</p>";
            echo "<p>Middle Initial: " . $latestUser['m_initial'] . "</p>";
            echo "<p>Age: " . $latestUser['age'] . "</p>";
            echo "<p>Contact No.: " . $latestUser['contact'] . "</p>";
            echo "<p>Email: " . $latestUser['email'] . "</p>";
            echo "<p>Address: " . $latestUser['address'] . "</p>";
            echo "</div>";
        }

        // Back button
        echo "<a href='index.php' class='back-button'>Back</a>";
        echo "</div>";
        
    } else {
        echo "No data available.";
    }

    // Close the result set
    $result->close();

    // Close the database connection
    $conn->close();
}
?>

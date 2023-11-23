<?php 

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

    echo "<div class='output'>";
    echo "<h2>Registration Form Output</h2>";
    echo "<p><strong>Last Name:</strong> " . $formInfo->getLastName() . "</p>";
    echo "<p><strong>First Name:</strong> " . $formInfo->getFirstName() . "</p>";
    echo "<p><strong>Middle Initial:</strong> " . $formInfo->getMiddleInitial() . "</p>";
    echo "<p><strong>Age:</strong> " . $formInfo->getAge() . "</p>";
    echo "<p><strong>Contact No.:</strong> " . $formInfo->getContactNo() . "</p>";
    echo "<p><strong>E-mail:</strong> " . $formInfo->getEmail() . "</p>";
    echo "<p><strong>Address:</strong> " . $formInfo->getAddress() . "</p>";
    echo "</div>";
}
?>

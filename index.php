<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form Output</title>

    <style>
        body {
            background-color: #ffebd8;
            font-family: "Arial", sans-serif;
            display: flex;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center vertically */
        }

        form {
            background-color: #ffc5c5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px;
            box-sizing: border-box; /* Include padding in width */
        }

        label {
            color: #89b9ad;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea {
            width: calc(100% - 16px); /* Adjusted width to account for padding */
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #c7dca7;
            border-radius: 5px;
            background-color: #ffebd8;
        }

        input[type="submit"] {
            background-color: #c7dca7;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #89b9ad;
        }

        h2, th {
            color: #89b9ad;
        }

        p.error {
            color: #ff0000;
            margin: 10px 0;
        }

        .table-container {
            max-height: 400px; /* Adjust this value as needed */
            overflow-y: auto;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #89b9ad;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #89b9ad;
            color: #fff;
        }

        .back-button {
            background-color: #c7dca7;
            color: #fff;
            cursor: pointer;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #89b9ad;
        }

        .output {
            text-align: center;
        }
    </style>

</head>
<body>
    <?php
    class FormInfoClass {
        private $lastName;
        private $firstName;
        private $middleInitial;
        private $age;
        private $contactNo;
        private $email;
        private $address;

        // Getter and Setter methods
        public function getLastName() {
            return $this->lastName;
        }

        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($firstName) {
            $this->firstName = $firstName;
        }

        public function getMiddleInitial() {
            return $this->middleInitial;
        }

        public function setMiddleInitial($middleInitial) {
            $this->middleInitial = $middleInitial;
        }

        public function getAge() {
            return $this->age;
        }

        public function setAge($age) {
            $this->age = $age;
        }

        public function getContactNo() {
            return $this->contactNo;
        }

        public function setContactNo($contactNo) {
            $this->contactNo = $contactNo;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getAddress() {
            return $this->address;
        }

        public function setAddress($address) {
            $this->address = $address;
        }
    }

    if (empty($_POST)) { ?>

    <div class="form-container">
        <h2>Online Registration Form:</h2>
        <form action="display.php" method="post">
            <label>Last Name *</label>
            <input type="text" name="lastName" required>

            <label>First Name *</label>
            <input type="text" name="firstName" required>

            <label>Middle Initial</label>
            <input type="text" name="middleInitial">

            <label>Age *</label>
            <input type="number" name="age" required>

            <label>Contact No. *</label>
            <input type="tel" name="contactNo" required>

            <label>E-mail *</label>
            <?php if (isset($_GET['error'])) { echo "<p class='error'>" . $_GET['error'] . "</p>"; } ?>
            <input type="email" name="email" required>

            <label>Address *</label>
            <textarea name="address" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    }    
    ?>
</body>
</html>

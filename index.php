<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form Output</title>
    <link rel="stylesheet" href="style.css">
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

    if (empty($_POST)) {
        include 'registration_form.php';
    }    
    ?>
</body>
</html>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Task-2</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    $nameErr = $emailErr = $doberr = $genderErr = $degreerr = $bloodErr = "";
    $name = $email = $dob = $gender = $degree = $blood = "";
    // name validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
        } else {
            $name = take_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only latters and space is allowed.";
            }
        }
    }

    // email validation
    if (empty($_POST['email'])) {
        $emailErr = "Email is Required";
    } else {
        $email = take_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid eamil Format";
        }
    }
    // dob validation
    if (empty($_POST['dob'])) {
        $doberr = "Data is REQUIRED";
    } else {
        $dob = take_input($_POST['dob']);
        $day = (int) substr($dob, -2);
        $m = (int) substr($dob, -5, -3);
        if ($day > 31 || $m > 12) {
            $doberr = "Invalid Date";
        }
    }

    // Gender validation
    if (empty($_POST["gen"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST["gen"];
        // echo "here is gender " . $gender . "<br>";
    }

    // Degree validation
    if (isset($_POST["degree"])) {
        if (count($_POST['degree']) < 2) {
            $degreerr = "Must be checked more then one";
        } else {
            $degree = "";
            $c = count($_POST['degree']);
            for ($i = 0; $i < $c - 1; $i++) {
                $degree .= ($_POST['degree'][$i] . ' and ');
            }
            $degree .= $_POST['degree'][$c - 1];
        }
    } else {
        $degreerr = "Degree must be filled up.";
    }

    // Bload Group validation
    if (empty($_POST['blood'])) {
        $bloodErr = "Blood Group is Required";
    } else {
        $blood = take_input($_POST['blood']);
    }


    // cleaning the input
    function take_input($d)
    {
        $d = trim($d);
        $d = stripcslashes($d);
        $d = htmlspecialchars($d);
        return $d;
    }
    ?>


    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>Your Name: </p>
        <input type="text" name="name" id="name">
        <span class="error">*
            <?php echo $nameErr; ?>
        </span>

        <p>Your Email: </p>
        <input type="text" name="email" id="email">
        <span class="error">*
            <?php echo $emailErr; ?>
        </span>

        <p>Date of Birth </p>
        <input type="date" name="dob" id="dob">
        <span class="error">*
            <?php echo $doberr; ?>
        </span>

        <p>Gender </p>
        <input type="radio" name="gen" id="male" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gen" id="female" value="female">
        <label for="female">Female</label>
        <input type="radio" name="gen" id="other" value="other">
        <label for="other">Other</label>
        <span class="error">*
            <?php echo $genderErr; ?>
        </span>

        <p>Degree</p>
        <input type="checkbox" name="degree[]" id="ssc" value="ssc">
        <label for="ssc">SSC</label>

        <input type="checkbox" name="degree[]" id="hsc" value="hsc">
        <label for="hsc">HSC</label>

        <input type="checkbox" name="degree[]" id="bsc" value="bsc">
        <label for="bsc">BSc</label>
        <input type="checkbox" name="degree[]" id="msc" value="msc">
        <label for="msc">MSc</label>
        <span class="error">*
            <?php echo $degreerr; ?>
        </span>
        <br>

        <p>Blood Group</p>
        <Select name="blood" id="blood">
            <option value="none" selected disabled hidden>Seclect Blood Group</option>
            <option value="A+">A+(+ev)</option>
            <option value="A-">A(-neg)</option>
            <option value="B+">B(+ev)</option>
            <option value="B-">B(-neg)</option>
            <option value="AB+">AB(+ev)</option>
            <option value="AB-">AB-(neg)</option>
            <option value="O+">O(+ev)</option>
            <option value="O-">O-(neg)</option>
        </Select>
        <span class="error">*
            <?php echo $bloodErr; ?>
        </span>
        <br>
        <input type="submit" value="submit">
    </form>




    <!-- Showing the inputs -->
    <?php
    // Showing the data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h1> Inputed Value </h1>";
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        // echo "DOB: " . $dob . " " . gettype($dob) . " " . $dob[5] . "<br>";
        echo "DOB: " . $dob . " " . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Degree: " . $degree . "<br>";
        echo "Blood group: " . $blood . "<br>";

        // Next file handling. opne read, creating, handling
        // next weak theory: Quiz-1
    }


    ?>
</body>

</html>
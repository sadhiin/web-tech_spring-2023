<!DOCTYPE html>
<html>

<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        You Name: <input type="text" name="stname">
        <br>
        <br>
        AIUB ID: <input type="text" name="stid">
        <br>
        <p>Select you Department:</p>
        <input type="radio" name="dept" id="cse" value="CSE">
        <label for="cse">CSE</label><br>
        <input type="radio" name="dept" id="eee" value="EEE">
        <label for="eee">EEE</label><br>
        <input type="radio" name="dept" id="law" value="Law">
        <label for="law">Law</label><br>
        <input type="radio" name="dept" id="bba" value="BBA">
        <label for="bba">BBA</label><br>
        <input type="radio" name="dept" id="eng" value="English">
        <label for="eng">English</label><br>

        <p>Vehicle to park: </p>
        <Select name="vehicle" id="vehicle">
            <option value="bike">Motor-Bike</option>
            <option value="car">Car</option>
            <option value="bicycle">Bicycle</option>
        </Select>

        <br>
        <p>Timeing</p>
        <input type="checkbox" name="time" id="morning-first" value="morning-first">
        <label for="morning-first">Morning-first 7:45am-10am</label><br>

        <input type="checkbox" name="time" id="morning-sec" value="morning-sec">
        <label for="morning-sec">Morning-Second 10:10am-11:59am</label><br>

        <input type="checkbox" name="time" id="afternoon" value="afternoon">
        <label for="afternoon">Nonne 10:10am-11:59am</label><br>

        <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Additional Message
        "></textarea>
        <br>
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = htmlspecialchars($_POST['stname']);
        $id = $_POST['stid'];
        $dept = $_POST['dept'];
        $vehicle = $_POST['vehicle'];
        $slot = $_POST['time'];
        $msg = $_POST['msg'];

        if (empty($name) && empty($id)) {
            echo "Empty responce is not valid.";
        } else {
            echo "Student name:" . $name . "<br>";
            echo "Student ID:" . $id. "<br>";
            echo "Department :" . $dept. "<br>";
            echo "Parking Vehicle: " . $vehicle. "<br>";
            echo "Prefered time: " . $slot. "<br>";
            echo "Addition message: \n" . $msg. "<br>";
        }
    }
    ?>

</body>

</html>
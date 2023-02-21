<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <style>
        .profile {
            width: 500px;
            height: 500px;
            border-radius: 19px;
            margin-top: 40px;
            margin-left: 30%;
            background-color: cornflowerblue;
        }

        .picture {

            margin-left: 30%;
            border: 2px solid tomato;
        }

        .picture img {
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>

    <!-- php file handling -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetdir = "img/";
        $target_file = $targetdir . basename($_FILES["filetoup"]["name"]); // creating the filename along with directory name
        $isUploded = false;
        // checking the file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // storing the file extention.

        // check if iamge file is a actual image to not
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["filetoup"]["tmp_name"]);
            // fucntiong will return true if the uploaded file is image only.
            if ($check == true) {
                echo "File is an image : " . $check["mime"] . "<br>";
                $isUploded = true;
            } else {
                echo "<br> <b>Uploaded file not an Image.</b>";
                $isUploded = false;
            }
        }

        // chekc if the file already exits
        if (file_exists(($target_file))) {
            echo "<b>Sorry file is already exists</b>";
            $isUploded = false;
        }

        // check file size
        if ($_FILES["filetoup"]["size"] > 1000000) {
            echo "file is more then 10MB.";
            $isUploded = false;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "<b>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</b>";
            $isUploded = false;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($isUploded == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["filetoup"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["filetoup"]["name"])) . " has been uploaded successfully.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>

    <!-- file to upload -->

    <div class="profile">
    <?php
        $filename = "./img/profile1.png";
        if($_SERVER["REQUEST_METHOD"] == "POST" && $isUploded == true){
            $filename = $target_file;
        }
    ?>
        <span class="picture">
            <img src= <?php echo $filename; ?> alt="profile picture">
        </span>
        <div class="changeprofile">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <p>Select image to upload: </p>
                <input type="file" name="filetoup" id="filetoup">
                <input type="submit" value="Upload image" name="submit">
            </form>
        </div>
    </div>

</body>

</html>
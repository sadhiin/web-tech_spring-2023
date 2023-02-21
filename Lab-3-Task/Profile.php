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

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetdir = "img";
        $target_file = $targetdir . basename($_FILES["filetoup"]["name"]);
        $uploded = false;

        $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // check if iamge file is a actual image to not
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["filetoup"]["name"]);
            if ($check == true) {
                echo "File is an image : " . $check["mime"] . "<br>";
                $uploded = true;
            } else {
                echo "File is not image.";
                $uploded = false;
            }
        }

        // chekc if the file already exits
        if (file_exists(($target_file))) {
            echo "Sorry file is already exists";
            $uploded = false;
        }

        // check file size
        if ($_FILES["filetoup"]["size"] > 500000) {
            echo "file is more then 5MB.";
            $uploded = false;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }


    ?>
    <div class="profile">

        <span class="picture">
            <img src="./img/profile1.png" alt="profile picture">
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
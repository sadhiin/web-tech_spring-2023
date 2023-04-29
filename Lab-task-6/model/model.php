<?php
include_once ("db.php");

function getAllUsers()
{
    $conn = db_connection();

    $selectQuery = "SELECT * FROM lab6";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function createUser($data)
{
    $conn = db_connection();

    $inserQuery = "INSERT into lab6 (name, username, email, pass, gender, dob, img_path)  VALUES (:name, :username, :email, :pass, :gender, :dob, :img_path)";

    try {
        $stmt = $conn->prepare($inserQuery);
        $stmt->execute([
            ':name' => $data['name'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':pass' => $data['password'],
            ':gender' => $data['gender'],
            ':dob' => $data['dob'],
            ':img_path' => $data['image']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die("error in inserting new user");
    }

    $conn = null;
    return true;
}

function getUserbyUsename($username)
{
    $conn = db_connection();

    $selectQuery = "SELECT * FROM lab6 WHERE username = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $rows;
}

function changePassword($username, $newpass){
    $conn = db_connection();
    $UpdateQuery = "UPDATE lab6 SET pass = ? WHERE username = ?";
    try{
        $stmt = $conn->prepare($UpdateQuery);
        $stmt->execute([$newpass, $username]);
    }catch(PDOException $e){
        echo $e->getMessage();
        die("error in update password function");
    }
    $conn = null;
    return true;
}

function updateImage($username, $newimg){
    $conn = db_connection();
    $UpdateQuery = "UPDATE lab6 SET img_path = ? WHERE username = ?";
    try{
        $stmt = $conn->prepare($UpdateQuery);
        $stmt->execute([
            $newimg, $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
        die("error in change image function ");
    }
    $conn = null;
    return true;
}

function updateProfile($data){
    $conn = db_conn();
    $EditProfileQuery = "UPDATE lab6 SET name=?,  email=?, pass=?, gender=?, dob=? WHERE username=?";
    try{
        $stmt = $conn->prepare($EditProfileQuery);
        $stmt->execute([
        	$data['name'], $data['email'], $data['gender'], $data['dob'], $data['usrname']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}
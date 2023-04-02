<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script>
    function validateForm() {
      let x = document.getElementById("name").value;
      let y = document.getElementById("password").value;
      let ret = true;
      if (x == "") {
        document.getElementById("nameErr").innerHTML = "Name is required";
        document.getElementById("name").style.borderColor = "red";
        ret = false;
      }
      // else {
      //   document.getElementById("nameErr").innerHTML = x;
      //   document.getElementById("name").style.borderColor = "black";
      // }

      if (y == "") {
        document.getElementById("passErr").innerHTML = "Password can't be blank";
        document.getElementById("password").style.borderColor = 'red';
        ret = false;
      }
      // else{
      //   document.getElementById("passE")
      // }
      return ret;
    }
  </script>
</head>

<body>
  <form name="myForm" onsubmit="return validateForm()" method="post">
    Name: <input id="name" type="text" name="fname">
    <br>
    <span id="nameErr"></span>
    <br>
    Password: <input id="password" type="password" name="password">
    <br>
    <span id="passErr"></span><br>
    <input type="submit" value="Register">
  </form>

</body>

</html>
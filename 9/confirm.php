<?php
if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $namelen = strlen($name);
    $emaillen = strlen($email);
    $max = 255;
    $minname = 2;
    $minemail = 3;

    if($namelen < $minname){
        $errors[] = "name must be at least 2 characters";
    } elseif($namelen > $max){
        $errors[] = "name must be less than 255 characters";
    }

    if($emaillen < $minemail){
        $errors[] = "email must be at least 3 characters";
    } elseif($emaillen > $max){
        $errors[] = "email must be less than 255 characters";
    }

    if(empty($name)){
        $errors[] = "name is required";
    }

    if(empty($email)){
        $errors[] = "email cannot be left empty";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "invalid email";
    }

    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";

}
?>
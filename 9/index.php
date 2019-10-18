
<?php
if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $namelen = strlen($name);
    $emaillen = strlen($email);
    $max = 255;
    $minname = 3;
    $minemail = 3;


    if (ctype_alpha(str_replace(' ', '', $name)) === false) {
        $errors[] = 'Name must contain letters and spaces only';
      }
    elseif($namelen < $minname){
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
    if(empty($dob)){
        $errors[] = "email cannot be left empty";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "invalid email";
    }
     if(empty($errors))
     {
         echo"Done!";
     }
     else{
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";

}}
?>

<form method="post" action="index.php">
Name:<input type="text" name="name" /><br>
email:<input type="text" name="email" /><br>
DOB:<input type="date" name="dob" /><br>
<input type="submit" value="submit" />
</form>
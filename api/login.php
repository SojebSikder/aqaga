<?php
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";

$db = new Database();

//login.php

session_start();

$form_data = json_decode(file_get_contents("php://input"));

$validation_error = '';

if(empty($form_data->email)){
    $error[] = 'Email is Required';
}
else{
/*
    if(!filter_var($form_data->email, FILTER_VALIDATE_EMAIL)){
        $error[] = 'Invalid Email Format';
    }
    else{
        $email = $form_data->email;
    }
    */

    $email = Format::Stext($form_data->email);
}

if(empty($form_data->password)){
    $error[] = 'Password is Required';
}

if(empty($error)){

 $query = "SELECT * FROM users WHERE user_email = '$email' OR user_name='$email' ";

 $statement = $db->select($query);

    if($statement){
        
        $result = $statement;
//rowCount() 
        if(mysqli_num_rows($statement) > 0){
            foreach($result as $row){

                if(password_verify(Format::Stext($form_data->password), $row["user_pass"])){
                    
                    $_SESSION['name'] = $row["user_name"];
                    $_SESSION['id'] = $row["user_id"];
                    $_SESSION['email'] = $row["user_email"];

                    //$validation_error = 'Login Successfully';
                }
                else{
                    $validation_error = 'Wrong Password';
                }
            }
        }
        else{
            $validation_error = 'Wrong Email';
        }
    }else{
        $validation_error = 'Wrong Email';
    }
}
else{
    $validation_error = implode(", ", $error);
}

$output = array(
    'error' => $validation_error
);

echo json_encode($output);

?>
<?php
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";

$db = new Database();

//$sql = "INSERT INTO register(user_name, user_login, user_pass, display_name, user_email, type) 
    //VALUES()";

    $form_data = json_decode(file_get_contents("php://input"));

    $message = '';
    $validation_error = '';
    
    if(empty($form_data->name)){
        $error[] = 'Name is Required';
    }
    else{
        $name = $form_data->name;
    }
    
    if(empty($form_data->email)){
        $error[] = 'Email is Required';
    }
    else{
    
        if(!filter_var($form_data->email, FILTER_VALIDATE_EMAIL)){
            $error[] = 'Invalid Email Format';
        }
        else{
            $email = $form_data->email;
        }
    }
    
    if(empty($form_data->password)){
        $error[] = 'Password is Required';
    }
    else{
        $password = password_hash($form_data->password, PASSWORD_DEFAULT);
    }
    
    if(empty($error)){
        $userID = uniqid(true);

        $img = "assets/images/default/avatar.png";
    
        $query = "INSERT INTO users (user_name, user_id, user_login, display_name, user_email, user_pass, profile_image) 
            VALUES ('$name', '$userID', '$email', '$name', '$email', '$password', '$img')";
        $statement = $db->insert($query);
    
        if($statement){
            $message = 'Registration Completed';
        }
    }
    else{
        $validation_error = implode(", ", $error);
    }
    
    $output = array(
     'error'  => $validation_error,
     'message' => $message
    );
    
    echo json_encode($output);

?>
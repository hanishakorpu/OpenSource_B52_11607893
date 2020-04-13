<?php

$conn = mysqli_connect('localhost','root',''/*put your fb password here*/);

        if(!$conn)
        {
            echo 'Connection error: '.mysqli_connect_error();
        }
        else
        {
            echo 'Connected to SQL Database';
            if(mysqli_select_db($conn,'new_db'))
            {
                echo ' & using new_db';
            } 
        }

    #print_r($_POST);

    //define empty variable
    $name_error = $email_error = $phone_error = "";
    $name = $email = $phone = $message = $gender = $success = $gender_prefix = "";

    //form is submitted with post method
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["name"]))
        {
            $name_error = "Name is required";
        }
        else
        {
            $name = test_input($_POST["name"]);

            //Name validation
            if(!preg_match("/^[a-zA-Z ]*$/",$name))
            {
                $name_error = "Only letter and white space allowed";
            }
        }

        if(empty($_POST["email"]))
        {
            $email_error = "Email is required";
        }
        else
        {
            $email = test_input($_POST["email"]);

            //Email validation
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $email_error = "Invalid email format";
            }
        }
        

        if(empty($_POST["phone"]))
        {
            $phone_error = "Phone number is required";
        }
        else
        {
            $phone = test_input($_POST["phone"]);

            //phone validation
            if(!preg_match("/^(\d[\s-]?)?[\(\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone))
            {
                $phone_error = "Invalid phone number";
            }
        }


        $gender = $_POST["gender"];

        if($gender == "Male")
            $gender_prefix = "Mr.";
        if($gender == "Female")
            $gender_prefix = "Ms.";
        if($gender == "Other")
            $gender_prefix = "";

        if($name_error == '' and $phone_error == '' and $email_error == '')
        {

            $sql = "insert into new_db VALUES ('$name','$email','$phone','$gender_prefix')";
            
            if(mysqli_query($conn,$sql))
            {
                echo 'Data insertion query is successful';
            }
            else
            {
                echo 'Data insertion failed, ' . mysqli_error($conn);
            }
        }

    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
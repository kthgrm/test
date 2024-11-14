<?php

    require '../config/function.php';
 
    if(isset($_POST['addTenant'])){
        $fname = validate($_POST['fname']);
        $mname = validate($_POST['mname']);
        $lname = validate($_POST['lname']);
        $contact = validate($_POST['contact']);
        $email = validate($_POST['email']);
        $unit = validate($_POST['unit']);
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        if(empty($fname) || empty($lname) || empty($contact) || empty($email) || empty($unit) || empty($username) || empty($password)){
            redirect("tenant-add.php", "Please fill all the input fields.");
        }else{
            $query1 = "INSERT INTO user (username, password, type)
                        VALUES ('$username', '$password', 'tenant')";
            
            $result1 = mysqli_query($con, $query1);
            

            if($result1){
                $userID = mysqli_insert_id($con);
                $query2 = "INSERT INTO tenant (tenantID, fname, mname, lname, contact, email, unitID)
                        VALUES ('$userID', '$fname', '$mname', '$lname', '$contact', '$email', '$unit')";
                $result2 = mysqli_query($con, $query2);
                if($result2){
                    redirect("tenant.php", "Tenant added successfully.");
                }else{
                    redirect("tenant-add.php", "Username should be unique.");
                }
            }else{
                redirect("tenant-add.php", "Failed to add tenant.");
            }
        }
    }

?>
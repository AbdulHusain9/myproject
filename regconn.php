    <?php

        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $dob=$_POST['dob'];
        $password=$_POST['password'];
        $country=$_POST['country'];
        $contact=$_POST['contact'];
        $faname=$_POST['faname'];
        $moname=$_POST['moname'];
        $pemail=$_POST['pemail'];
        $occup=$_POST['occup'];
        $address=$_POST['address'];
        $pcontact=$_POST['pcontact'];
        $coursename=$_POST['coursename'];
        $sem=$_POST['sem'];
        $collagename=$_POST['collagename'];
        $admissionyear=$_POST['admissionyear'];
        $doj=$_POST['doj'];
    
    

    if(!empty($fname) || !empty($mname) || !empty($lname) || !empty($gender) || !empty($email) || !empty($dob) || !empty($password) || !empty($country) || !empty($contact) || !empty($faname) || !empty($moname) || !empty($pemail) || !empty($occup) || !empty($address) || !empty($pcontact) || !empty($sem) || !empty($coursename) || !empty($collagename) || !empty($admissionyear) || !empty($doj)){

        $host="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="register";
        $db="login";

        //create connection 
        $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

        if(mysqli_connect_error()){

            die('connect Erorr('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{

            $SELECT = "SELECT email From studentinfo where email =? limit 1 ";
            $INSERT = "INSERT INTO  studentinfo(fname,mname,lname,gender,email,dob,password,country,contact,faname,moname,pemail,occup,address,pcontact,coursename,sem,collagename,admissionyear,doj) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
           

            //prepare statement 
            $stmt =$conn->prepare($SELECT);
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum=$stmt->num_rows;

            if ($rnum==0) {
                

                $stmt->close();

                $stmt= $conn->prepare($INSERT);
                
                $stmt->bind_param("ssssssssssssssssssss", $fname , $mname , $lname , $gender , $email , $dob , $password , $country , $contact , $faname , $moname , $pemail , $occup , $address , $pcontact , $coursename , $sem , $collagename , $admissionyear , $doj );

                $stmt->execute();
                
                echo "New Record Inserted Succussfully";
                header("Location: http://localhost/test/data_report.php");
            }else{ 
                $message='Someone else have registered with the same Email ID .. Try Again With Your E-mail Id :)';
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            exit();
                            
            }
            $stmt->close();
            $conn->close();

         
        }
    }else{

        echo "All Field are required";
        die();
    }
                   
    
   
                    
?>
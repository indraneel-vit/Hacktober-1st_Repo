<!DOCTYPE html>  
<html>  
    <head> 
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>20BCE1397 - Priyanshu Singh</title> 
            <style>
            body{
                background-color: lightskyblue;
            }
            .title_wrapper{
                    font-size: 20px;
                    font-weight: bold;
                    text-align: center;
                    border:4px solid black;
                    width: 600px;
                    margin-left: 400px;
                    padding: 5px;
                    border-radius: 30px;
                    background-color: white;
                    box-shadow: 5px 8px grey;
                    
            }

            .form_wrapper{
                border: 3px solid black;
                padding: 20px;
                font-size: 20px;
                font-weight: bold;
                width: 1200px;
                margin-left: 160px;
                border-radius: 50px;
                background-color: white;
                box-shadow: 8px 12px grey;
            }

            .content_wrapper{
                margin-left: 15em;
                
            }

            .button_wrapper{
                margin-left: 300px;

            }

            #submit{
                padding: 10px;
                font-size: 20px;
                font-weight: bold;
                padding: 15px;
                background-color: lightslategray;
                border-radius: 30px;
                box-shadow: 4px 6px lightblue;
            }

            #submit:hover{
                background-color: white;
            }
            .error {
                    color: #FF0001;}  
            </style>  
    </head>  
    <body>    
    
        <?php  
        // define variables to empty values  
        $nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = $yearErr = $depErr =  $insErr = $add = $dobErr=$paperErr =  "";  
        $name = $email = $mobileno = $gender = $website = $agree = $year = $dep = $ins = $addErr = $dob = $paper = "" ;  
        
        //Input fields validation  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {  
            
        //String Validation  
            if (empty($_POST["name"])) {  
                $nameErr = "Name is required";  
            } else {  
                $name = input_data($_POST["name"]);  
                    // check if name only contains letters and whitespace  
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                        $nameErr = "Only alphabets and white space are allowed";  
                    }  
            } 
            
            //Year Validation
            if (empty($_POST["year"])) {  
                $yearErr = "Year is required";  
                } else {  
                        $year = input_data($_POST["year"]);  
                        // check if mobile no is well-formed  
                        if (!preg_match ("/^[0-9]*$/", $year) ) {  
                        $yearErr = "Only numeric value is allowed.";  
                        } 
            
                

                //check mobile no length should not be less and greator than 10  
                if (strlen ($year) != 4) {  
                        $yearErr = "Invalid Year!";  
                        }  
                } 

                //Department Validation
                if (empty($_POST["dep"])) {  
                        $depErr = "Department is required";  
                } else {  
                    $dep = input_data($_POST["dep"]);  
                        // check if dep only contains letters and whitespace  
                        if (!preg_match("/^[a-zA-Z ]*$/",$dep)) {  
                            $depErr = "Only alphabets and white space are allowed";  
                        }  
                } 

                //Institution Name Validation
                if (empty($_POST["ins"])) {  
                        $insErr = "Institution name is required";  
                } else {  
                    $ins = input_data($_POST["ins"]);  
                        // check if ins only contains letters and whitespace  
                        if (!preg_match("/^[a-zA-Z ]*$/",$ins)) {  
                            $insErr = "Only alphabets and white space are allowed";  
                        }  
                } 

                //Address Validation
                if (empty($_POST["add"])) {  
                        $addErr = "Address is required";  
                } else {  
                    $add = input_data($_POST["add"]);  
                        // check if add only contaadd letters and whitespace  
                        if (!preg_match("/^[a-zA-Z ]*$/",$add)) {  
                            $addErr = "Only alphabets and white space are allowed";  
                        }  
                } 

            
            //Email Validation   
            if (empty($_POST["email"])) {  
                    $emailErr = "Email is required";  
            } else {  
                    $email = input_data($_POST["email"]);  
                    // check that the e-mail address is well-formed  
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                        $emailErr = "Invalid email format";  
                    }  
            }  
            
            //Number Validation  
            if (empty($_POST["mobileno"])) {  
                    $mobilenoErr = "Mobile no is required";  
            } else {  
                    $mobileno = input_data($_POST["mobileno"]);  
                    // check if mobile no is well-formed  
                    if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
                    $mobilenoErr = "Only numeric value is allowed.";  
                    }  
                //check mobile no length should not be less and greator than 10  
                if (strlen ($mobileno) != 10) {  
                    $mobilenoErr = "Mobile no must contain 10 digits.";  
                    }  
            }  
            
            //URL Validation      
            if (empty($_POST["website"])) {  
                $website = "";  
            } else {  
                    $website = input_data($_POST["website"]);  
                    // check if URL address syntax is valid  
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {  
                        $websiteErr = "Invalid URL";  
                    }      
            }  
            
            //Empty Field Validation  
            if (empty($_POST["gender"])) {  
                    $genderErr = "Domain is required";  
            } else {  
                    $gender = input_data($_POST["gender"]);  
            }
            
            if (empty($_POST["paper"])) {  
                $paperErr = "Paper Title is required";  
                } else {  
            $paper = input_data($_POST["paper"]);  
                // check if paper only containsletters and whitespace  
                if (!preg_match("/^[a-zA-Z ]*$/",$paper)) {  
                    $paperErr = "Only alphabets and white space are allowed";  
                }  
                } 
        
            //Checkbox Validation  
            if (!isset($_POST['agree'])){  
                    $agreeErr = "After entering the data. Click on Submit Button";  
            } else {  
                    $agree = input_data($_POST["agree"]);  
            }  
        }  
        function input_data($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
        }  
        ?>  
        
        <div class="title_wrapper">
                <h2>Student Registration Form</h2>
                <span class = "error">* required field </span> 
        </div>

        
        <br><br>  
        <div class="form_wrapper">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
                <div class="content_wrapper">
                    Name:   
                    <input type="text" name="name">  
                    <span class="error">* <?php echo $nameErr; ?> </span>  
                    <br><br> 
                    Year:   
                    <input type="text" name="year">  
                    <span class="error">* <?php echo $yearErr; ?> </span>  
                    <br><br> 
                    Department:   
                    <input type="text" name="dep">  
                    <span class="error">* <?php echo $depErr; ?> </span>  
                    <br><br> 
                    Institute Name:   
                    <input type="text" name="ins">  
                    <span class="error">* <?php echo $insErr; ?> </span>  
                    <br><br> 
                    Address:   
                    <textarea name="add" rows="4" cols="50"></textarea>
                    <span class="error">* <?php echo $addErr; ?> </span>  
                    <br><br>  
                    E-mail:   
                    <input type="text" name="email">  
                    <span class="error">* <?php echo $emailErr; ?> </span>  
                    <br><br>  
                    Mobile No:   
                    <input type="text" name="mobileno">  
                    <span class="error">* <?php echo $mobilenoErr; ?> </span>  
                    <br><br>  
                    DOB:
                    <input type="date" name="dob">  
                    <span class="error">* <?php echo $dobErr; ?> </span>  
                    <br><br>  
                    Domain Of Networks:  
                    <input type="radio" name="gender" value="Networks"> Networks 
                    <input type="radio" name="gender" value="Software Engineering"> Software Engineering
                    <input type="radio" name="gender" value="Cyber Physical System"> Cyber Physical System  
                    <span class="error">* <?php echo $genderErr; ?> </span>  
                    <br><br>  
                    Paper Title:   
                    <input type="text" name="paper">  
                    <span class="error">* <?php echo $paperErr; ?> </span>  
                    <br><br> 
                    Agree to Terms of Service:  
                    <input type="checkbox" name="agree">  
                    <span class="error">* <?php echo $agreeErr; ?> </span>  
                    <br><br>                            
                    <div class="button_wrapper">
                        <input type="submit" name="submit" value="Submit" id="submit">
                    </div>   
                    <br><br>  
                </div>                           
            </form> 
        </div>
        
        <?php  
            if(isset($_POST['submit'])) {  
            if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $websiteErr == "" && $agreeErr == "") {  
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>You have been sucessfully registered!!</b> </h3>";  
                echo "<h2>Your Details are:</h2>";  
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Name: .$name </b> </h3>";
                echo "<br>"; 
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Year: .$year</b> </h3>" ; 
                echo "<br>";  
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Department: .$dep </b> </h3>" ;  
                echo "<br>";
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Institution Name: .$ins</b> </h3>" ;  
                echo "<br>";
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Address: .$add</b> </h3>" ;  
                echo "<br>";
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Email: .$email</b> </h3>" ;  
                echo "<br>";  
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Mobile No: .$mobileno</b> </h3>" ;  
                echo "<br>";  
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>DOB: .$dob</b> </h3>" ;  
                echo "<br>";  
                echo "<h3 style='color:#1357a6; text-align:center;margin-top:50px; font-size:25px'> <b>Domain: .$gender</b> </h3>" ;  
            } else {  
                echo "<h3 style='color:red; text-align:center;margin-top:50px; font-size:25px'><b>Please fill the form correctly!</b></h3>";  
            }  
            }  
        ?>  
    </body>  
</html>  
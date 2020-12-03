<?php include('php/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>

<script>


function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


function validateForm() {

     
    var name = document.contactForm.name.value;
    var email = document.contactForm.email.value;
    var mobile = document.contactForm.mobile.value;
    var country = document.contactForm.country.value;
    var gender = document.contactForm.gender.value;
  
 
    

    
	
    var nameErr = emailErr = mobileErr = countryErr = genderErr = true;
    
    

    if(name == "") {
        printError("nameErr", "Please enter your name");
    } 

else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
        } 

else {
            printError("nameErr", "");
            nameErr = false;
        }
    }
    
    

    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } 

else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        }

 else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    
    if(mobile == "") {
        printError("mobileErr", "Please enter your mobile number");
    } 

else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(mobile) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } 

else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    
    
    if(country == "Select") {
        printError("countryErr", "Please select your country");
    } else {
        printError("countryErr", "");
        countryErr = false;
    }
    
    
    if(gender == "") {
        printError("genderErr", "Please select your gender");
    }

 else {
        printError("genderErr", "");
        genderErr = false;
    }
    
    
    if((nameErr || emailErr || mobileErr || countryErr || genderErr) == true) {
       return false;
    } 


else {
        
        var dataPreview = "You've entered the following details: \n" +
                          "Full Name: " + name + "\n" +
                          "Email Address: " + email + "\n" +
                          "Mobile Number: " + mobile + "\n" +
                          "Country: " + country + "\n" +
                          "Gender: " + gender + "\n";
       

        
        alert(dataPreview);
    }
};
</script>

</head>
<body><form name="contactForm" onsubmit="return validateForm()" action="sgup.php" method="post">
    <h1>Sign Up Form</h1>
    <?php include('php/error.php'); ?>
    <div class="row">
        <label>Full Name</label>
        <input type="text" name="name" minlength="7" value="<?php echo $full_name; ?>">
        <div class="error" id="nameErr"></div>
    </div>
    <div class="row">
        <label>Email Address</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <div class="error" id="emailErr"></div>
    </div>
    <div class="row">
        <label>Mobile Number</label>
        <input type="text" name="mobile" maxlength="10">
        <div class="error" id="mobileErr"></div>
    </div>
    <div class="row">
        <label>Country</label>
        <select name="country">
            <option>Select</option>
            <option>Australia</option>
            <option>India</option>
            <option>United States</option>
            <option>United Kingdom</option>
            <option>Others</option>
        </select>
        <div class="error" id="countryErr"></div>
    </div>
    <div class="row">
        <label>Gender</label>
        <div class="form-inline">
            <label><input type="radio" name="gender" value="male"> Male</label>
            <label><input type="radio" name="gender" value="female"> Female</label>
        </div>
        <div class="error" id="genderErr"></div>
   
    </div>
    <div class="row">
        <input type="submit" name="reg_user" value="Submit">
    </div>
</form>
</body>
</html>
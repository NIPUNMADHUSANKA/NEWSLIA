function EmailValidate(emailaddress,password) {

    var email_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(email_format.test(emailaddress.value)){
        Password_Login(password);
    }
    else{
        error_login();
    }
}


function Password_Login(password) {

    if(password.value == "" || password.value.length < 8 || password.value.length > 15 ){
        error_login();
    }
    else{
        remove_error_login();
        alert(min_number());
        alert("Correct");
    }
    
}
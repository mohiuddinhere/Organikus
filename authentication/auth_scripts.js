// email validation

var allPasswordValidate = false;
function emailValidation() {
    $("#email").blur(function(){
        //           /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
        var email = $(this).val();
        if(email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
            $("#wrong_email_alert").empty();
            $("#email").css("border", "2px solid #008000" );
        }else{
            $("#wrong_email_alert").empty().append('Email is Not valid!');
            $("#wrong_email_alert").css("color", "red" );
            $("#email").css("border", "2px solid #FF0000" );
        }
    });
}

// password validation
function passwordValidation(){
    var pswdLengthValidation = false;
    var pswdLetterValidation = false;
    var pswdCapitalLetterValidation = false;
    var pswdNumberValidation = false;
    $("#password").keyup(function(){
        var pswd = $(this).val();

        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
            pswdLengthValidation = false;
        } else {
            $('#length').removeClass('invalid').addClass('valid');
            pswdLengthValidation = true;
        }
        //validate letter
        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
            pswdLetterValidation = true;
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
            pswdLetterValidation = false;
        }

        //validate capital letter
        if ( pswd.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
            pswdCapitalLetterValidation = true;
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
            pswdCapitalLetterValidation = false;
        }

        //validate number
        if ( pswd.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
            pswdNumberValidation = true;
        } else {
            $('#number').removeClass('valid').addClass('invalid');
            pswdNumberValidation = false;
        }

    }).focus(function() {
        $('#pswd_info').show();
        }).blur(function() {
        $('#pswd_info').hide();
        if(pswdLengthValidation && pswdLetterValidation && pswdCapitalLetterValidation && pswdNumberValidation){
            allPasswordValidate = true;
            $("#password").css("border", "2px solid #008000" );
            $("#required_pass_alert").empty()
        }else{
            $("#required_pass_alert").empty().append("Password don't meet the requirements!");
            $("#required_pass_alert").css("color", "red" );
            $("#password").css("border", "2px solid #FF0000" );
        }


    });
}


// confirm password match!?
function confirmPassword(){
    $("#confirm_password").keyup(function(){
        if( $("#password").val() != $("#confirm_password").val()){

            $("#wrong_pass_alert").empty().append('Use same password');
            $("#wrong_pass_alert").css("color", "red" );
            $("#confirm_password").css("border", "2px solid #FF0000" );

        }else if(!allPasswordValidate){

            $("#wrong_pass_alert").empty().append('First, you need to meet the password requirements');
            $("#wrong_pass_alert").css("color", "red" );
            $("#confirm_password").css("border", "2px solid #FF0000" );
            $("#wrong_pass_alert").empty();

        }else if($("#confirm_password").val() == ''){
            $("#confirm_password").css("border", "2px solid #FF0000" );
        }else{

            $("#confirm_password").css("border", "2px solid #008000" );
            $("#wrong_pass_alert").empty();
        }
    });
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    // console.log('Name: ' + profile.getName());
    // console.log('Image URL: ' + profile.getImageUrl());
    // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    var em = profile.getEmail();

    console.log(em);

                // var loginInfo =
                // {
                //     email: $("#email").val(),
                //     password: $("#password").val(),           
                // }
                
                // $.ajax({
                //     url: "loginProcess.php",
                //     type: "POST",
                //     data: loginInfo,
                //     dataType: "json",
                //     encode: true,
                // }).done(function (data) {
                //     console.log(data);
                // });
  }
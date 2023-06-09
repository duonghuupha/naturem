$(function(){
    $('.overlay').hide();
});

function add_to_cart(idh){
    $.ajax({
        type: "POST",
        url: baseUrl + '/',
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                $('.overlay').hide();
                show_message('success', result.msg);
                $(id_div).load(url_content);
            }else{
                $('.overlay').hide();
                show_message('error', result.msg);
                return false;
            }
        }
    });
}

/********************************************************************************** */
function login(){
    var email = $('#email_login').val(), password = $('#password').val();
    if(email.length == 0 || password.length == 0){
        show_message("error", "Not filled in enough information");
        return false;
    }else{
        if(validateEmail(email)){
            save_form_reject('#fm-login', baseUrl + '/log_action', baseUrl);
        }else{
            show_message("error", "Email format is incorrect");
            return false;
        }
    }
}

function register(){
    var required = $('#fm-register input, #fm-register textarea, #fm-register select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        if(validateEmail($('#email_register').val())){
            save_form_reject('#fm-register', baseUrl + '/reg_action', baseUrl + '/reg_notify.html');
        }else{
            show_message("error", "Email format is incorrect");
            return false;
        }
    }else{
        show_message("error", "Not filled in enough information");
    }
}

/********************************** */
function show_message(icon, msg){
    $.toast({
        heading: 'Notify',
        text: msg,
        showHideTransition: 'fade',
        icon: icon,
        position: 'top-right'
    })
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validate(evt) {
    var theEvent = evt || window.event;
    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function save_form_reject(id_form, url_post, url_reject){
    var xhr = new XMLHttpRequest();
    var formData = new FormData($(id_form)[0]);
    $('.overlay').show();
    $.ajax({
        url: url_post,  //server script to process data
        type: 'POST',
        xhr: function() {
            return xhr;
        },
        data: formData,
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                window.location.href = url_reject;
                $('.overlay').hide();
            }else{
                show_message('error', result.msg);
                $('.overlay').hide();
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}
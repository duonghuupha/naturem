$(function(){
    $('.overlay').hide();
});

function add_to_cart(idh){
    if($('#qty-input').length != 0){
        var data_str = "id="+btoa(idh)+'&qty='+$('#qty-input').val();
    }else{
        var data_str = "id="+btoa(idh)+'&qty=1';
    }
    save_no_form_reject(data_str, baseUrl + '/add_cart.html', window.location.href);
}

function update_from_cart(idh){
    var qty = $('#qty-input-'+idh).val();
    var data_str = "id="+btoa(idh)+'&qty='+qty;
    save_no_form_reject(data_str, baseUrl + '/update_cart.html', window.location.href);
}

function del_from_cart(idh){
    var data_str = "id="+btoa(idh);
    save_no_form_reject(data_str, baseUrl + '/del_cart.html', window.location.href);
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////

function load_info_add(){
    var zip_code = $('#postcode').val();
    if(zip_code.length != 5){
        show_message("error", "Zip code is not in the correct format");
    }else{
        $('.overlay').show();
        $.ajax({
            type: "POST",
            url: baseUrl + '/check',
            data: "postcode="+btoa(zip_code), // serializes the form's elements.
            success: function(data){
                var result = JSON.parse(data);
                if(result.success == true){
                    $('.overlay').hide();
                    show_message('success', result.msg);
                    var item = result.results[zip_code];
                    //console.log(item[0].city);
                    $('#firstname, #lastname, #phone, #city, #address').attr('readonly', false);
                    $('#state').val(item[0].state); $('#city').val(item[0].city);
                    $('#state_code').val(item[0].state_code);
                }else{
                    $('.overlay').hide();
                    show_message('error', result.msg);
                    return false;
                }
            }
        });
    }
}

function save_address(){
    var required = $('#fm-add-address input, #fm-add-address textarea, #fm-add-address select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        $('#comment').val($('#note').val());
        save_form_reject('#fm-add-address', baseUrl + '/action_add', baseUrl + '/manager_address.html');
    }else{
        show_message("error", "Not filled in enough information");
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

function checkout(){
    var required = $('#fm-order input, #fm-order textarea, #fm-order select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        //save_form_reject('#fm-order', baseUrl + '/action_check.html', baseUrl + '/notify_check.html');
        var xhr = new XMLHttpRequest();
        var formData = new FormData($('#fm-order')[0]);
        $('.overlay').show();
        $.ajax({
            url: baseUrl + '/action_check.html',  //server script to process data
            type: 'POST',
            xhr: function() {
                return xhr;
            },
            data: formData,
            success: function(data){
                var result = JSON.parse(data);
                if(result.success == true){
                    //window.location.href = url_reject;
                    //$('.overlay').hide();
                    window.location.href = baseUrl + '/payment?data='+btoa(result.data);
                }else{
                    show_message('error', result.msg);
                    $('.overlay').hide();
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
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

function save_no_form_reject(data_str, url_post, url_reject){
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: url_post,
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                $('.overlay').hide();
                window.location.href = url_reject;
            }else{
                $('.overlay').hide();
                show_message('error', result.msg);
                return false;
            }
        }
    });
}
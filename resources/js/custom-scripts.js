/** Script para manejo de código de país en teléfono */
var input = document.querySelector("#phone"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");
// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Número invalido", "Código de país invalido", "Muy corto", "Muy largo", "Número invalido"];
// initialise plugin
if(input){
    var iti = window.intlTelInput(input, {
        hiddenInput: "phone",
        initialCountry: "us",
        formatOnDisplay: false,
        separateDialCode: true,
        autoHideDialCode: false,
        preferredCountries: ["us"],
        geoIpLookup: function(callback) {
        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
        });
        }
    });
    var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("d-none");
        validMsg.classList.add("d-none");
    };
    $(".iti--separate-dial-code").css('width', '100%');
    // on blur: validate
    input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
        if (iti.isValidNumber()) {
                validMsg.classList.remove("d-none");
        } else {
                input.classList.add("error");
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode] ?? 'Número invalido';
                errorMsg.classList.remove("d-none");
        }
        var countryData = iti.getSelectedCountryData();
        }
    });
    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
}

$("#btn-profile-form").click(function(){
    let code = $(".iti__selected-dial-code").html();
    let mobile = $("#phone").val();
    $("#mobile").val(code+mobile);
    $('#profile-form').submit();
});

$("#btn-usuario-form").click(function(){
    let code = $(".iti__selected-dial-code").html();
    let mobile = $("#phone").val();
    $("#mobile").val(code+mobile);
    $('#usuario-form').submit();
});

$("#register-form").submit(function(){
    let code = $(".iti__selected-dial-code").html();
    let mobile = $("#phone").val();
    $("#mobile").val(code+mobile);
    $(this).submit();
});
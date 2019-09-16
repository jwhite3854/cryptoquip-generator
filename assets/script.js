var inputs = document.getElementsByClassName("cclass");

var clearIn = function(e) {     
    if ( e.which === 13 ) {
        var now_tab = this.tabIndex;
        var next_input = document.getElementById("crypto_"+(now_tab+1));
        next_input.focus();
    } else {
        if ( e.which !== 9 && this.value.match(/[a-z]/i) && this.value.length > 0){
            this.value = "";
        }
    }
};

var enterIn = function() {
    if ( !this.value.match(/[a-z]/i) ) {
        this.value = "";
    }
    
    var classes = this.className.split(/\s+/);
    var class_inputs = document.getElementsByClassName(classes[0]);
    for (var i = 0; i < class_inputs.length; i++) {
        class_inputs[i].value = this.value;
    }
};

for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keydown', clearIn, false);
    inputs[i].addEventListener('keyup', enterIn, false);
}

function clearAll() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
}

function checkQuote(quote) {
    var quote_check = '';
    for (var i = 0; i < inputs.length; i++) {
        quote_check = quote_check + inputs[i].value;
    }
    var quote_alert = document.getElementById("quote_alert");

    if (quote == quote_check.toUpperCase() ) {
        quote_alert.innerHTML = 'YES';
        quote_alert.classList.remove("alert-warning");
        quote_alert.classList.add("alert-success");
    } else {
        quote_alert.innerHTML = 'No.';
        quote_alert.classList.remove("alert-success");
        quote_alert.classList.add("alert-warning");
    }
}
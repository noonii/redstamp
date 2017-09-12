
var fingerPrint = document.getElementsByClassName('fingerprint')[0];
var overlay = document.getElementsByClassName('overlay')[0];
var header = document.getElementsByClassName('header')[0].children[0];

if (fingerPrint) {
    fingerPrint.onmouseover = function() {		
        this.classList.add('fadeOut');
        overlay.classList.add('fadeIn');	
        fadeInText(header, "Welcome!");
        this.onmouseover = null; // run once
    }
}

var formFields = document.getElementsByClassName('form-group');

if (formFields) {
    [].forEach.call(formFields, (field) => {        
        var input = field.children[0];		
        input.onclick = input.onfocus = input.contextmenu = function() {
            // Do something
        }         
    });  	
}

function fadeInText(el, text) {		
    el.classList.add('fadeIn');
    el.innerHTML = text;
}

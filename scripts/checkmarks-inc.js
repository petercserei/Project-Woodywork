
function onValidateEmail() {
    const emailElement = document.querySelector("#email");
    const content = emailElement.value;
    const isValid = content.indexOf("@") !== -1 && content.indexOf(".") !== -1;
    if(isValid) {
        document.querySelector("#checkmark-email").classList.add("active");
        document.querySelector("#cross-email").classList.remove("active");
    } else {
        document.querySelector("#cross-email").classList.add("active");
        document.querySelector("#checkmark-email").classList.remove("active");
    }
}

function onValidateGebruikersnaam() {
    const gebruikersnaamElement = document.querySelector("#gebruikersnaam");
    const content = gebruikersnaamElement.value;
    const regex = /\W+/;
    const isValid = regex.exec(content);

    const http = new XMLHttpRequest();
    http.open("GET", "includes/vergelijk-gebruikersnaam-inc.php?gebruikersnaam=" + content, true);
    http.onreadystatechange = function() {
        if (http.readyState === 4 && http.status === 200){
            const gelijk = http.responseText === "1";
            if (content.length < 3) {
                document.querySelector("#checkmark-gebruikersnaam").classList.remove("active");
                document.querySelector("#cross-gebruikersnaam").classList.add("active");
                document.querySelector("#error_text_beschikbaar").classList.remove("active");
                document.querySelector("#error_text_alfanr").classList.remove("active");
                document.querySelector("#error_text_length").classList.add("active");
            } else if(!isValid) {
                document.querySelector("#checkmark-gebruikersnaam").classList.remove("active");
                document.querySelector("#cross-gebruikersnaam").classList.add("active");
                document.querySelector("#error_text_beschikbaar").classList.remove("active");
                document.querySelector("#error_text_alfanr").classList.add("active");
                document.querySelector("#error_text_length").classList.remove("active");
            } else if(!gelijk) {
                document.querySelector("#cross-gebruikersnaam").classList.add("active");
                document.querySelector("#checkmark-gebruikersnaam").classList.remove("active");
                document.querySelector("#error_text_beschikbaar").classList.add("active");
                document.querySelector("#error_text_alfanr").classList.remove("active");
                document.querySelector("#error_text_length").classList.remove("active");
            } else {
                document.querySelector("#cross-gebruikersnaam").classList.remove("active");
                document.querySelector("#checkmark-gebruikersnaam").classList.add("active");
                document.querySelector("#error_text_beschikbaar").classList.remove("active");
                document.querySelector("#error_text_alfanr").classList.remove("active");
                document.querySelector("#error_text_length").classList.remove("active");
            }
        }
    };
    http.send();
}

function onValidateWachtwoord() {
    const wachtwoordElement = document.querySelector("#wachtwoord");
    const content = wachtwoordElement.value;
    const regex = /\W+/;
    const isValid = regex.exec(content);
    if(content.length < 7) {
        document.querySelector("#cross-wachtwoord").classList.add("active");
        document.querySelector("#error_text").classList.add("active");
        document.querySelector("#checkmark-wachtwoord").classList.remove("active");
        document.querySelector("#error_text2").classList.remove("active");
    } else if(!isValid) {
        document.querySelector("#cross-wachtwoord").classList.add("active");
        document.querySelector("#error_text2").classList.add("active");
        document.querySelector("#checkmark-wachtwoord").classList.remove("active");
        document.querySelector("#error_text").classList.remove("active");
    } else {
        document.querySelector("#checkmark-wachtwoord").classList.add("active");
        document.querySelector("#cross-wachtwoord").classList.remove("active");
        document.querySelector("#error_text").classList.remove("active");
        document.querySelector("#error_text2").classList.remove("active");
    }
}

function onValidateWachtwoord2() {
    const wachtwoordElement = document.querySelector("#wachtwoord2");
    const content = wachtwoordElement.value;
    const regex = /\W+/;
    const isValid = regex.exec(content);
    if(content.length < 7) {
        document.querySelector("#cross-wachtwoord2").classList.add("active");
        document.querySelector("#error_text3").classList.add("active");
        document.querySelector("#checkmark-wachtwoord2").classList.remove("active");
        document.querySelector("#error_text4").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.remove("active");
    } else if(!isValid) {
        document.querySelector("#cross-wachtwoord2").classList.add("active");
        document.querySelector("#error_text4").classList.add("active");
        document.querySelector("#checkmark-wachtwoord2").classList.remove("active");
        document.querySelector("#error_text3").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.remove("active");
    } else if(isValid && content.length > 7 && !isSame()) {
        document.querySelector("#checkmark-wachtwoord2").classList.remove("active");
        document.querySelector("#cross-wachtwoord2").classList.add("active");
        document.querySelector("#error_text3").classList.remove("active");
        document.querySelector("#error_text4").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.add("active");
    } else {
        document.querySelector("#cross-wachtwoord2").classList.remove("active");
        document.querySelector("#error_text4").classList.remove("active");
        document.querySelector("#checkmark-wachtwoord2").classList.add("active");
        document.querySelector("#error_text3").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.remove("active");
    }
}

function isSame() {
    const wachtwoordElement = document.querySelector("#wachtwoord");
    const content = wachtwoordElement.value;
    const wachtwoord2Element = document.querySelector("#wachtwoord2");
    const content2 = wachtwoord2Element.value;
    return content === content2;
}

function fRegistreren() {
    
}


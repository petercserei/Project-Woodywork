//booleans die true zijn als de items goedgekeurd zijn
let validatedEmail = false;
let validatedGebruikersnaam = false;
let validatedWachtwoord = false;
let validatedWachtwoord2 = false;

function onValidateEmail() {
    //selecteer inhoud van email tekstveld
    const emailElement = document.querySelector("#email");
    const content = emailElement.value;
    //maak boolean variabel dat true is als de content een "@" en een "." bevat
    const isValid = content.indexOf("@") !== -1 && content.indexOf(".") !== -1;
    //vergelijk database met inhoud email tekstveld door middel van httpRequest
    const http = new XMLHttpRequest();
    http.open("GET", "includes/vergelijk-email-inc.php?email=" + content, true);
    http.onreadystatechange = function() {
        if (http.readyState === 4 && http.status === 200){
            const gelijk = http.responseText === "1";
            //check email op lengte 
            if(content.length < 5) {
                document.querySelector("#checkmark-email").classList.remove("active");
                document.querySelector("#cross-email").classList.add("active");
                document.querySelector("#error_text_beschikbaar").classList.remove("active");
                document.querySelector("#error_text_leeg").classList.add("active");
            //check email op "@" en "."
            } else if(!isValid) {
                document.querySelector("#checkmark-email") .classList.remove("active");
                document.querySelector("#cross-email").classList.add("active");
                document.querySelector("#error_text_beschikbaar").classList.remove("active");
                document.querySelector("#error_text_leeg").classList.add("active");
            //check of email in de database voorkomt
            } else if(!gelijk) {
                document.querySelector("#cross-email").classList.add("active");
                document.querySelector("#checkmark-email").classList.remove("active");
                document.querySelector("#error_text_beschikbaar").classList.add("active");
                document.querySelector("#error_text_leeg").classList.remove("active");
            //email is gecheckt en goedgekeurd
            } else {
                document.querySelector("#cross-email").classList.remove("active");
                document.querySelector("#checkmark-email").classList.add("active");
                document.querySelector("#error_text_beschikbaar").classList.remove("active");
                document.querySelector("#error_text_leeg").classList.remove("active");
                validatedEmail = true;
            }
        }
    };
    //verstuurt de XMLHttpRequest
    http.send();
}

function onValidateGebruikersnaam() {
    //selecteer inhoud van gebruikersnaam tekstveld
    const gebruikersnaamElement = document.querySelector("#gebruikersnaam");
    const content = gebruikersnaamElement.value;
    //maak regular expression variable om te kunnen checken op niet-alfanumerieke tekens
    const regex = /\W/;
    const isValid = regex.exec(content);
    //vergelijk database met inhoud gebruikersnaam tekstveld door middel van httpRequest
    const http = new XMLHttpRequest();
    http.open("GET", "includes/vergelijk-gebruikersnaam-inc.php?gebruikersnaam=" + content, true);
    http.onreadystatechange = function() {
        if (http.readyState === 4 && http.status === 200){
            const gelijk = http.responseText === "1";
            //check gebruikersnaam op lengte
            if (content.length < 3) {
                document.querySelector("#checkmark-gebruikersnaam").classList.remove("active");
                document.querySelector("#cross-gebruikersnaam").classList.add("active");
                document.querySelector("#error_text_beschikbaar2").classList.remove("active");
                document.querySelector("#error_text_alfanr").classList.remove("active");
                document.querySelector("#error_text_length").classList.add("active");
                document.querySelector("#error_text_maxlength").classList.remove("active");
            //check gebruikersnaam op lengte
            } else if(content.length > 20) {
                document.querySelector("#checkmark-gebruikersnaam").classList.remove("active");
                document.querySelector("#cross-gebruikersnaam").classList.add("active");
                document.querySelector("#error_text_beschikbaar2").classList.remove("active");
                document.querySelector("#error_text_alfanr").classList.remove("active");
                document.querySelector("#error_text_length").classList.remove("active");
                document.querySelector("#error_text_maxlength").classList.add("active");
            //check gebruikersnaam op alfanumerieke tekens
            } else if(isValid) {
                document.querySelector("#checkmark-gebruikersnaam").classList.remove("active");
                document.querySelector("#cross-gebruikersnaam").classList.add("active");
                document.querySelector("#error_text_beschikbaar2").classList.remove("active");
                document.querySelector("#error_text_alfanr").classList.add("active");
                document.querySelector("#error_text_length").classList.remove("active");
                document.querySelector("#error_text_maxlength").classList.remove("active");
            //check of gebruikersnaam in de database voorkomt
            } else if(!gelijk) {
                document.querySelector("#cross-gebruikersnaam").classList.add("active");
                document.querySelector("#checkmark-gebruikersnaam").classList.remove("active");
                document.querySelector("#error_text_beschikbaar2").classList.add("active");
                document.querySelector("#error_text_alfanr").classList.remove("active");
                document.querySelector("#error_text_length").classList.remove("active");
                document.querySelector("#error_text_maxlength").classList.remove("active");
            //gebruikersnaam is gecheckt en goedgekeurd
            } else {
                document.querySelector("#cross-gebruikersnaam").classList.remove("active");
                document.querySelector("#checkmark-gebruikersnaam").classList.add("active");
                document.querySelector("#error_text_beschikbaar2").classList.remove("active");
                document.querySelector("#error_text_alfanr").classList.remove("active");
                document.querySelector("#error_text_length").classList.remove("active");
                document.querySelector("#error_text_maxlength").classList.remove("active");
                validatedGebruikersnaam = true;
            }
        }
    };
    //verstuurt de XMLHttpRequest
    http.send();
}

function onValidateWachtwoord() {
    //selecteer inhoud van wachtwoord tekstveld
    const wachtwoordElement = document.querySelector("#wachtwoord");
    const content = wachtwoordElement.value;
    //maak regular expression variable om te kunnen checken op niet-alfanumerieke tekens
    const regex = /\W/;
    const isValid = regex.exec(content);
    //check wachtwoord op lengte
    if(content.length < 7) {
        document.querySelector("#cross-wachtwoord").classList.add("active");
        document.querySelector("#error_text").classList.add("active");
        document.querySelector("#checkmark-wachtwoord").classList.remove("active");
        document.querySelector("#error_text2").classList.remove("active");
    //check wachtwoord op een niet-alfanumeriek teken
    } else if(!isValid) {
        document.querySelector("#cross-wachtwoord").classList.add("active");
        document.querySelector("#error_text2").classList.add("active");
        document.querySelector("#checkmark-wachtwoord").classList.remove("active");
        document.querySelector("#error_text").classList.remove("active");
   //wachtwoord is gecheckt en goedgekeurd
    } else {
        document.querySelector("#checkmark-wachtwoord").classList.add("active");
        document.querySelector("#cross-wachtwoord").classList.remove("active");
        document.querySelector("#error_text").classList.remove("active");
        document.querySelector("#error_text2").classList.remove("active");
        validatedWachtwoord = true;
    }
}

function onValidateWachtwoord2() {
    //selecteer inhoud van wachtwoord2 tekstveld
    const wachtwoordElement = document.querySelector("#wachtwoord2");
    const content = wachtwoordElement.value;
    //maak regular expression variable om te kunnen checken op niet-alfanumerieke tekens
    const regex = /\W/;
    const isValid = regex.exec(content);
    //check wachtwoord2 op lengte
    if(content.length < 7) {
        document.querySelector("#cross-wachtwoord2").classList.add("active");
        document.querySelector("#error_text3").classList.add("active");
        document.querySelector("#checkmark-wachtwoord2").classList.remove("active");
        document.querySelector("#error_text4").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.remove("active");
    //check wachtwoord2 op een niet-alfanumeriek teken
    } else if(!isValid) {
        document.querySelector("#cross-wachtwoord2").classList.add("active");
        document.querySelector("#error_text4").classList.add("active");
        document.querySelector("#checkmark-wachtwoord2").classList.remove("active");
        document.querySelector("#error_text3").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.remove("active");
    //check of wachtwoord2 gelijk is aan wachtwoord
    } else if(isValid && content.length > 7 && !isSame()) {
        document.querySelector("#checkmark-wachtwoord2").classList.remove("active");
        document.querySelector("#cross-wachtwoord2").classList.add("active");
        document.querySelector("#error_text3").classList.remove("active");
        document.querySelector("#error_text4").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.add("active");
   //wachtwoord2 is gecheckt en goedgekeurd
    } else {
        document.querySelector("#cross-wachtwoord2").classList.remove("active");
        document.querySelector("#error_text4").classList.remove("active");
        document.querySelector("#checkmark-wachtwoord2").classList.add("active");
        document.querySelector("#error_text3").classList.remove("active");
        document.querySelector("#error_text_equal2").classList.remove("active");
        validatedWachtwoord2 = true;
    }
}
//maak functie om wachtwoord en wachtwoord2 te kunnen vergelijken
function isSame() {
    //selecteer inhoud van email wachtwoord
    const wachtwoordElement = document.querySelector("#wachtwoord");
    const content = wachtwoordElement.value;
    //selecteer inhoud van email wachtwoord2
    const wachtwoord2Element = document.querySelector("#wachtwoord2");
    const content2 = wachtwoord2Element.value;
    //return true als wachtwoord overeenkomt met wachtwoord2
    return content === content2;
}

function fRegistreren() {
    if(validatedEmail && validatedGebruikersnaam && validatedWachtwoord && validatedWachtwoord2) {
        alert("account is aangemaakt");
    } else {
        alert("account kan niet worden aangemaakt");
    }
}
function isValid(){
    var name = document.forms['LForm']['name'].value;
    var phone = document.forms['LForm']['phone'].value;
   
    if(name === ""){
    document.getElementById('nameErr').innerHTML = "*username empty";
    
    }
    if(password === ""){
    document.getElementById('phoneErr').innerHTML = "*phone empty";
    return false;
    }

    else{
        return true;
    }
    
    }
function isValid(){
    var fname = document.forms['SForm']['catagory'].value;
    var username = document.forms['SForm']['name'].value;
    var password = document.forms['SForm']['amount'].value;
   
    if(catagory === ""){
    document.getElementById('catagoryErr').innerHTML = "*catagory  empty";
    
    }
    if(name === ""){
    document.getElementById('nameErr').innerHTML = "*name empty";
    
    }
    if(amount === ""){
    document.getElementById('amountErr').innerHTML = "*amount empty";
    return false;
    }
    else{
        return true;
    }
    
    }
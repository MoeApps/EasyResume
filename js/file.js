
/*global alert*/

function validJoin() {
    "use strict";
    
    var
        fname = document.getElementById("first_name"),
        lname = document.getElementById("last_name"),
        tel   = document.getElementById("phone"),
        lang  = document.getElementById("language"),
        exp   = document.getElementById("expr");
        
    if (fname.value === "0") {
        
        alert("Name Not Accept Number");
    
    } else if (Number(fname.value)) {
        
        alert("Name Not Accept Number");
        
    } else if (lname.value === "0") {
    
        alert("Name Not Accept Number");
    
    } else if (Number(lname.value)) {
    
        alert("Name Not Accept Number");
    
    } else if (Number(lang.value)) {
    
        alert("language Not Accept Number");
    
    } else if (lang.value === "0") {
        alert("language Not Accept Number");
    }
}

    
function valid() {
    "use strict";
        
    var
        user = document.getElementById("fname"),
        luser = document.getElementById("lname"),
        tuser = document.getElementById("tele"),
        cuser = document.getElementById("city");
    
    if (Number(user.value)) {
        
        alert("Name Not Accept Number");
    
    } else if (user.value === "0") {
    
        alert("Name Not Accept Number");
    
    } else if (luser.value === "0") {
        
        alert("Name Not Accept Number");
        
        
    } else if (Number(luser.value)) {
        
        alert("Name Not Accept Number");
        
    } else if (tuser.value === "0") {
            
        alert("Name Not Accept Number");
            
    }
}
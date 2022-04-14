let docId = document.getElementById("document");

const validations = () => {
    if(docId.value.length > 8) {
        alert("El número de documento no puede tener más de 8 caracteres");
        return false;
    } else {
        return true;
    }
}


//Date configurations
let date = new Date();
date.setDate = 4;
let day = date.getDate();
let year = date.getFullYear();
let month = date.getMonth()+1;
console.log(day);
console.log(year);
console.log(month);
let stringDay;
let stringMonth;

if(day < 10) {
    stringDay = "0" + day.toString();
    console.log(stringDay);
} else {
    stringDay = day.toString();
}
if (month < 10) {
    stringMonth = "0" + month.toString();
} else {
    stringMonth = month.toString();
}

let today = year.toString() + "-" + stringMonth + "-" + stringDay;

let txtDate = document.getElementById("eDate");
let txtBDay = document.getElementById("birthday");

txtBDay.max = today;
txtDate.min = today;
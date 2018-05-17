// JavaScript Document
function validiereForm() {
    var x = document.forms["kontakt"]["name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}

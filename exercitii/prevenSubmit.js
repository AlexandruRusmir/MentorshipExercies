document.getElementById("contact-form").addEventListener('submit', function (event){
    event.preventDefault();

    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var country = document.getElementById('country').value;
    var text = document.getElementById('subject').value;

    alert(`The first name is ${fname}, the last name is ${lname}, the country is ${country} and the sent subject is ${text}`);
});
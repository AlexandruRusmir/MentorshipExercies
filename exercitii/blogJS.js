var myBtn =  document.getElementById("hideButton");
myBtn.addEventListener("click", function (){
    //document.querySelectorAll('.blog-details p')[0].style.visibility='hidden';
    var returnedElements = document.querySelectorAll('.blog-details p');
    returnedElements.forEach((el) => {
        el.style.display = 'none';
    });
});
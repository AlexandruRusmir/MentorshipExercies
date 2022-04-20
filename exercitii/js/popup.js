let executed_50scroll = false;
let executed_page_leave = false;

document.body.addEventListener("mouseout", function (){
    if(executed_page_leave === false) {
        alert("Displaying a pop-up");
        executed_page_leave = true;
    }
});

window.addEventListener('scroll',function(e) {
    if(executed_50scroll === false)
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        alert("Displaying a pop-up");
        executed_50scroll = true;
    }
});
let suggestionText = document.getElementById("fname").addEventListener("keyup",function (){
    showHint(document.getElementById("fname").value)
});


function showHint(str) {
    if (str.length == 0) {
        document.getElementById("textHint").innerHTML = "";
        return;
    } else {
        let ourRequest = new XMLHttpRequest();
        ourRequest.onreadystatechange = function() {
            if (ourRequest.readyState == 4 && ourRequest.status == 200) {
                document.getElementById("textHint").innerHTML = ourRequest.responseText;
            }
        }
        ourRequest.open("GET", "../views/help/getFirsNameHint.php?search="+str, true);
        ourRequest.send();
    }
}
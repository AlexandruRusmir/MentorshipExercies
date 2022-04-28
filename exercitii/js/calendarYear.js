let yearSelect = document.getElementById("yearsSelect");

yearSelect.addEventListener("change", function (){
    let year = yearSelect.value;
    let url = window.location.href;
    let month = url.slice(-2);
    console.log(url);
    location.replace("http://localhost/MentorshipExerciseees/exercitii/views/calendar.php?ym=" + year + "-" + month);
});
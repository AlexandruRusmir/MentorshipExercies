var citiesList = document.getElementById("locations-list");

document.getElementById("locationForm").addEventListener('submit', function (event){
    event.preventDefault();

    var location = document.getElementById('location').value;
    var ourRequest = new XMLHttpRequest();

    ourRequest.open('GET', `https://api.teleport.org/api/cities/?search=${location}`);
    ourRequest.onload = function() {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var ourData = JSON.parse(ourRequest.responseText);

            renderHTML(location, ourData._embedded["city:search-results"]);
        } else {
            console.log("We connected to the server, but it returned an error.");
        }

    };

    ourRequest.onerror = function() {
        console.log("Connection error");
    };

    ourRequest.send();
});

function renderHTML(location, data) {
    htmlString = `<li> ${location} </li> <ul>`;
    for (i = 0; i < data.length; i++) {
        htmlString += `<li> ${data[i].matching_full_name} .</li>`;
    }
    htmlString += "</ul>";
    citiesList.innerHTML = htmlString;
}
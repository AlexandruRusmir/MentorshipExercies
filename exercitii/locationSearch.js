const citiesList = document.getElementById("locations-list");
const eventsList = document.getElementById("events-list");


document.getElementById("locationForm").addEventListener('submit', function (event){
    event.preventDefault();
    citiesList.innerHTML = "";

    let location = document.getElementById('location').value;
    let ourRequest = new XMLHttpRequest();

    ourRequest.open('GET', `https://api.teleport.org/api/cities/?search=${location}`);
    ourRequest.onload = function() {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var ourData = JSON.parse(ourRequest.responseText);
            renderLocations(ourData._embedded["city:search-results"]);
        } else {
            console.log("We connected to the server, but it returned an error.");
        }

    };

    ourRequest.onerror = function() {
        console.log("Connection error");
    };

    ourRequest.send();
});

function renderLocations(data) {
    htmlString = ``;
    let cityResult;
    for (i = 0; i < data.length; i++) {
        cityResult = `<li><a href="#" data-result="${data[i].matching_full_name}">
            ${data[i].matching_full_name}</a></li>`

        cityResult = createElementFromHTML(cityResult);
        cityResult.addEventListener("click", cityClick)
        citiesList.appendChild(cityResult);
    }
}

function cityClick(event){
    event.preventDefault();
    const cityLoc = event.target.dataset.result;

    sendSecondRequest(cityLoc);
}

function sendSecondRequest(location) {
    eventsList.innerHTML = "";
    let ourRequest = new XMLHttpRequest();
    location = location.split(",")[0];
    ourRequest.open('GET', `https://app.ticketmaster.com/discovery/v2/events.json?apikey=w8q21bNiAWHNHCdv54UVmGasu5b3OWC6&keyword=${location}`);
    ourRequest.onload = function() {
        if (ourRequest.status < 200 || ourRequest.status > 400) {
            console.log("We connected to the server, but it returned an error.");
            return;
        }

        let ourData = JSON.parse(ourRequest.responseText);
        renderEvents(ourData?._embedded?.events);
    };

    ourRequest.onerror = function() {
        console.log("Connection error");
    };

    ourRequest.send();
}

function renderEvents(data) {
    if(!data){
        alert("Unpopular location! No events here.");
        return;
    }

    htmlString = ``;
    let eventResult;

    //console.log(typeof data);
    //console.log(data instanceof Array);
    //console.log(typeof data === "object");

    for (i = 0; i < data.length; i++) {
        eventResult = `<li><p>${data[i].name}</p></li>`
        eventResult = createElementFromHTML(eventResult);
        eventsList.appendChild(eventResult);
    }
}

function createElementFromHTML(htmlString) {
    let div = document.createElement('div');
    div.innerHTML = htmlString;
    return div.firstChild;
}

//return a<b ? 1 : 2;

//x ?: y <=> x?x:y;

//return a<b ? (b<c? 2 : 3) : 1;

//if variable is falsy: a ?? b ?? c ?? null;

//object?.property?.property?.property;

// check if something is undefined with obje == undefined
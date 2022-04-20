let myBtn =  document.getElementById("hideButton");
let clickCounts = 0;

myBtn.addEventListener("click", function (){

    if (++clickCounts > 3) {
        return;
    }


    if (clickCounts === 3) {
        let htmlString = `<li class="nav-item">
                            <a class="nav-link"
                               href="easterEggPage.php">Easter Egg Page</a>
                        </li>`;
        lastNavElem = document.getElementById("lastNavItemElement");
        lastNavElem.insertAdjacentHTML("afterend", htmlString);
    }


    let returnedElements = document.querySelectorAll('.blog-details p');
    returnedElements.forEach((el) => {
        el.style.display = 'none';
    });

});
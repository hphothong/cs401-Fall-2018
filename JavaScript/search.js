$(document).ready(function() {
    let searchBar = document.getElementById("search_bar");
    searchBar.onkeyup = function(event) {
        let searchText = searchBar.value.toUpperCase();
        let reviewBoxes = document.getElementsByClassName("review_box");
        if (searchText === "") {
            for (var i = 0; i < reviewBoxes.length; i++) {
                reviewBoxes[i].style.display = "";
            }
        } else {
            for (var i=0; i < reviewBoxes.length; i++) {
                let text = reviewBoxes[i].textContent.toUpperCase();
                if (!text.includes(searchText)) {
                    reviewBoxes[i].style.display = "none";
                } else {
                    reviewBoxes[i].style.display = "";
                }
            }
        }
    };
});

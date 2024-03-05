let element;

function showElement(id){
    element = document.getElementById(id);
    element.style.display = "flex";
}

function closeElement(id){
    element = document.getElementById(id);
    element.style.display = "none";
}


function filter(input){
    let filter, ul, li ,div, p, i, txtValue;

    filter = document.getElementById(input).value.toUpperCase();
    
    ul = document.getElementById("PDFlist");
    li = ul.getElementsByTagName("li");

    for (i=1; i<li.length; i++) {
        switch(input){
            case "nameSearchBar":
                div = li[i].getElementsByTagName("div")[0];
                p = div.getElementsByTagName("p")[0];
                txtValue = p.textContent;
                break;
            case "dateSearchBar":
                div = li[i].getElementsByTagName("div")[1];
                txtValue = div.getElementsByTagName("div")[0].textContent;
                break;
        }

        
        if(txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "flex";
        } else {
            li[i].style.display = "none";
        }
    }
}


let element;

function showElement(id){
    element = document.getElementById(id);
    element.style.display = "flex";
}

function closeElement(id){
    element = document.getElementById(id);
    element.style.display = "none";
}

function switchDirectory(idToShow, idToHide){
    let PDFlistFilter = document.getElementById("PDFlistFilter");
    let dirListFilter = document.getElementById("dirListFilter");

    elementToShow = document.getElementById(idToShow);

    if(idToShow == "stock"){
        elementToShow.style.display = "flex";

        PDFlistFilter.style.display = "none";
        dirListFilter.style.display = "block";
    } else {
        elementToShow.style.display = "block";

        PDFlistFilter.style.display = "block";
        dirListFilter.style.display = "none";
    }
    

    elementToHide = document.getElementById(idToHide);
    elementToHide.style.display = "none";
}


function filter(filterList, input){
    let filter, ul, li ,div, p, i, txtValue;

    filter = document.getElementById(input).value.toUpperCase();

    if(filterList = "PDFlistFilter"){
        allPDFlist = document.getElementsByClassName('PDFlist');
    } else {
        allPDFlist = document.getElementsByClassName('dirList');
    }
    
    for (u=0; u<allPDFlist.length; u++){

        ul = allPDFlist.item(u).getElementsByTagName('ul')[0];
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
                case "themeSearchBar":
                    p = li[i].getElementsByTagName("p")[2];
                    txtValue = p.textContent;
                    break;
            }

            
            if(txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "flex";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    
}


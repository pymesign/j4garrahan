document.addEventListener("DOMContentLoaded", function () {

    function setLinks(anchor,title) {
        var newlink = document.createElement('a');
        newlink.setAttribute('href', anchor);
        newlink.innerHTML = title[0].innerHTML;
        title[0].innerHTML = newlink.outerHTML;
    }

    let linkCorona = document.querySelector("#link-coronavirus");    
    let myTitleCorona = document.getElementById('mod-custom110').getElementsByTagName('h4');
    setLinks(linkCorona, myTitleCorona);

    let linkTurnos = document.querySelector("#link-turnos");    
    let myTitleTurnos = document.getElementById('mod-custom112').getElementsByTagName('h4');
    setLinks(linkTurnos, myTitleTurnos);

    let linkLlegar = document.querySelector("#link-llegar");    
    let myTitleLlegar = document.getElementById('mod-custom113').getElementsByTagName('h4');
    setLinks(linkLlegar, myTitleLlegar);

});


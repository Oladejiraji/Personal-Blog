let searchButton = document.getElementById('search').firstElementChild;
let searchForm = document.getElementById('search-form');
let header = document.getElementById('header');
let bars = document.getElementById('bars');
let cancel = document.getElementById('cancel');
let smallNav = document.getElementById('small-nav');
let goTop = document.getElementById('top');
let searchCancel = document.getElementById('search-cancel')


searchButton.addEventListener('click', search);
searchCancel.addEventListener('click', cancelSearch);

function search(e) {
    searchButton.style.display = 'none';
    searchForm.style.display = 'block';
};

function cancelSearch(e) {
    searchButton.style.display = 'block';
    searchForm.style.display = 'none';
}

// window.addEventListener('scroll', navBar);

// function navBar(e) {
//     if (scrollY > 400) {
//         setTimeout(function(){
//             header.style.position = 'sticky';
//             header.style.top = '0';
//             // header.style.zIndex = '10';
//             // header.style.paddingTop = '1rem'
//             // header.style.paddingBottom = '1rem';
//             console.log(1);
//         });
       
        
//     }
//     else if (scrollY <= 300) {
//         setTimeout(function(){
//             header.style.position = 'relative';
//             // header.style.zIndex = '10';
//             // header.style.paddingTop = '0.4rem'
//             // header.style.paddingBottom = '10rem';
//             console.log(2);
//         });   
//     }
    
// };

bars.addEventListener('click', function() {
    smallNav.style.visibility = 'visible';
    smallNav.style.opacity = '1';
});

cancel.addEventListener('click', function() {
    smallNav.style.visibility = 'hidden';
    smallNav.style.opacity = '0';
});


function bigTitle() {
    let titles = document.querySelectorAll('.title');
    let bigLs = document.querySelectorAll('.big-l');


    titles.forEach(function(title) {
        let first = title.innerHTML.slice(0,1);
        console.log(first);
        let newText = document.createTextNode(first);

        title.previousElementSibling.appendChild(newText);
    });
};
bigTitle();

window.addEventListener('scroll', function(e){
    if(document.body.scrollTop > 400 || document.documentElement.scrollTop > 400){
        goTop.style.visibility = 'visible';
    }
    else if(document.body.scrollTop <= 400 || document.documentElement.scrollTop <= 400){
        goTop.style.visibility = 'hidden';
    }
});

goTop.addEventListener('click', function(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});
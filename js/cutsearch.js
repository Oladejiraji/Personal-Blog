let titles = document.querySelectorAll('.title');
let contents = document.querySelectorAll('.content');

// titles.forEach(title => {
//     let cutTitle = title.innerHTML.slice(0,15);
//     title.innerHTML = cutTitle+'...';
// });

contents.forEach(content => {
    let cutContent = content.innerHTML.slice(0,400);
    content.innerHTML = cutContent+'...';
});


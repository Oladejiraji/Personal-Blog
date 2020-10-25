let titles = document.querySelectorAll('.cut-title');
let contents = document.querySelectorAll('.cut-content');

titles.forEach(title => {
    let cutTitle = title.innerHTML.slice(0,15);
    title.innerHTML = cutTitle+'...';
});

contents.forEach(content => {
    let cutContent = content.innerHTML.slice(0,200);
    content.innerHTML = cutContent+'...';
});
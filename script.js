document.querySelectorAll('nav a').forEach(anchor=>{
    anchor.addEventListener('click', function(e){
        e.preventDefault();
        const section =document.querySelector(this.getAttribute('href'));
        section.scrollintoView({behavior:'smooth'});
    });
});
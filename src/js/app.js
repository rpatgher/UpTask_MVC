const mobileMenuBtn = document.querySelector('#mobile-menu');
const cerrarMenuBtn = document.querySelector('#cerrar-menu');
const sidebar = document.querySelector('.sidebar');

if(mobileMenuBtn){
    mobileMenuBtn.addEventListener('click', function (){
        sidebar.classList.add('mostrar');
    });
}

if(cerrarMenuBtn){
    cerrarMenuBtn.addEventListener('click', function (){
        sidebar.classList.add('ocultar');
        setTimeout(()=>{
            sidebar.classList.remove('mostrar');
            sidebar.classList.remove('ocultar');
        }, 600);
    });
}

// Eliminar la clase de mostar, en un tamaño de tablet y mayores
window.addEventListener('resize', () => {
    const anchoPantalla = document.body.clientWidth;
    if(anchoPantalla >= 768){
        sidebar.classList.remove('mostrar');
    }
});
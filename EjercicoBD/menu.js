//los eventos de los botones

const insertar=document.getElementById("insertar1");
const consultar=document.getElementById("consultar1");
const buscar=document.getElementById("buscar1");

insertar.addEventListener("click", function () {
    window.location.href = "nuevo.php";
});
consultar.addEventListener("click",()=>{
    window.location.href = "consultar.php";
});
buscar.addEventListener("click",()=>{
    window.location.href = "buscar.php";
});

    

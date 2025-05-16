async function obtenerDestino() {
    try{
        const respuesta = await fetch("../Backend/routes/api.php?seccion=destino&accion=ver");
        const destino = await respuesta.json();
        console.log(destino);
        const contenedor = document.getElementById("card-container");
        contenedor.innerHTML = crearcard(destino);
    } catch (error){
        console.error("Error al obtener los destinos" + error);
    }
}
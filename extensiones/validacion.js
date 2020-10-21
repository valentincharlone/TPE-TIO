document.addEventListener("DOMContentLoaded", cargarPagina); 

function cargarPagina(){
    document.getElementById('botonCaptcha').addEventListener("click", generarCaptcha); 
    document.getElementById('botonEnviar').addEventListener("click", verificarCaptcha); 

    function generarCaptcha(){ 
        let captcha= "";
        for (let i = 0; i < 5; i++) {
            captcha = String(digitoCaptcha()) + captcha ; 
        } 
        document.querySelector("#mostrarCaptcha").value = captcha;
    }

    function digitoCaptcha(){ 
        let numero = Math.floor(Math.random()*10); 
        return numero;
    } 

    function verificarCaptcha() { 
        let cRandom = document.querySelector("#mostrarCaptcha").value;
        let cIngresado = document.querySelector("#leerCaptcha").value; 
        if (( cRandom === cIngresado) && (cRandom !== "") && (cIngresado !== "")){  
            document.querySelector("#resultadoCaptcha").innerHTML = " El captcha es correcto "; 
        } else { 
            document.querySelector("#resultadoCaptcha").innerHTML = " El captcha es incorrecto "; 
        }   
    } 
}    

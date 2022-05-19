"use strict"

const boton_popup=document.querySelector("#btn-popup");
const overlay=document.querySelector(".overlay");
const popup=document.querySelector(".popup");
const cerrar_popup=document.querySelector("#btn-cerrar-popup");

boton_popup.addEventListener("click",
    ()=>{
        if(!overlay.classList.contains('active')){
            overlay.classList.add('active');
        }
    }
);
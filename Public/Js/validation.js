const nomUser = document.querySelector(".nom");
const emailUser = document.querySelector(".email");
const motdepassUser = document.querySelector(".motDePasse");

//msg error

const msgError = document.querySelector(".msg-error");
const msgEmail = document.querySelector(".msg-email");
const msgmotdePasse = document.querySelector(".msg-motDePasse");


//part regex 

function validInputs(){
    const nomRegex = /^[A-Za-z]+(?:\s[A-Za-z]+)+$/;
    
    if(!nomRegex.test(nomUser.value)){

        msgError.textContent = "Nom invalid!";
        msgError.classList.remove("opacity-0");

        setTimeout(() => {
            msgError.classList.add("opacity-0");
        }, 4000)
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(emailUser.value)){

        msgError.textContent = "email invalid!";
        msgError.classList.remove("opacity-0");

        setTimeout(() => {
            msgError.classList.add("opacity-0");
        }, 4000)
        return false;
    }

    return true;
}
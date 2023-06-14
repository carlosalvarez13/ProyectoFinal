let currentRating = 0;
let estrellasValoracion = document.getElementsByClassName('text-yellow-300').length;
console.log(estrellasValoracion);
    function setRating(rating) {
        const stars = document.getElementsByClassName('star');
        
        for (let i = 0; i < stars.length; i++) {
            const star = stars[i].querySelector('svg');
            
            if (i < rating) {
                star.classList.remove('text-yellow-100');
                star.classList.add('text-yellow-300');
            } else {
                star.classList.remove('text-yellow-300');
                star.classList.add('text-yellow-100');
            }
        }
        const estrellas = document.getElementsByClassName("text-yellow-300");
        if(document.getElementById("formulario").querySelector('[name="nEstrellas"]')){
            const nEstrellas = document.getElementById("nEstrellas");
            nEstrellas.value = estrellas.length-estrellasValoracion;
        }else{
            const nEstrellas = document.createElement("input");
            nEstrellas.id = 'nEstrellas';
            nEstrellas.name = "nEstrellas";
            nEstrellas.type = "hidden";
            nEstrellas.value = estrellas.length-estrellasValoracion;
            document.getElementById('formulario').appendChild(nEstrellas);
        }
    }
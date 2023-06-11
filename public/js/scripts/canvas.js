function iniciar() {

    var elemento = document.getElementById('canvas');
    canvas = elemento.getContext('2d');
    let iniciado;

    document.querySelector('button')?.addEventListener('click', async () => {
        await Tone.start()
        iniciado=true;
    })
    
    
    let contador = 1;

    let imagen = new Image();
    let imagenes = ["../../imagenes/galeria1.jpg", "../../imagenes/galeria2.jpg", "../../imagenes/galeria3.jpg", "../../imagenes/galeria4.jpg"];
    imagen.src = "../../imagenes/galeria1.jpg";
    setInterval(galeria, 5000);

    function galeria() {
        if (iniciado=true) {
            const synth = new Tone.Synth();
            synth.toMaster();
            synth.triggerAttackRelease("G4", "4n" );
        }
        do {
            canvas.clearRect(0, 0, elemento.width, elemento.height);
            imagen.src = imagenes[contador];
            contador++;
            if (contador >= 4) {
                contador = 0;
            }
        } while (imagen.src == imagenes[contador]);
    }
    imagen.addEventListener("load", modificarimagen);

    function modificarimagen(e) {

        imagen = e.target;
        canvas.drawImage(imagen, 0, 0);
        var info = canvas.getImageData(0, 0, 800, 700);

        canvas.putImageData(info, 0, 0);
    }


}
window.addEventListener("load", iniciar, false);


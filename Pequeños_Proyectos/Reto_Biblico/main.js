let preguntasRestantes = [...preguntas];
let nivelActual = 1;



function cargarPregunta() {
    if (nivelActual > 10 || preguntasRestantes.length === 0) {
        document.getElementById("pregunta").textContent = "🎉 ¡Felicidades! Has completado el nivel y has desbloqueado un nuevo logro espiritual.";
        document.getElementById("opciones").innerHTML = "";
        document.getElementById("barra").style.width = `100%`;
        document.getElementById("btnSiguienteNivel").style.display = "inline-block";
        return;
    }

    document.getElementById("nivelTexto").textContent = `Nivel ${nivelActual} de 10`;
    document.getElementById("barra").style.width = `${(nivelActual - 1) * 10}%`;

    const indiceAleatorio = Math.floor(Math.random() * preguntasRestantes.length);
    const preguntaActual = preguntasRestantes.splice(indiceAleatorio, 1)[0];

    document.getElementById("pregunta").textContent = preguntaActual.pregunta;
    const opcionesDiv = document.getElementById("opciones");
    opcionesDiv.innerHTML = "";

    preguntaActual.opciones.forEach((opcion, index) => {
        const boton = document.createElement("button");
        boton.textContent = opcion;
        boton.onclick = () => verificarRespuesta(boton, index === preguntaActual.correcta);
        opcionesDiv.appendChild(boton);
    });
}

function verificarRespuesta(boton, esCorrecta) {
    const modal = document.getElementById("modal");
    const modalContent = document.getElementById("modalContent");

    if (esCorrecta) {
        boton.classList.add("correcta");
        modalContent.textContent = "✅ ¡Correcto! Pasas a la siguiente pregunta.";
        modalContent.className = "modal-correcto";
        modal.style.display = "flex";

        setTimeout(() => {
            modal.style.display = "none";
            nivelActual++;
            cargarPregunta();
        }, 1500);
    } else {
        boton.classList.add("incorrecta");
        modalContent.textContent = "❌ Incorrecto, empieza de nuevo";
        modalContent.className = "modal-incorrecto";
        modal.style.display = "flex";

        setTimeout(() => {
            location.reload(); // reinicia el juego
        }, 1500);
    }
    
    // Desactiva botones
    const botones = document.querySelectorAll(".opciones button");
    botones.forEach(btn => btn.disabled = true);
}

// Inicia juego
cargarPregunta();

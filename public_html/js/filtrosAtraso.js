document.addEventListener('DOMContentLoaded', () => {
    const id = document.querySelector("#id");
    const rutEstudiante = document.querySelector("#rutEstudiante");
    const nombresApellidos = document.querySelector("#nombresApellidos");
    const curso = document.querySelector("#curso");
    const fecha = document.querySelector("#fecha");
    const horaMin = document.querySelector("#horaMin");
    const horaMax = document.querySelector("#horaMax");

    const atrasos = document.querySelector("#atrasos");
    const main = document.querySelector("#main");
    let sinExistencia;

    const datosBusqueda = {
        id: '',
        rutEstudiante: '',
        nombresApellidos: '',
        curso: '',
        fecha: '',
        horaMin: '',
        horaMax: ''
    };

    console.log(atrasos);

    const listaAtrasos = [];

    // Itera a través de los elementos tr dentro del tbody
    for (const tr of atrasos.children) {
        // Accede a las celdas (td) dentro de cada tr
        const cells = tr.children;
        
        const nombresApellidos = cells[4].innerHTML.split("<br>");
        
        // Crea un objeto para almacenar los datos de la fila
        const objetoFila = {
            id: cells[0].textContent,
            fecha: cells[1].textContent,
            hora: cells[2].textContent,
            rutEstudiante: cells[3].textContent,
            nombresApellidos: nombresApellidos[0] + "<br>" + nombresApellidos[1],
            curso: cells[5].textContent,
            comentario: cells[6].textContent
        };
        
        // Agrega el objeto a la lista
        listaAtrasos.push(objetoFila);
    }

    // Ahora, listaObjetos contiene los datos de cada fila como objetos
    console.log(listaAtrasos);

    id.addEventListener('input', () => {
        datosBusqueda.id = id.value;
        console.log("HELLO");
        filtrarAtraso();
    });
    rutEstudiante.addEventListener('input', () => {
        datosBusqueda.rutEstudiante = rutEstudiante.value;
        console.log("HELLO");
        filtrarAtraso();
    });
    nombresApellidos.addEventListener('input', () => {
        datosBusqueda.nombresApellidos = nombresApellidos.value;
        console.log("HELLO");
        filtrarAtraso();
    });
    curso.addEventListener('input', () => {
        datosBusqueda.curso = curso.value;
        console.log("HELLO");
        filtrarAtraso();
    });
    fecha.addEventListener('input', () => {
        datosBusqueda.fecha = fecha.value;
        console.log("HELLO");
        filtrarAtraso();
    });
    horaMin.addEventListener('input', () => {
        datosBusqueda.horaMin = horaMin.value;
        console.log("HELLO");
        filtrarAtraso();
    });
    horaMax.addEventListener('input', () => {
        datosBusqueda.horaMax = horaMax.value;
        console.log("HELLO");
        filtrarAtraso();
    });

    function filtrarAtraso() {
        //Funcion de Alto Nivel: Funcion que Ejecuta a Otra
        const atrasos = listaAtrasos.filter(filtrarId)
                                    .filter(filtrarRutEstudiante)
                                    .filter(filtrarNombresApellidos)
                                    .filter(filtrarCurso)
                                    .filter(filtrarFecha)
                                    .filter(filtrarHoraMin)
                                    .filter(filtrarHoraMax);

        mostrarAtrasos(atrasos);
    }

    function filtrarId(atraso) {
        const {
            id
        } = datosBusqueda;
        if (id) return atraso.id.includes(id);
        return atraso
    }
    function filtrarRutEstudiante(atraso) {
        const {
            rutEstudiante
        } = datosBusqueda;
        if (rutEstudiante) return atraso.rutEstudiante.includes(rutEstudiante);
        return atraso
    }
    function filtrarNombresApellidos(atraso) {
        const {
            nombresApellidos
        } = datosBusqueda;
        if (nombresApellidos) return atraso.nombresApellidos.toLowerCase().includes(nombresApellidos.toLowerCase());
        return atraso
    }
    function filtrarCurso(atraso) {
        const {
            curso
        } = datosBusqueda;
        if (curso) return atraso.curso.includes(curso);
        return atraso
    }
    function filtrarComentario(atraso) {
        const {
            comentario
        } = datosBusqueda;
        if (comentario) return atraso.comentario.includes(comentario);
        return atraso
    }
    function filtrarFecha(atraso) {
        const {
            fecha
        } = datosBusqueda;
        if (fecha) {
            datos = atraso.fecha.split('-');

            if(fecha === datos[1] || fecha === datos[1] + '/' + datos[2]) return true;
            return atraso.fecha === fecha;
        }
        return atraso
    }
    function filtrarHoraMin(atraso) {
        const {
            horaMin
        } = datosBusqueda;
        if (horaMin) {

            let datosAtraso = atraso.hora.split(':');
            console.log("Obtenida:" +datosAtraso);
            let datosBusqueda = horaMin.split(':');
            console.log("Buscada: "+datosBusqueda);

            let horaAtraso = parseFloat(datosAtraso[0]+"."+datosAtraso[1]);
            let horaBuscada = parseFloat(datosBusqueda[0]+"."+datosBusqueda[1]);
            console.log(horaAtraso);

            return horaAtraso >= horaBuscada;


            // if(hora.length === 1 || hora[1] === ''){
            //     if(horaBuscada.getHours() <= horaAtraso.getHours()) return true;
            //     else return false;
            // }else if(hora.length === 2 && hora[1] != ''){
            //     horaBuscada.setMinutes(parseInt(hora[1]));
            //     if(horaBuscada.getTime() <= horaAtraso.getTime()) return true;
            //     else return false;
            // }

        }
        return atraso
    }
    function filtrarHoraMax(atraso) {
        const {
            horaMax
        } = datosBusqueda;
        if (horaMax) {

            let datosAtraso = atraso.hora.split(':');
            console.log("Obtenida:" +datosAtraso);
            let datosBusqueda = horaMax.split(':');
            console.log("Buscada: "+datosBusqueda);

            let horaAtraso = parseFloat(datosAtraso[0]+"."+datosAtraso[1]);
            let horaBuscada = parseFloat(datosBusqueda[0]+"."+datosBusqueda[1]);
            console.log(horaAtraso);

            return horaAtraso <= horaBuscada;


        }
        return atraso
    }

    //funciones
    function mostrarAtrasos(listaAtrasos) {

        limpiarHTML();
        if(main.querySelector('p')){
            main.querySelector('p').textContent = '';
        }

        if (listaAtrasos.length) {
            listaAtrasos.forEach(atraso => {
                const {
                    id,
                    fecha,
                    hora,
                    rutEstudiante,
                    nombresApellidos,
                    curso,
                    comentario
                } = atraso;
                
                console.log(atraso)
                const nuevaHora = hora.split(':');
                const atrasoHTML = document.createElement('tr');
                
                let nuevaFecha = fecha.split('-');
                
                atrasoHTML.classList.add('row');

                const newAtraso = `
                    <td class="cell pl">${id}</td>
                    <td class="cell">${nuevaFecha[1] + '/' + nuevaFecha[2]}</td>
                    <td class="cell h">${nuevaHora[0] + ':' + nuevaHora[1]}</td>
                    <td class="cell">${rutEstudiante}</td>
                    <td class="cell">${nombresApellidos}</td>
                    <td class="cell">${curso}</td>
                    <td class="cell">${comentario}</td>
                    <td class="action cell">

                        <a href="/admin/atraso/actualizar?id=${id}">
                            <input class="btn-action actualizar" type="button" value="Editar" />
                        </a>

                        <form method="POST" action="atraso/eliminar">
                            <input class="btn-action eliminar" type="submit" value="Eliminar" />
                            <input type="hidden" name="id" value="${id}" />
                            <input type="hidden" name="entidad" value="atraso" />
                        </form>
                    </td>
            `;

            atrasoHTML.insertAdjacentHTML('beforeend', newAtraso);

                atrasos.appendChild(atrasoHTML);

            })
        } else {
            if(sinExistencia){
                main.removeChild(sinExistencia);
            }
            sinExistencia = document.createElement('p');
            sinExistencia.textContent = 'Ningun Atraso Cumple con esas Caracteristicas, Intente con Otras Caracteristicas.';
            main.appendChild(sinExistencia);
        }

    }

    function limpiarHTML() {
        while (atrasos.firstChild) {
            atrasos.removeChild(atrasos.firstChild);
        }
    }

    filtrarAtraso();

})
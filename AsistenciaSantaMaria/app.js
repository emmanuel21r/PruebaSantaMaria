

$(document).ready(function() {


    var formulario = document.getElementById('formulario');
    var formularioSali=document.getElementById('formularioSali');
    var formularioFiltro=document.getElementById('filtroFormulario');
    var alerta = document.getElementById('alerta');
    var tabla = document.querySelector('table tbody');
    var tablafiltro = document.getElementById('filtroTabla');


//Funciones del proyecto asistencia

    cargarDatos();
    formularioEntrada();
    formularioSalida();
    filtrarTabla();


    function cargarDatos() {
        fetch(`./controller/cargar_datos.php`, {
            method: 'GET'
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);

                tabla.innerHTML = ''; // Limpia la tabla existente

                data.forEach(item => {
                    var row = document.createElement('tr');
                    let genero;
                    let estado='';
                    if (item.sexo == 1) {
                        genero = 'Masculino';
                    } else if (item.sexo == 2) {
                        genero = 'FEMENINO';
                    } else {
                        genero = 'OTRO';
                    }
                    //Código de estado

                    if(item.estado=="ENTRADA"){
                        estado='#2ecc71';
                    }else {
                        estado='#e74c3c';
                    }

                    row.innerHTML = `
                <th scope="row">${item.id}</th>
                <td>${item.nombre}</td>
                <td>${item.apellido}</td>
                
                <td>${genero}</td>
                <td>${item.especialidad}</td>
                <td>${item.fechaAsistencia}</td>
                <td class="estado" style="background-color: ${estado}; color: white">${item.estado}</td>
            `;
                    tabla.appendChild(row);
                });
            });
    }




function formularioEntrada(){
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();

        var datos = new FormData(formulario);
        console.log(datos);

        fetch('./controller/controller.php', {
            method: 'POST',
            body: datos
        })
            .then(res => res.json())
            .then(data => {
                if (data.error) { // Verifica si hay un error en la respuesta
                    alerta.innerHTML = `
                <div class="alert alert-warning" role="alert">
                    ${data.error}
                </div>
            `;
                } else {
                    alerta.innerHTML = `
                <div class="alert alert-primary" role="alert">
                    ${data}
                </div>
            `;
                    cargarDatos();
                    formulario.reset();
                }
            })
            .catch(error => {
                console.error('Error al enviar la solicitud:', error);
                alerta.innerHTML = `
            <div class="alert alert-danger" role="alert">
                Hubo un error al enviar la solicitud. Por favor, inténtalo de nuevo más tarde.
            </div>
        `;
            });
    });

}

function formularioSalida(){

    formularioSali.addEventListener('submit', function (e) {
        e.preventDefault();

        var datos = new FormData(formularioSali);
        console.log(datos);

        fetch('./controller/controllerSalida.php', {
            method: 'POST',
            body: datos
        })
            .then(res => res.json())
            .then(data => {
                if (data.error) { // Verifica si hay un error en la respuesta
                    alerta.innerHTML = `
                <div class="alert alert-warning" role="alert">
                    ${data.error}
                </div>
            `;
                } else {
                    alerta.innerHTML = `
                <div class="alert alert-primary" role="alert">
                    ${data}
                </div>
            `;
                    cargarDatos();
                    formularioSali.reset();
                }
            })
            .catch(error => {
                console.error('Error al enviar la solicitud:', error);
                alerta.innerHTML = `
            <div class="alert alert-danger" role="alert">
                Hubo un error al enviar la solicitud. Por favor, inténtalo de nuevo más tarde.
            </div>
        `;
            });
    });

}

function filtrarTabla(){

    formularioFiltro.addEventListener('submit', function (e) {
        e.preventDefault();

        var datos = new FormData(formularioFiltro);
        console.log(datos);

        fetch('./controller/controllerFiltroSemanal.php', {
            method: 'POST',
            body: datos
        })
            .then(res => res.json())
            .then(data => {
                console.log("ESTA ES LA DATA");
                console.log(data);

                console.log("ESTE ES LA TABLA SELECCIONADA")
                console.log(tablafiltro);

                if (data.error) { // Verifica si hay un error en la respuesta
                    alerta.innerHTML = `
                <div class="alert alert-warning" role="alert">
                    ${data.error}
                </div>
            `;
                } else {
                    tablafiltro.querySelector('tbody').innerHTML = '';
                    var estado='';


                    data.forEach((fila, index) => {
                        if(fila.estado=="ENTRADA"){
                            estado='#2ecc71';
                        }else {
                            estado='#e74c3c';
                        }

                        tablafiltro.querySelector('tbody').innerHTML += `
                    <tr>
                        <th scope="row">${fila.id}</th>
                        <td>${fila.nombre}</td>
                        <td>${fila.apellido}</td>
                        <td>${fila.especialidad}</td>
                        <td>${fila.fechaAsistencia}</td>
                        <td class="estado" style="background-color: ${estado}; color: white">${fila.estado}</td>
                    </tr>
                `;
                    });
                    formularioFiltro.reset();

                }
            })
            .catch(error => {
                console.error('Error al enviar la solicitud:', error);
                alerta.innerHTML = `
            <div class="alert alert-danger" role="alert">
                Hubo un error al enviar la solicitud. Por favor, inténtalo de nuevo más tarde.
            </div>
        `;
            });
    });


}



});



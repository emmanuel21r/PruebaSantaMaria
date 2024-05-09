# PruebaSantaMaria
Prueba Técnica 
El proyecto de asistencia esta en mvc, pasos para ejecutar:
1. Colocar el proyecto en xampp/htdocs
2. Importar la base de datos en mysqlWorkbench
3. ejecutar el proyecto

El proyecto funciona así, hay 2 formularios dentro de un tab(Entrada y salida), el usuario registra a los empleados que entran y salen y se va actualizando la tabla, 
esta tabla va a ir cambiando su estado (ENTRADA Y SALIDA) y se pintara de verde o rojo dependiendo de la inserción que se haga.
Se puede imprimir la tabla con los registros del día.
El filtro de tabla semanal es un formulario en el cual se selecciona la fecha inicio y fin a la cual quieres filtrar y se muestra la tabla con esos datos.

La relacion de la bd es la siguiente, persona con asistencia, en persona se guardan los datos de los registros y en asistencia las fechas y el estado


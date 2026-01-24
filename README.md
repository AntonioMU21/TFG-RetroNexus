Retro Nexus - TFG

Retro Nexus es una plataforma web para jugar a minijuegos y competir en un ranking global.
Este repositorio contiene la infraestructura de servidores y el backend necesario para el Proyecto de Fin de Grado del ciclo de Administración de Sistemas Informáticos en Red.

Equipo
Antonio Muñoz
Denis Luque
Francisco Merchan
Adrián Fernandez

Infraestructura:
VPS Ubuntu con **Docker y Docker Compose**.

Web:
WordPress con BuddyPress para gestionar usuarios, perfiles y avatares.
Base de Datos:
MariaDB (con tablas personalizadas para los juegos).

Backend:
API REST propia programada en PHP para conectar los juegos de Unity con el servidor.

Índice de carpetas
base_de_datos: Aquí está el archivo .sql con las tablas del juego.
codigo_fuente:  Nuestra API personalizada que recibe los datos de Unity.
scripts Scripts de Bash para tareas automáticas.
documentacion: El anteproyecto y la memoria técnica.
docker-compose.yml La definición completa para levantar el servidor.



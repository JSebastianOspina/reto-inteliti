# **Instalación**
De manera intencionada, se ha expuesto el archivo .env de docker-compose y de laravel para facilitar su revisión.

1) Clonar el repositorio
2) Entrar a la carpeta del repositorio.
3) Iniciar los contenedores.

> docker-compose up -d

4) Entrar al contenedor web.
>docker-compose exec webserver bash

5) Una vez dentro del contenedor, se deben instalar las dependencias con composer.
> composer install

6) Correr las migraciones
> php artisan migrate

7) Dirigirse a localhost desde algun navegador web. 

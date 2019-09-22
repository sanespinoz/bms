Aplicación web dinámica desarrollada en laravel 5.1 para gestionar recursos de un edificio de oficinas

#bms

Instalación
Después de descargar el proyecto entramos a este.

  $ cd nombreRepositorio
Ejecutamos el siguiente comando.

  $ composer install
Modificamos el nombre del archivo .env.example. por .env y agregamos nuestras credenciales.

Por ultimo solo debemos generar una key para nuestra app.

   $ php artisan key:generate
Listo ya podemos ejecutar el proyecto bms.

  $ php artisan serve

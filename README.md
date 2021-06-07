<p align="center"><a href="https://github.com/andresbrice/atenas-gym.com" target="_blank"><img src="{{asset('img/hr/Atenas_GYM_hr_bordo.png')}}" width="400"></a></p>

## Sobre Atenas GYM Web

Atenas GYM web es una aplicación web para la gestión y administración del gimnasio "Atenas". Creada como proyecto final de la carrera "Tecnicatura Superior en Programación"

## Prerequisitos

-   Entorno de desarrollo (Puede utilizar el de su preferencia. Recomendamos [XAMPP](https://www.apachefriends.org/es/index.html)
-   Manejador de dependencias de PHP: [Composer](https://getcomposer.org/)

## Contribución al proyecto

Para poder contribuir en nuestro proyecto recomendamos seguir los siguientes pasos:

-   Instalar las dependencias con composer: "composer install"
-   Instalar las dependencias de NPM: "npm i && npm run dev"
-   Crear una base de datos que soporte Laravel (MySQL)
-   Crear archivo .env (Pueden duplicar el archivo .env.example, renombrarlo a .env e incluir los datos de conexión de la base de datos que indicamos en el paso anterior.)
-   Generar una clave: "php artisan key:generate"
-   Ejecutar las migraciones: "php artisan migrate --seed"
-   Ejecutar la carga de datos falsos a la tabla usuarios: "php artisan db:seed --class=UserSeeder"

<p align="center">Y listo! Happy coding 💻</p>

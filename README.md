<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# DevJobs

## Descripción
DevJobs es una plataforma de empleo donde reclutadores pueden publicar vacantes de empleo y los desarrolladores pueden postularse a dichas vacantes enviando su curriculum u hoja de vida para que los reclutadores lo vean y se pongan en contacto contigo.

- El sistema maneja dos tipos de usuarios: Reclutadores y Desarrolladores.

- Los reclutadores pueden crear vacantes, editar vacantes y eliminar vacantes.

- Los desarrolladores pueden postularse a las vacantes, solo pueden aplicar una vez por cada vacante.

- Cuando se postulan para una vacante, le llega una notificacion visual al reclutador indicando sobre la postulación.


## Tecnologías usadas
- Laravel version 10 como framework php
- Tailwind CSS
- Laravel Livewire v3

## Pasos para ejecutar el proyecto
1. Descarga o clona el proyecto
2. Ejecuta el comando **`composer install`**
3. Ejecuta el comando **`npm install`**
4. Copia en archivo **.env.example** y renombralo a **.env**
5. Edita las variables de entorno para la conexión a la base de datos
6. Ejecuta el comando **`php artisan key:generate`**
7. Ejecuta el comando **`php artisan migrate`**
8. Ejecuta el comando **`npm run dev`**
9. Ejecuta el comnado **`php artisan serve`**
10. Visita la url [http://127.0.0.1:8000](http://127.0.0.1:8000)

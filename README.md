# Prueba para CalidadCloud

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

### Instalación 🔧

* **copiar .env.example  como .env. No olvidar configurar tus accesos a mysql en el caso de no utilizar el metodo con sail**
* **Realizar preparativos. En el caso de poseer requisitos minimos para utilizar laravel 8**
```
composer install (En el caso de querer correr desde dockers  y no tener los requisitos minimos para utilizar laravel 8 agregar '--ignore-platform-reqs')
php artisan key:generate
php artisan migrate
php artisan serve
```
* **Realizar preparativos. En el caso de no poseer requisitos minimos para utilizar laravel 8**
```
./vendor/bin/sail up -d 
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan serve

```

* **Ya puede iniciar a probar el proyecto http://localhost:8000/**

## Expresiones de Gratitud 🎁

* Gracias por su oportunidad 📢 
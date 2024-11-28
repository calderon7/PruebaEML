<p align="center">
    <h1>Aplicación Web CRUD de Usuarios en Laravel</h1>
</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://jonmircha.com/img/blog/crud.png" width="400" alt="Laravel Logo"></a></p>
Esta es una aplicación web desarrollada con Laravel que permite la gestión de usuarios a través de funcionalidades CRUD (Crear, Leer, Actualizar y Borrar). La aplicación es responsive y utiliza MySQL como base de datos relacional.

## Funcionalidades

- **Lista de contactos:** La aplicación permite listar los usuarios almacenados en la base de datos en orden alfabético (A-Z). Cada usuario se muestra con su ID, nombres, apellidos, teléfono, fecha de registro y fecha de última modificación. Además, se incluyen botones para editar o eliminar cada usuario.

- **Creación de contactoss:** Se puede agregar nuevos usuarios proporcionando nombres, apellidos, teléfono y fecha de registro. La fecha de creación se registra automáticamente.

- **Edición de contacto:** Los datos de un usuario existente pueden ser actualizados, excepto su ID y la fecha de registro. La fecha de última modificación se actualiza automáticamente al guardar los cambios.

- **Eliminación de contactos:** Los usuarios pueden ser eliminados de la base de datos mediante un solo clic.

- **Alertas:** La aplicación muestra alertas para notificar al usuario sobre la finalización exitosa de una acción o cualquier error ocurrido durante el proceso.

## Vistas
La aplicación cuenta con las siguientes vistas:

- **Listado de usuarios:** Muestra la lista de usuarios registrados con opciones para editar o eliminar.

- **Formulario de creación de usuario:** Permite agregar un nuevo usuario a la base de datos (popUp).

- **Formulario de edición de usuario:** Muestra los datos actuales del usuario seleccionado para su modificación (popUp).

## Tecnologías Utilizadas
### Backend:
- **Laravel:** Framework PHP utilizado para construir la lógica de backend, gestión de rutas, controladores, y acceso a la base de datos.
- **MySQL:** Base de datos relacional utilizada para almacenar la información de los usuarios.
- **PHP:** Lenguaje de programación utilizado por Laravel.
### Frontend:
- **Bootstrap 5.3.3**: Framework CSS utilizado para el diseño responsive de la interfaz de usuario.
- **Blade**: Motor de plantillas de Laravel utilizado para crear las vistas.
### Herramientas de Desarrollo:
- **Laravel Mix**: Herramienta de compilación y agrupación de activos, configurada para compilar y minificar archivos CSS y JS.
- **SASS**: Preprocesador CSS para escribir estilos de forma más eficiente.
# Requisitos
- PHP >= 8.0
- Composer
- Node.js y npm
- MySQL

## Instalación
  
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/calderon7/PruebaEML.git
   cd PruebaEML

2. Instalar dependencias de PHP:
    ```bash
   composer install
3. Instalar dependencias de Node.js:
    ```bash
   npm install
4. Configurar el archivo .env con los detalles de tu base de datos MySQL.

5. Ejecutar las migraciones y seeders para configurar la base de datos:
    ```bash
   php artisan migrate --seed
6. Compilar los activos con Laravel Mix:
    ```bash
   npm run dev
7. Instalar dependencias de PHP:
    ```bash
   git clone https://github.com/calderon7/PruebaEML.git
   cd PruebaEML
8. Iniciar el servidor de desarrollo:
    ```bash
   php artisan serve

## Iamgenes del aplicativo
### Vista informacion de los Usuarios:
<p align="center"> 
<img src="/img_project/view_table_crud.png" alt="Laravel Logo">
</p>

### Formulario para crear nuevos usuarios:
<p align="center"> 
<img src="/img_project/add_table_crud.png" alt="Laravel Logo">
</p>

### Formulario para modificar usuarios:
<p align="center"> 
<img src="/img_project/edit_table_crud.png" alt="Laravel Logo">
</p>

### Alerta para desactivar o eliminar Usuarios:
<p align="center"> 
<img src="/img_project/Delete_desactive_data.png" alt="Laravel Logo">
</p>

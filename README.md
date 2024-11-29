# Aplicación Web de Agenda de Contactos (Modelo MVC)

Esta es una aplicación web desarrollada utilizando el modelo **MVC (Modelo-Vista-Controlador)** que permite gestionar una **agenda de contactos** con funcionalidades básicas de **Crear, Leer, Actualizar y Eliminar (CRUD)**. La interfaz es **responsive** y está diseñada para ofrecer una experiencia amigable al usuario. Los datos se almacenan en una base de datos relacional.


# **Demostración en Vivo**

Accede a la aplicación funcional a través del siguiente enlace:  
👉 [Aplicación Funcional de Agenda de Contactos](http://appproject.jhonnatancalderon.net/users)

---

## **Funcionalidades Principales**

- **Registro de contactos:**  
  Permite agregar nuevos contactos ingresando información como nombre, apellido, teléfono y dirección. Los datos se validan antes de ser almacenados en la base de datos.

- **Búsqueda de contactos:**  
  Incluye una barra de búsqueda dinámica para localizar contactos por nombre, apellido o número de teléfono.

- **Listado de contactos:**  
  Muestra todos los contactos almacenados en la base de datos ordenados alfabéticamente. Cada registro incluye opciones para **editar** o **eliminar**.

- **Edición de contactos:**  
  Facilita la modificación de los datos de un contacto seleccionado. Los cambios se guardan automáticamente y se reflejan en la base de datos.

- **Eliminación de contactos:**  
  Ofrece la opción de eliminar contactos de manera permanente. Incluye confirmaciones visuales para evitar eliminaciones accidentales.

---

## **Tecnologías Utilizadas**

### **Backend**
- **PHP:** Lenguaje principal para la lógica del servidor.
- **Modelo MVC:** Estructura organizada para separar la lógica de negocios (Modelo), la presentación (Vista) y el control de la aplicación (Controlador).
- **MySQL:** Base de datos utilizada para el almacenamiento de los contactos.

### **Frontend**
- **HTML5:** Estructura básica de la interfaz.
- **CSS3 y SASS:** Estilos personalizados para crear una interfaz visualmente atractiva y responsive.
- **JavaScript (ES6):** Añade interactividad y funciones dinámicas como validaciones en el cliente y búsqueda en tiempo real.
- **Bootstrap 5.3.3:** Framework CSS para diseño responsive.

---

## **Vistas del Sistema**

1. **Vista Principal (Listado de Contactos):**  
   - Muestra una tabla con todos los contactos registrados.  
   - Incluye botones de acción para **editar** y **eliminar** cada contacto.  
   - Barra de búsqueda para filtrar contactos en tiempo real.  

2. **Formulario de Registro de Contactos:**  
   - Permite agregar un nuevo contacto.  
   - Validaciones dinámicas tanto en el cliente (JavaScript) como en el servidor (PHP).  

3. **Formulario de Edición de Contactos:**  
   - Muestra los datos actuales del contacto seleccionado para su modificación.  
   - Valida los cambios antes de actualizarlos en la base de datos.  

4. **Alertas y Confirmaciones:**  
   - Notificaciones visuales para confirmar acciones exitosas o advertir sobre errores.  
   - Ventanas emergentes para confirmar la eliminación de contactos.  

---

## **Requisitos**

- Servidor web con soporte PHP (XAMPP, WAMP, etc.).  
- PHP >= 7.4.  
- MySQL >= 5.7.  

---
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

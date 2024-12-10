# Proyecto PHP con XAMPP
## Version para local

si unicamente se quiere probar el proyecto, se puede descargar la carpeta src 

donde se puede ver la pagina home, que no opera con php ni xampp, ni con bases de datos, ese es el proyecto base


## Descripción del Proyecto
Este proyecto implementa una aplicación web que utiliza PHP y MySQL para gestionar funciones de inicio de sesión, registro de usuarios y otras funcionalidades relacionadas con la autenticación. El diseño incluye archivos HTML y CSS para la interfaz visual y scripts en PHP para la lógica del lado del servidor.

---

## Requisitos Previos
1. **Software Necesario**:
    - [XAMPP](https://www.apachefriends.org/download.html) instalado en tu computadora.
    - Un navegador web actualizado.

2. **Archivos del Proyecto**:
    - Asegúrate de tener todos los archivos del proyecto descargados, incluyendo los scripts PHP (`index.php`, `login.php`, `registrar.php`, etc.), los archivos de recursos (`index.html`, imágenes y CSS), y la base de datos (`mtp.sql`).

---

## Configuración del Proyecto
1. **Paso 1: Configurar XAMPP**
    - Inicia XAMPP y asegúrate de que los módulos de **Apache** y **MySQL** estén activados.

2. **Paso 2: Copiar Archivos del Proyecto**
    - Copia todos los archivos del proyecto en la carpeta `htdocs` de tu instalación de XAMPP.
        - Por ejemplo: `C:\\xampp\\htdocs\\mi_proyecto`.

3. **Paso 3: Configurar la Base de Datos**
    - Abre [phpMyAdmin](http://localhost/phpmyadmin).
    - Crea una nueva base de datos llamada `proyecto` (puedes usar otro nombre, pero debes actualizar el archivo `config.php`).
    - Importa el archivo `mtp.sql` para configurar las tablas y datos necesarios. Para hacerlo:
        1. Haz clic en la base de datos que creaste.
        2. Selecciona la pestaña "Importar".
        3. Carga el archivo `mtp.sql` y haz clic en "Continuar".

4. **Paso 4: Configuración del Archivo `config.php`**
    - Abre el archivo `config.php` y ajusta los valores de conexión a la base de datos:
      ```php
      <?php
      $host = "localhost";
      $user = "root"; // Cambia esto si tu usuario es diferente
      $password = ""; // Cambia esto si tienes una contraseña configurada
      $dbname = "proyecto"; // Nombre de la base de datos
      $conn = new mysqli($host, $user, $password, $dbname);
      if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
      }
      ?>
      ```

---

## Cómo Usar el Proyecto
1. **Iniciar la Aplicación**
    - Abre tu navegador y navega a la URL: `http://localhost/mi_proyecto/index.html`.

2. **Funcionalidades**
    - **Registro de Usuarios**:
        - Completa el formulario en `sign_up.php` para registrar un nuevo usuario.
    - **Inicio de Sesión**:
        - Usa tus credenciales para iniciar sesión en `login.php`.
    - **Cerrar Sesión**:
        - Haz clic en el enlace de "Logout" para cerrar la sesión activa.
    - **Navegación del Sitio**:
        - Explora las diferentes secciones desde el archivo `index.html`.

---

## Estructura de Archivos
- **Archivos PHP**:
    - `index.php`: Página principal.
    - `login.php`: Manejo del inicio de sesión.
    - `registrar.php`: Lógica de registro.
    - `logout.php`: Cerrar sesión.
    - `config.php`: Configuración de la conexión a la base de datos.
    - `welcome.php`: Página de bienvenida tras iniciar sesión.

- **Archivos HTML**:
    - `index.html`: Interfaz principal del proyecto.

- **Recursos**:
    - Imágenes, CSS y JS para estilizar la página.

- **Base de Datos**:
    - Archivo `mtp.sql` que contiene la estructura y datos de la base de datos necesarios para el proyecto.

---

## Notas
- Asegúrate de que las extensiones de PHP como `mysqli` estén habilitadas en XAMPP.
- Si encuentras errores, revisa el archivo de configuración `config.php` y las credenciales de acceso a la base de datos.


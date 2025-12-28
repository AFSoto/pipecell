# 📱 Pipecell - Sistema de Gestión

Pipecell es una aplicación web desarrollada en PHP para la gestión de servicios y productos. Este proyecto utiliza prácticas profesionales de desarrollo, incluyendo el manejo de variables de entorno para seguridad y el patrón Singleton para la conexión a base de datos.

## 🚀 Requisitos del Sistema

- **Servidor Local:** XAMPP / WampServer (PHP 8.0 o superior)
- **Gestor de Dependencias:** [Composer](https://getcomposer.org/) (Obligatorio)
- **Base de Datos:** MySQL / MariaDB (Puerto por defecto en este proyecto: 3307)

---

## 🛠️ Instalación y Configuración Paso a Paso

### 1. Clonar el proyecto

Primero, clona el repositorio en tu carpeta `htdocs`:
```bash
git clone https://github.com/tu-usuario/pipecell.git
cd pipecell
```

### 2. Instalar Librerías (Composer)

El proyecto utiliza la librería `phpdotenv` para gestionar credenciales. La carpeta `vendor` está excluida del repositorio por seguridad y peso, por lo que debes regenerarla ejecutando:
```bash
composer install
```

### 3. Configurar el archivo de Entorno (.env)

El archivo `.env` original contiene contraseñas reales y está oculto por Git. Para que el proyecto funcione, debes crear uno nuevo:

1. Localiza el archivo `.env.example` en la raíz
2. Crea una copia y renómbrala a `.env`
3. Edita el archivo `.env` con tus datos locales:
```env
DB_HOST=localhost
DB_PORT=3307
DB_NAME=pipecel
DB_USER=root
DB_PASS=tu_password_de_xampp
```

### 4. Importar la Base de Datos

1. Abre phpMyAdmin
2. Crea una base de datos llamada `pipecel`
3. Importa el archivo `sql.sql` que se encuentra en la raíz del proyecto para generar las tablas y la estructura necesaria

---

## 📁 Estructura Principal

- `includes/Database.php`: Clase con patrón Singleton para la conexión segura vía PDO
- `.env`: Archivo de configuración sensible (No subir a GitHub)
- `.gitignore`: Filtro para evitar subir archivos temporales de XAMPP, VS Code y dependencias
- `vendor/`: Carpeta generada por Composer con las librerías necesarias

---

## 🔒 Seguridad

Este proyecto implementa:

- **Protección de Credenciales:** Uso de variables de entorno para evitar "hardcoding" de contraseñas
- **PDO:** Uso de objetos de datos de PHP para prevenir inyecciones SQL
- **Git Security:** Uso de `.gitignore` para prevenir fugas de información sensible

---

## 📝 Licencia

Este proyecto es de uso educativo y personal.
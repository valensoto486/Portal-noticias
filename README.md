# Medellín Hoy - Proyecto

## Descripción
Medellín Hoy es una plataforma digital que busca informar a la comunidad sobre las últimas noticias y eventos en Medellín. A través de un blog, los usuarios pueden leer y comentar sobre diversas noticias, así como interactuar en un foro de discusión.

## Características
- **Interfaz amigable**: Diseño responsivo y fácil de usar.
- **Registro de usuarios**: Permite a los usuarios registrarse, iniciar sesión y gestionar su perfil.
- **Publicación de noticias**: Los administradores pueden crear, editar y eliminar noticias.
- **Comentarios**: Los usuarios pueden dejar comentarios en las noticias, los cuales deben ser aprobados por un administrador.
- **Foro de discusión**: Espacio donde los usuarios pueden discutir sobre diferentes temas.
- **Notificaciones**: Los usuarios reciben notificaciones sobre nuevos comentarios y respuestas.

## Tecnologías Utilizadas
- **Backend**: Laravel
- **Frontend**: Blade, Bootstrap, Vite
- **Base de datos**: MySQL
- **Control de versiones**: Git

## Estructura del Proyecto
.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── AboutController.php
│   │   │   ├── AdminController.php
│   │   │   ├── CommentController.php
│   │   │   ├── ForumController.php
│   │   │   └── ...
│   ├── Models
│   │   ├── Comment.php
│   │   ├── Forum.php
│   │   └── ...
├── database
│   ├── migrations
│   │   ├── 2024_09_30_223446_forum_notice.php
│   │   ├── 2024_10_31_004328_create_comments_tablee.php
│   │   └── ...
│   ├── seeders
│   │   ├── DatabaseSeeder.php
│   │   └── ForumSeeder.php
├── resources
│   ├── views
│   │   ├── about.blade.php
│   │   ├── index.blade.php
│   │   ├── components
│   │   │   ├── footer.blade.php
│   │   │   ├── header.blade.php
│   │   │   └── ...
│   │   └── ...
├── routes
│   ├── web.php
├── .env
├── composer.json
└── ...


## Instalación
1. Clona el repositorio:

    ```bash
    git clone https://github.com/tuusuario/medellin-hoy.git
    cd medellin-hoy
    ```

2. Instala las dependencias de PHP:

    ```bash
    composer install
    ```

3. Configura el archivo `.env`:

    - Copia el archivo `.env.example` a `.env` y configura las variables de entorno (base de datos, etc.).
    
4. Genera la clave de la aplicación:

    ```bash
    php artisan key:generate
    ```

5. Ejecuta las migraciones:

    ```bash
    php artisan migrate
    ```

6. Inicia el servidor:

    ```bash
    php artisan serve
    ```

## Contribuciones
Las contribuciones son bienvenidas. Si deseas contribuir, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz un commit (`git commit -m 'Agregada nueva funcionalidad'`).
4. Haz push a la rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## Licencia
Este proyecto está bajo la Licencia MIT. Consulta el archivo LICENSE para más información.

## Contacto
Para más información, puedes contactar a los autores:

- Valentina Soto
- Alejandro Gómez
- Julian Rodriguez

¡Gracias por tu interés en Medellín Hoy!

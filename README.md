**# UNBC

## Prerrequisitos

Asegúrate de tener instalado lo siguiente en tu sistema:

- Node.js v16.20.2
- Composer

## Instalación

1. Clona el repositorio:

```bash
git clone https://url-del-repositorio.git
cd nombre-del-repositorio
**
```
2. Instala las dependencias de PHP:
```bash
composer install
```

3. Copia el archivo de entorno y genera una clave de aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

4. Crea una base de datos MySQL y actualiza las credenciales en el archivo .env.

5. Ejecuta las migraciones para crear las tablas de la base de datos:
```bash
php artisan migrate
```

6. Instala Vite como una dependencia de desarrollo:
```bash
npm install vite --save-dev
```

7. Compila los assets con Vite:
```bash
npm run dev
```

7. Inicia el servidor de desarrollo de Laravel:
```bash
php artisan serve
```

8. Uso

Una vez que el servidor esté en funcionamiento, puedes acceder a la aplicación en tu navegador web ingresando la siguiente URL:

http://127.0.0.1:8000/
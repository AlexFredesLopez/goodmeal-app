# Goodmeal App

A continuación se detalla de manera sencilla las configuraciones iniciales del proyecto

Dentro del proyecto existe un archivo llamado `open-api.yml`. Este archivo es la estrucutra de los métodos de la api.
## Installation

El proyecto tiene un archivo `docker-compose.yml`. Debes tener instalado docker en tu equipo.

Comandos

```sh
docker-compose up -d
```
## Endpoint

A continuación se detalla las URL de los servicios

| Plugin | README |
| ------ | ------ |
| API | http://localhost:8181 |
| Web | http://localhost:8080 |
| Phpmyadmin  | http://localhost:8100 |

## Importante

Para que la aplicación de la `API` funcione correctamente, se debe copiar el arcivo `.envexample` a uno llamado `.env`

Las credenciales se encuentran en la raíz del proyecto en un archivo `.env`

La DB se encuentra en un archivo persistente dentro del proyecto
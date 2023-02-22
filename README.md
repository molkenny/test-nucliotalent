# Prueba técnica Backend

- Puedes elegir el lenguaje, framework y librerías que prefieras.
- Es imprescindible el uso de Git como control de versiones, la entrega será el acceso al repositorio, alojado en Github, Gitlab o Bitbucket.
- Se valorará toda buena práctica, patrones y metodologías aplicadas para que el código sea mantenible en el tiempo.
- Buscamos una solución de la que estés orgulloso.

### Implementa una API con un solo endpoint siguiendo la siguiente definición

POST `/api/v1/short-urls` 

- Recibe un body con los siguiente requisitos:

```html
url: string, required
```

- Devuelve un objeto JSON con la siguiente estructura:

```json
{
	"url": "https://example.com/12345"
}
```

 `url`  deberá apuntar a un acortador de urls, y al acceder deberá redireccionar a la url original recibida en el body de la petición.

Utiliza una API pública a tu elección, recomendamos tinyurl con su API: `GET [https://tinyurl.com/api-create.php?url=http://www.example.com](https://tinyurl.com/api-create.php?url=http://www.example.com)`

### Autorización

La autorización será tipo "Bearer Token", por ejemplo: `Authorization: Bearer my-token`.

Cualquier token que cumpla con el problema de los paréntesis (descrito a continuación) es un token válido, por ejemplo: `Authorization: Bearer []{}`

### Problema de los paréntesis

Dada una cadena que contiene tan solo los caracteres `{`, `}`, `[`, `]`, `(` y `)` determina si la entrada es válida.

La entrada es válida si cumple las siguientes condiciones:

- Los paréntesis/llaves/corchetes abiertos se deben cerrar con el mismo tipo.
- Los paréntesis/llaves/corchetes abiertos se deben cerrar en el orden correcto.

Nota: una cadena vacía es considerada válida.

Ejemplos:

- `{}` - `true`
- `{}[]()` - `true`
- `{)` - `false`
- `[{]}` - `false`
- `{([])}` - `true`
- `(((((((()` - `false`

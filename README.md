# Alta de Ticket - Arquitectura en tres capas (PHP)

## Cómo ejecutarlo
1. Importar `database.sql` en MySQL.
2. Copiar `config/config.example.php` a `config/config.php` y completar los datos.
3. Desde la carpeta del proyecto: `php -S localhost:8000 -t public`
4. Abrir http://localhost:8000/tickets/crear.php

## Comentario
- **Presentación:** `public/tickets/crear.php` (formulario, recepción de datos, mensajes).
- **Negocio:** `negocio/Ticket.php` (el Ticket y sus reglas, incluido el estado inicial `pendiente`).
- **Persistencia:** `datos/Conexion.php` y `datos/TicketRepository.php` (acceso a la base y el INSERT).

El INSERT está en `TicketRepository` para que el SQL quede aislado de la interfaz y de las reglas; si cambia la base, solo se toca esa clase.
El estado `pendiente` es una regla de negocio: la define la clase `Ticket` y no el formulario, así el usuario no puede alterarla y se cumple desde cualquier punto de entrada.

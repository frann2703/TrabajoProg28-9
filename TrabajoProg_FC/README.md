# Alta de Ticket - Arquitectura en tres capas

Aplicación PHP que registra tickets en MySQL.

- **Presentación:** `public/tickets/crear.php` (formulario y mensajes).
- **Negocio:** `negocio/Ticket.php` (entidad y reglas; estado inicial "pendiente").
- **Persistencia:** `datos/TicketRepository.php` y `datos/Conexion.php` (acceso a BD).

## Instalación
1. Ejecutar `database.sql`.
2. Copiar `config/config.example.php` a `config/config.php` y completar credenciales.
3. `php -S localhost:8000 -t public`

## Comentario
El INSERT está en TicketRepository para que el formulario no conozca la base
de datos. El estado "pendiente" lo fija la clase Ticket porque es una regla del
sistema y no una decisión del usuario ni de la interfaz.
<?php
// CAPA DE PRESENTACIÓN: formulario, recepción de datos y mensajes.
// No contiene SQL ni reglas de negocio.

require_once __DIR__ . '/../../negocio/Ticket.php';
require_once __DIR__ . '/../../datos/TicketRepository.php';

$mensaje = '';
$exito = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $ticket = new Ticket($_POST['titulo'] ?? '', $_POST['descripcion'] ?? '');
        (new TicketRepository())->guardar($ticket);
        $mensaje = 'Ticket creado correctamente (estado: ' . $ticket->getEstado() . ').';
        $exito = true;
    } catch (InvalidArgumentException $e) {
        $mensaje = $e->getMessage();
    } catch (PDOException $e) {
        $mensaje = 'No se pudo guardar el ticket. Intente nuevamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Ticket</title>
</head>
<body>
    <h1>Nuevo Ticket</h1>

    <?php if ($mensaje !== ''): ?>
        <p style="color: <?= $exito ? 'green' : 'red' ?>;">
            <?= htmlspecialchars($mensaje) ?>
        </p>
    <?php endif; ?>

    <form method="post">
        <p>
            <label>Título<br>
                <input type="text" name="titulo" maxlength="150" required>
            </label>
        </p>
        <p>
            <label>Descripción<br>
                <textarea name="descripcion" rows="5" cols="40" required></textarea>
            </label>
        </p>
        <button type="submit">Crear ticket</button>
    </form>
</body>
</html>

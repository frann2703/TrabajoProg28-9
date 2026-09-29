<?php
require_once __DIR__ . '/../negocio/Ticket.php';
require_once __DIR__ . '/Conexion.php';

class TicketRepository
{
    private PDO $pdo;

    public function __construct(?PDO $pdo = null)
    {
        $this->pdo = $pdo ?? Conexion::obtener();
    }

    public function guardar(Ticket $ticket): void
    {
        $sql = "INSERT INTO ticket (titulo, descripcion, estado)
                VALUES (:titulo, :descripcion, :estado)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':titulo'      => $ticket->getTitulo(),
            ':descripcion' => $ticket->getDescripcion(),
            ':estado'      => $ticket->getEstado(),
        ]);

        $ticket->setId((int) $this->pdo->lastInsertId());
    }
}
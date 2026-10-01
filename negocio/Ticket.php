<?php


class Ticket
{
    public const ESTADO_PENDIENTE = 'pendiente';

    private ?int $id = null;
    private string $titulo;
    private string $descripcion;
    private string $estado;

    public function __construct(string $titulo, string $descripcion)
    {
        $titulo = trim($titulo);
        $descripcion = trim($descripcion);

        // Regla de negocio: título y descripción son obligatorios
        if ($titulo === '') {
            throw new InvalidArgumentException('El título es obligatorio.');
        }
        if ($descripcion === '') {
            throw new InvalidArgumentException('La descripción es obligatoria.');
        }

        $this->titulo = $titulo;
        $this->descripcion = $descripcion;

        // Regla de negocio: todo Ticket nuevo comienza como "pendiente"
        $this->estado = self::ESTADO_PENDIENTE;
    }

    public function getId(): ?int { return $this->id; }
    public function setId(int $id): void { $this->id = $id; }
    public function getTitulo(): string { return $this->titulo; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getEstado(): string { return $this->estado; }
}

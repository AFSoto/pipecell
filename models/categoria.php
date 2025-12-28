

<?php
class Categoria
{
    private int $id;
    private string $nombre;
    private ?string $descripcion = null;


    // Getters
    public function getId(): int
    {
        return $this->id;
    }


    public function getNombre(): string
    {
        return $this->nombre;
    }


    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }


    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }


    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
}

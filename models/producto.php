


<?php

class Producto
{
    private int $id;
    private int $categoria_id;
    private string $codigo;
    private string $nombre;
    private ?string $descripcion = null;
    private float $precio_compra;
    private float $precio_venta;
    private int $stock;
    private string $estado = 'activo';
    


    // Getters
    public function getId(): int
    {
        return $this->id;
    }


    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }


    public function getCodigo(): string
    {
        return $this->codigo;
    }


    public function getNombre(): string
    {
        return $this->nombre;
    }


    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }


    public function getPrecioCompra(): float
    {
        return $this->precio_compra;
    }


    public function getPrecioVenta(): float
    {
        return $this->precio_venta;
    }


    public function getStock(): int
    {
        return $this->stock;
    }


    public function getEstado(): string
    {
        return $this->estado;
    }


    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function setCategoriaId(int $categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }


    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }


    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }


    public function setPrecioCompra(float $precio_compra): void
    {
        $this->precio_compra = $precio_compra;
    }


    public function setPrecioVenta(float $precio_venta): void
    {
        $this->precio_venta = $precio_venta;
    }


    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }
}
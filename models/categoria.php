

<?php
class Categoria
{
    private int $id;
    private string $nombre;
    private ?string $descripcion = null;
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }


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

    public function save(): bool {
        try {
            $sql = "INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)";
            $stmt = $this->db->prepare($sql);
            
            $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log de error técnico
            error_log("Error al guardar categoría: " . $e->getMessage());
            return false;
        }
    }

    public function getAll(): bool|object {
        try{
            $sql = "SELECT * FROM categorias WHERE estado = 'activo' ORDER BY nombre ASC";
            $stmt = $this->db->query($sql);

            //retornamos el resultado para que el controlador lo procese
            return $stmt;

        }catch (PDOException $e){
            error_log("error al listar las categorias:" .$e->getMessage());
            return false;
        }
    }

    public function edit(): bool {
    try {
        // Construimos la base de la consulta
        $sql = "UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        
        // Vinculamos los valores actuales del objeto
        // Si un setter no se usó, el objeto conservará el valor previo o nulo
        $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error al actualizar categoría: " . $e->getMessage());
        return false;
    }
}

// Método adicional necesario para cargar los datos antes de editar
public function getOne(): object {
    $sql = "SELECT * FROM categorias WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}
    

// Cambiamos el DELETE real por un UPDATE de estado
public function delete(): bool {
    try {
        $sql = "UPDATE categorias SET estado = 'inactivo' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error al desactivar categoría: " . $e->getMessage());
        return false;
    }
}


}

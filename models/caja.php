

<?php


class Caja
{
    private int $id = 0;
    private ?string $nombre = ''; // Inicializado
    private ?string $descripcion = null;
    private string $estado = '';
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


    public function getNombre()
    {
        return $this->nombre;
    }


    public function getDescripcion(): ?string
    {
        return $this->descripcion;
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


    public function setNombre($numero): void
    {
        $this->nombre = $numero;
    }


    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }


    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getLibres(): array|bool
    {
        try {
            // 1. Definir la consulta SQL con la condición WHERE
            $sql = "SELECT id, nombre 
                    FROM cajas 
                    WHERE estado = :estado_libre
                    ORDER BY id ASC";
            
            // 2. Preparar la consulta
            $stmt = $this->db->prepare($sql);
            
            // 3. Ejecutar la consulta con el parámetro 'libre'
            $stmt->execute([':estado_libre' => 'libre']);
            
            // 4. Obtener todos los resultados
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            // Manejo de errores de la BD
            // throw $e; // Opcional: relanzar para que el controlador lo capture
            return false; // Indicamos que la operación falló
        }
    }

    public function updateEstado(): bool
{
    try {
        // Usamos los valores seteados previamente en el objeto
        $sql = "UPDATE cajas SET estado = :estado WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':estado', $this->getEstado(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        // error_log("Error en Caja->updateEstado: " . $e->getMessage());
        return false;
    }
}

public function save(): bool {
        try {
            $sql = "INSERT INTO cajas (nombre, descripcion, estado) VALUES (:nombre, :descripcion, :estado)";
            $stmt = $this->db->prepare($sql);
            
            $stmt->bindValue(':nombre', $this->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(':descripcion', $this->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindValue(':estado', $this->getEstado(), PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            // Podrías loguear el error: error_log($e->getMessage());
            return false;
        }
    }
}
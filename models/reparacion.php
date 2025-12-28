<?php

require_once 'caja.php';

class Reparacion {
    // --- PROPIEDADES ---
    private int $id = 0;
    private ?string $nombre_usuario = null;
    private ?string $cedula_usuario = null; 
    private string $nombre_cliente = ""; // Inicializado
    private ?string $telefono_cliente = null;
    private int $caja_id = 0;
    private string $marca = ""; // Inicializado
    private ?string $modelo = null;
    private ?string $descripcion_falla = null;
    private float $valor_total = 0.0; // Inicializado
    private float $abono = 0.0;
    private string $estado = 'en_proceso';
    private PDO $db;

    // --- CONSTRUCTOR ---
    public function __construct()
    {
        // Conexión segura a la BD usando el patrón Singleton
        $this->db = Database::getConnection(); 
    }

    // --- SETTERS (Inyección de datos limpios) ---

    // Setters para los campos de usuario (opcionales)
    public function setNombreUsuario(string $nombre_usuario): void {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setCedulaUsuario(string $cedula_usuario): void {
        $this->cedula_usuario = $cedula_usuario;
    }
    
    // Setters para los campos de la reparación (con tipado estricto)
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNombreCliente(string $nombre_cliente): void {
        $this->nombre_cliente = $nombre_cliente;
    }

    public function setTelefonoCliente(?string $telefono_cliente): void {
        $this->telefono_cliente = $telefono_cliente;
    }

    public function setCajaId(int $caja_id): void {
        $this->caja_id = $caja_id;
    }

    public function setMarca(string $marca): void {
        $this->marca = $marca;
    }

    public function setModelo(string $modelo): void {
        $this->modelo = $modelo;
    }
    
    public function setDescripcionFalla(?string $descripcion_falla): void {
        $this->descripcion_falla = $descripcion_falla;
    }

    public function setValorTotal(float $valor_total): void {
        $this->valor_total = $valor_total;
    }

    public function setAbono(float $abono): void {
        $this->abono = $abono;
    }
    
    public function setEstado(string $estado): void {
        // Opcional: Validar que el estado sea uno de los ENUM permitidos
        if (in_array($estado, ['en_proceso', 'arreglado', 'entregado'])) {
            $this->estado = $estado;
        }
    }


    // --- GETTERS (Recuperación de datos) ---

    public function getId(): int {
        return $this->id;
    }

    public function getNombreUsuario(): ?string {
        return $this->nombre_usuario;
    }

    public function getCedulaUsuario(): ?string {
        return $this->cedula_usuario;
    }

    public function getNombreCliente(): string {
        return $this->nombre_cliente;
    }

    public function getTelefonoCliente(): ?string {
        return $this->telefono_cliente;
    }

    public function getCajaId(): int {
        return $this->caja_id;
    }

    public function getMarca(): string {
        return $this->marca;
    }

    public function getModelo(): string {
        return $this->modelo;
    }
    
    public function getDescripcionFalla(): ?string {
        return $this->descripcion_falla;
    }

    public function getValorTotal(): float {
        return $this->valor_total;
    }

    public function getAbono(): float {
        return $this->abono;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    // --- MÉTODOS CRUD (Operaciones de seguridad) ---

    /**
     * Guarda una nueva reparación en la base de datos.
     * Utiliza sentencias preparadas (Binding) para evitar la inyección SQL (SQL Injection).
     * @return bool True si la inserción fue exitosa.
     */
    public function save(): bool
    {
        $sql = "INSERT INTO reparaciones (
                    nombre_cliente, telefono_cliente, caja_id, marca, modelo, 
                    descripcion_falla, valor_total, abono, estado
                ) VALUES (
                    :nombre_cliente, :telefono_cliente, :caja_id, :marca, :modelo, 
                    :descripcion_falla, :valor_total, :abono, :estado
                )";

        try {
            $stmt = $this->db->prepare($sql);
            
            // Binding seguro de parámetros: PDO gestiona automáticamente la sanitización aquí.
            $result = $stmt->execute([
                ':nombre_cliente'    => $this->getNombreCliente(), // Usamos getters para asegurar el valor
                ':telefono_cliente'  => $this->getTelefonoCliente(),
                ':caja_id'           => $this->getCajaId(),
                ':marca'             => $this->getMarca(),
                ':modelo'            => $this->getModelo(),
                ':descripcion_falla' => $this->getDescripcionFalla(),
                ':valor_total'       => $this->getValorTotal(),
                ':abono'             => $this->getAbono(),
                ':estado'            => $this->getEstado()
            ]);

            return $result;
            
        } catch (PDOException $e) {
            // Manejo de errores: En producción, esto debería ir a un log, no al usuario.
            // error_log("Error de BD en Reparacion->save(): " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Obtiene una reparación por su ID.
     * @param int $id
     * @return Reparacion|null
     */
    public function getOne(int $id): ?Reparacion 
    {
        $sql = "SELECT * FROM reparaciones WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $reparacion = new Reparacion();
            // Esto es solo un ejemplo, en un proyecto grande usarías un hydrator o un ORM
            $reparacion->setId($data['id']);
            $reparacion->setNombreCliente($data['nombre_cliente']);
            $reparacion->setMarca($data['marca']);
            // ... (Setear el resto de las propiedades)
            
            return $reparacion;
        }
        return null;
    }

    /**
     * Obtiene todos los registros de reparaciones
     * @return array|bool
     */
    public function getAll(): array|bool
    {
        try {
            $sql = "SELECT * FROM reparaciones ORDER BY id DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getEnProceso(): array|bool
    {
        try {
            $estado = 'en_proceso';
            $sql = "SELECT * FROM reparaciones WHERE estado = :estado ORDER BY id DESC";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getArregladas(): array|bool
    {
        try {
            $estado = 'arreglado';
            $sql = "SELECT * FROM reparaciones WHERE estado = :estado ORDER BY id DESC";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getEntregadas(): array|bool
    {
        try {
            $estado = 'entregado';
            $sql = "SELECT * FROM reparaciones WHERE estado = :estado ORDER BY id DESC";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateStatus(): bool {
    // Definir estado de la caja basado en el estado seteado en esta reparación
    $nuevo_estado_caja = ($this->getEstado() === 'entregado') ? 'libre' : 'ocupada';

    try {
        $this->db->beginTransaction();

        // 1. Actualizar Reparación
        $sqlRep = "UPDATE reparaciones SET estado = :estado WHERE id = :id";
        $stmtRep = $this->db->prepare($sqlRep);
        $stmtRep->bindValue(':estado', $this->getEstado(), PDO::PARAM_STR);
        $stmtRep->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $ok1 = $stmtRep->execute();

        // 2. Actualizar Caja
        $caja = new Caja();
        $caja->setId($this->getCajaId()); // Usamos el ID de caja guardado en este objeto
        $caja->setEstado($nuevo_estado_caja);
        $ok2 = $caja->updateEstado(); // El método de Caja que usa $this->id y $this->estado

        if ($ok1 && $ok2) {
            $this->db->commit();
            return true;
        }

        $this->db->rollBack();
        return false;
    } catch (Exception $e) {
        if ($this->db->inTransaction()) $this->db->rollBack();
        return false;
    }
}
}
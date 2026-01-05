<?php

class User {
    private int $id;
    private int $tipo_id;
    private string $nombre;
    private string $email;
    private string $password;
    private string $estado;
    private ?string $last_login; // El "?" permite que sea nulo si nunca ha entrado
    private string $created_at;
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // --- GETTERS ---

    public function getId(): int {
        return $this->id;
    }

    public function getTipoId(): int {
        return $this->tipo_id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getLastLogin(): ?string {
        return $this->last_login;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    // --- SETTERS ---

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setTipoId(int $tipo_id): void {
        $this->tipo_id = $tipo_id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = trim($nombre);
    }

    public function setEmail(string $email): void {
        $this->email = trim(strtolower($email));
    }

    public function setPassword(string $password): void {
        // Aquí guardamos la contraseña. 
        // Si es para registro, se hashea en el controlador o antes de save()
        $this->password = $password;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function setLastLogin(?string $last_login): void {
        $this->last_login = $last_login;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }

    // --- MÉTODOS DE LÓGICA ---

    /**
     * Verifica las credenciales del usuario usando las propiedades cargadas
     */
    public function login(): bool|object {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = :email AND estado = 'activo'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt && $stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);

            // Verificar la contraseña
            $verify = password_verify($password, $usuario->password);
            

            if ($verify) {
                $this->updateLastLogin($usuario->id);
                $result = $usuario;
            }
        }

        return $result;
    }

    /**
     * Actualiza la fecha de acceso
     */
    private function updateLastLogin(int $id): void {
        $sql = "UPDATE usuarios SET last_login = NOW() WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
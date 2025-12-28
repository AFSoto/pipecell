<?php

class Database
{
    /**
     * Instancia única (pool)
     */
    private static ?PDO $connection = null;

    /**
     * Atributos de configuración (ahora son propiedades, no constantes)
     */
    private static string $host;
    private static string $dbname;
    private static string $user;
    private static string $pass;
    private static string $port;
    private static string $charset = 'utf8mb4';

    /**
     * Constructor privado (no se puede instanciar)
     */
    private function __construct() {}

    /**
     * Obtiene una conexión activa (pooling)
     */
    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            // Asignamos los valores de $_ENV a los atributos de la clase
            self::$host   = $_ENV['DB_HOST'] ?? 'localhost';
            self::$dbname = $_ENV['DB_NAME'] ?? '';
            self::$user   = $_ENV['DB_USER'] ?? 'root';
            self::$pass   = $_ENV['DB_PASS'] ?? '';
            self::$port   = $_ENV['DB_PORT'] ?? '3306';
            try {
                $dsn = sprintf(
                    "mysql:host=%s;port=%s;dbname=%s;charset=%s",
                    self::$host,
                    self::$port,
                    self::$dbname,
                    self::$charset
                );

                self::$connection = new PDO($dsn, self::$user, self::$pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT         => true, // 🔥 CONNECTION POOLING
                ]);

            } catch (PDOException $e) {
                die('Error de conexión: ' . $e->getMessage());
            }
        }

        return self::$connection;
    }

    /**
     * Evitar clonación
     */
    private function __clone() {}

    /**
     * Evitar deserialización
     */
    public function __wakeup()
    {
        throw new Exception("No se puede deserializar Database");
    }
}

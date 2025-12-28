<?php

class Database
{
    /**
     * Instancia única (pool)
     */
    private static ?PDO $connection = null;

    /**
     * Configuración
     */
    private const HOST = 'localhost';
    private const DBNAME = 'pipecel';
    private const USER = 'root';
    private const PASS = '1234567';
    private const CHARSET = 'utf8mb4';
    private const PORT = '3307'; //

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
            try {
                $dsn = sprintf(
                    "mysql:host=%s;port=%s;dbname=%s;charset=%s",
                    self::HOST,
                    self::PORT,
                    self::DBNAME,
                    self::CHARSET
                );

                self::$connection = new PDO($dsn, self::USER, self::PASS, [
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

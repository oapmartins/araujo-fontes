<?php

namespace App\Db;

use \PDO;
use PDOException;

class Database
{

    /**
     * Host de conexão com o Banco de Dados.
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de Dados.
     * @var string
     */
    const NAME = 'base_araujo_fontes';

    /**
     * Usuário do Banco de Dados
     * @var string
     */
    const USER = 'root';

    /**
     * Senha de acesso ao Banco de Dados
     * @var string
     */
    const PASSWORD = '';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instancia de conexão com o banco de dados.
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão
     * @param stirng $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Metodo responsável po criar uma instancia com o banco de dados.
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASSWORD);;
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Metodo responsavel por executar as querys no banco de dados.
     * @param string $query
     * @param array $params
     * @return PDOstatment
     */
    public function execute($query, $params = [])
    {
        try {
            $statment = $this->connection->prepare($query);
            $statment->execute($params);
            return $statment;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Metodo responsavel por inserir dados no banco.
     * @param array $values ['field' => value]
     * @return integer ID inserido
     */
    public function insert($values)
    {

        // Dados da Query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // Monta a query
        $query = "INSERT INTO " . $this->table . " (" . implode(',', $fields) . ") VALUES (" . implode(',', $binds) . ")";

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    /**
     * Metodo responsavel por Atualização no dados no banco.
     * @param string $where
     * @param array $values ['field' => value]
     * @return boolean
     */
    public function update($where, $values)
    {

        // Dados da Query
        $fields = array_keys($values);

        // Monta a query
        $query = "UPDATE " . $this->table . " SET " . implode('=?,', $fields) . "=? WHERE " . $where;

        $this->execute($query, array_values($values));
        return true;
    }

    /**
     * Metodo responsavel por Excluir dados do Banco.
     * @param string $where
     * @return boolean
     */
    public function delete($where)
    {

        // Monta a query
        $query = "DELETE FROM " . $this->table . " WHERE " . $where;

        $this->execute($query);
        return true;
    }


    /**
     * Metodo responsável por executar uma consulta no banco.
     * @param string $where
     * @param string $order
     * @param string limit
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {

        // Dados da Query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        // Monta a Query
        $query = "SELECT " . $fields . " FROM " . $this->table . " " . $where . " " . $order . " " . $limit;

        return $this->execute($query);
    }
}

<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Patrimonio{

    /**
     * ID do Patrimônio
     * @var integer 
     */
    public $id;

    /**
     * Data do Patrimônio
     * @var datetime
     */
    public $date;

    /**
     * ID do Fundo escolhido (1,2,3,4).
     * @var integer
     */
    public $fundo_id;

    /**
     * Valor do Patrimônio
     * @var number
     */
    public $value;

    /**
     * Data da Criação
     * @var datetime
     */
    public $created_at;

     /**
     * Data de Atualização
     * @var datetime
     */
    public $updated_at;

    /**
     * Metodo responsavel por cadastrar o novo Patrimônio
     * @return boolean
     */
    public function cadastrar(){

        $this->date         = date('Y-m-d H:i:s');
        $this->created_at   = date('Y-m-d H:i:s');
        $objDatabase = new Database('patrimonios');
        $this->id = $objDatabase->insert([
            'date'       => $this->date,
            'fundo_id'   => $this->fundo_id,
            'value'      => $this->value,
            'created_at' => $this->created_at,
        ]);

        return true;
    }

        /**
     * Metodo responsavel por Atualizar um Patrimônio
     * @return boolean
     */
    public function atualizar(){

        $this->updated_at   = date('Y-m-d H:i:s');

        return (new Database('patrimonios'))->update('id = ' .$this->id, [
            'date'       => $this->date,
            'fundo_id'   => $this->fundo_id,
            'value'      => $this->value,
            'updated_at' => $this->updated_at,
        ]);
        return true;
    }

    
    /**
     * Metodo responsavel por Excluir o Patrimônio no dados no banco.
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('patrimonios'))->delete('id = ' . $this->id);
    }


    /**
     * Metodo responsável por obter as Querys do Banco de Dados.
     * @param string $where
     * @param string $order
     * @param string limit
     * @return array
     */
    public static function getPatrimonios($where = null, $order = null, $limit = null){
        return (new Database('patrimonios'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

        /**
     * Metodo responsável por buscar um Patrimonio com base no seu ID
     * @param string $where
     * @param string $order
     * @param string limit
     * @return array
     */
    public static function getPatrimonio($id){
        return (new Database('patrimonios'))->select('id = ' .$id)->fetchObject(self::class);
    }
}
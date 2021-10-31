<?php

namespace App\Entity;

use App\Db\Database;

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
    public $created_ad;

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

        $objDatabase = new Database('patrimonios');

        $this->id = $objDatabase->insert([
            'date'       => $this->date,
            'fundo_id'   => $this->fundo_id,
            'value'      => $this->value,
        ]);

        var_dump($this);
    }
}
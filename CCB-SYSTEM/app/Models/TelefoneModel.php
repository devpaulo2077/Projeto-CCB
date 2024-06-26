<?php

namespace App\Models;

use CodeIgniter\Model;

class TelefoneModel extends Model
{
    protected $table            = 'telefone';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_usuarios','tel'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function CadastrarTel($celular){
        $db = \Config\Database::connect();

        $dados = [
            'id_usuarios' => $db->insertID(),
            'tel' => $celular
        ];

        $retorno = $this->insert($dados);

        if($retorno){
            return true;
        }
        else{
            return false;
        }
    }
    public function buscarComID($id){
        $resultado = $this->where('id_usuarios', $id)->first();
        if($resultado){
            return $resultado;
        } else {
            echo 'Erro ao achar usuário em nossa base de dados.';
        }
    }

    public function atualizarTelefone($dados)
    {
        $id = $dados['id_usuarios'];
        $this->update($id,$dados);
        return true;
    }
}

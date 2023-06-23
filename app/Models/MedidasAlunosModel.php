<?php

namespace App\Models;

use CodeIgniter\Model;

class MedidasAlunosModel extends Model
{
    protected $table = 'medidas_alunos';
    protected $primaryKey = 'id_medidaaluno';
    protected $allowedFields = ['id_medidaaluno', 'medidaDL54_id', 'aluno_id'];

    // Aqui você pode adicionar outras configurações do modelo, como validações, timestamps, etc.
}

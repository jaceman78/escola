<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MedidasAlunosModel;

class MedidasAlunos extends BaseController
{

    public function index($aluno_id)
    {
        // Crie uma instância do modelo 'MedidasAlunosModel'
        $medidasAlunosModel = new MedidasAlunosModel();

        // Recupere os registros da tabela 'medidas_alunos' para o aluno_id específico
        $registros = $medidasAlunosModel->where('aluno_id', $aluno_id)->findAll();

        // Envie os registros como uma resposta JSON para o Ajax
        return $this->response->setJSON(['registros' => $registros]);
    }

    public function atualizar()
    {
        // Obtenha os dados enviados através do Ajax
        $idMedidaAluno = $this->request->getPost('id_medidaaluno');
        $medidaDL54Id = $this->request->getPost('medidaDL54_id');
        $alunoId = $this->request->getPost('aluno_id');

        // Valide e processe os dados conforme necessário

        // Crie uma instância do modelo 'MedidasAlunosModel'
        $medidasAlunosModel = new MedidasAlunosModel();

        // Verifique se o registro já existe na tabela
        $registroExistente = $medidasAlunosModel->find($idMedidaAluno);

        if ($registroExistente) {
            // Atualize o registro existente
            $data = [
                'medidaDL54_id' => $medidaDL54Id,
                'aluno_id' => $alunoId
            ];
            $medidasAlunosModel->update($idMedidaAluno, $data);
        } else {
            // Crie um novo registro
            $data = [
                'id_medidaaluno' => $idMedidaAluno,
                'medidaDL54_id' => $medidaDL54Id,
                'aluno_id' => $alunoId
            ];
            $medidasAlunosModel->insert($data);
        }

        // Envie uma resposta adequada para o Ajax
        return $this->response->setJSON(['status' => 'success']);
    }
    public function delete()
    {
        $alunoId = $this->request->getPost('alunoId');
        $medidaId = $this->request->getPost('medidaId');
    
        // Crie uma instância do modelo 'MedidasAlunosModel'
        $medidasAlunosModel = new MedidasAlunosModel();
    
        // Encontre e remova o registro correspondente pelo alunoId e medidaId
        $medidasAlunosModel->where('aluno_id', $alunoId)
                           ->where('medidaDL54_id', $medidaId)
                           ->delete();
    
        return $this->response->setJSON(['success' => true]);
    }
    

}

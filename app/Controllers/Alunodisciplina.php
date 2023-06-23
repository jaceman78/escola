<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AlunodisciplinaModel;

class Alunodisciplina extends BaseController
{

    public function index($aluno_id)
    {
        // Crie uma instância do modelo 'MedidasAlunosModel'
        $alunodisciplinaModel = new AlunodisciplinaModel();

        // Recupere os registros da tabela 'medidas_alunos' para o aluno_id específico
        $registros = $alunodisciplinaModel->where('aluno_id', $aluno_id)->findAll();

        // Envie os registros como uma resposta JSON para o Ajax
        return $this->response->setJSON(['registros' => $registros]);
    }

    public function atualizar()
    {
        // Obtenha os dados enviados através do Ajax
        $idalunodisciplina = $this->request->getPost('idalunodisciplina');       
        $disciplina_id = $this->request->getPost('disciplina_id');
        $alunoId = $this->request->getPost('aluno_id');


        // Valide e processe os dados conforme necessário

        // Crie uma instância do modelo 'AlunodisciplinaModel'
        $alunodisciplinaModel = new AlunodisciplinaModel();

        // Verifique se o registro já existe na tabela
        $registroExistente = $alunodisciplinaModel->find($idalunodisciplina);

        if ($registroExistente) {
            // Atualize o registro existente
            $data = [
                'id_alunodisciplina' => $idalunodisciplina,
                'disciplina_id' => $disciplina_id,
                'aluno_id' => $alunoId
            ];
            $alunodisciplinaModel->update($idalunodisciplina, $data);
            return $this->response->setJSON(['status' => 'Atualizado']);
        } else {
            // Crie um novo registro
            $data = [
                'disciplina_id' => $disciplina_id,
                'aluno_id' => $alunoId    
                
            ];
            $alunodisciplinaModel->insert($data);
            return $this->response->setJSON(['status' => 'Novo Registo']);
        }

        // Envie uma resposta adequada para o Ajax
        return $this->response->setJSON(['status' => 'success']);
    }
	
    public function delete()
    {
        $disciplina_id = $this->request->getPost('disciplina_id');
        $alunoId = $this->request->getPost('aluno_id');       
    
        // Crie uma instância do modelo 'MedidasAlunosModel'
        $alunodisciplinaModel = new AlunodisciplinaModel();
    
        // Encontre e remova o registro correspondente pelo alunoId e medidaId
        $alunodisciplinaModel->where('aluno_id', $alunoId)
            ->where('disciplina_id', $disciplina_id)
            ->delete();
    
        return $this->response->setJSON(['success' => true]);
    }
		
}	

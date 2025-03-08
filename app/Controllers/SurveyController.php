<?php

namespace App\Controllers;
use App\Models\SurveyModel;
use App\Models\ResponseModel;
use CodeIgniter\Controller;

class SurveyController extends Controller
{
    public function index()
    {
        $model = new SurveyModel();
        $data['survey'] = $model->findAll();
        return view('survey_view', $data);
    }

    public function submit()
    {
        $responseModel = new ResponseModel();
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'id_survey' => $this->request->getPost('id_survey'),
            'response' => $this->request->getPost('response'),
        ];
        $responseModel->save($data);
        return redirect()->to('/survey');
    }

    public function adminDashboard()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT id_survey, COUNT(response) as total FROM responses GROUP BY id_survey");
        $data['results'] = $query->getResult();
        return view('v_surveyadmin', $data);
    }
}

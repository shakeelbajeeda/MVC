<?php

namespace Controllers;

class companyController extends Controller
{
    public function add_company()
    {
        return $this->view('add_company');
    }
    public function save()
    {
        $company = new \Models\Companies;
        $company->name = $_POST['cname'];
        $company->ceo = $_POST['ceo'];
        $company->logo = $this->upload_img('logos');
        $company->insert();
        // upload company logo
        return $this->redirect('/companies/show_companies');
    }

    public function show_companies()
    {
        $companies = \Models\Companies::all();
        return $this->view('show_companies', ["companies" => $companies]);
    }
    public function delete()
    {
        $edit =  \Models\Companies::findById($_GET['id']);
        \Models\Companies::delete($_GET['id']);
        $this->delete_image('logos', $edit[3]);
        return $this->redirect('/companies/show_companies');
    }
    public function edit()
    {
        $edit =  \Models\Companies::findById($_GET['id']);
        return $this->view('add_company', ["company" => $edit]);
    }
    public function update()
    {
        $update = new \Models\Companies;
        $update->id = $_POST['id'];
        $update->name = $_POST['cname'];
        $update->ceo = $_POST['ceo'];
        if (!empty($_FILES['image']['name'])) {
            $update->logo = $this->upload_img('logos');
            $this->delete_image('logos', $_POST['old_image']);
        }
        $update->update();
        return $this->redirect('/companies/show_companies');
    }
}

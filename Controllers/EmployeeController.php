<?php

namespace Controllers;

class EmployeeController extends Controller
{
    public function add_employee()
    {
        $companies = \Models\Companies::all();
        return $this->view('add_employee', ["companies" => $companies]);
    }
    public function save()
    {
        $employee = new \Models\Employees;
        $employee->name = $_POST['name'];
        $employee->email = $_POST['email'];
        $employee->company = $_POST['company'];
        $employee->insert();
        return $this->redirect('/employees/show_employees');
    }
    public function show_employees()
    {
        $employee = \Models\Employees::get_all_employees();
        return $this->view('show_employees', ["employees" => $employee]);
    }
    public function edit()
    {
        $data['employees'] =  \Models\Employees::findById($_GET['id']);
        $data['companies'] = \Models\Companies::all();
        return $this->view('add_employee', $data);
    }
    public function delete()
    {
        \Models\Employees::delete($_GET['id']);
        return $this->redirect('/employees/show_employees');
    }
    public function update()
    {
        $update = new \Models\Employees;
        $update->id = $_POST['id'];
        $update->name = $_POST['name'];
        $update->email = $_POST['email'];
        $update->company = $_POST['company'];
        // die(var_export($update));
        $update->update();
        return $this->redirect('/employees/show_employees');
    }
}

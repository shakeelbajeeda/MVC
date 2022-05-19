<?php

namespace Controllers;

class HomeController extends Controller {
  function index() {
    $students = \Models\Student::all();
    return $this->view('index', ["students" => $students]);
  }

  function awais() {
    return $this->view('awais', [
      'companies' => [
        [
          'name' => 'Nodesol',
          'contact' => 'Amer Chaudhary',
          'country' => 'USA'
        ],
        [
          'name' => 'Softtech',
          'contact' => 'Tanveer Ahmed',
          'country' => 'Pakistan'
        ],
        [
          'name' => 'Infosys',
          'contact' => 'Gao Muttar',
          'country' => 'India'
        ]
      ]
    ]);
  }

  function add() {
    return $this->view('add');
  }

  function insert() {
    $student = new \Models\Student;
    $student->name = $_POST['name'];
    $student->age = $_POST['age'];
    $student->subject = $_POST['subject'];
    $student->insert();
    echo "Student Added Successfully";
    header("Location: /");
  }
}

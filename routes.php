<?php
$routes = [
  [
    'path' => '/',
    'controller' => 'HomeController',
    'action' => 'index',
  ],
  [
    'path' => '/add',
    'controller' => 'HomeController',
    'action' => 'add',
  ],
  [
    'path' => '/insert',
    'controller' => 'HomeController',
    'action' => 'insert',
  ],

  // New Curd Routes

  [
    'path' => '/companies/add_company',
    'controller' => 'CompanyController',
    'action' => 'add_company',
  ],
  [
    'path' => '/companies/save',
    'controller' => 'CompanyController',
    'action' => 'save',
  ],
  [
    'path' => '/companies/show_companies',
    'controller' => 'CompanyController',
    'action' => 'show_companies',
  ],
  [
    'path' => '/companies/delete?id=' . $_GET['id'],
    'controller' => 'CompanyController',
    'action' => 'delete',
  ],
  [
    'path' => '/companies/edit?id=' . $_GET['id'],
    'controller' => 'CompanyController',
    'action' => 'edit',
  ],
  [
    'path' => '/companies/update',
    'controller' => 'CompanyController',
    'action' => 'update',
  ],
  [
    'path' => '/employees/add_employee',
    'controller' => 'EmployeeController',
    'action' => 'add_employee',
  ],
  [
    'path' => '/employees/save',
    'controller' => 'EmployeeController',
    'action' => 'save',
  ],
  [
    'path' => '/employees/show_employees',
    'controller' => 'EmployeeController',
    'action' => 'show_employees',
  ],
  [
    'path' => '/employees/edit?id=' . $_GET['id'],
    'controller' => 'EmployeeController',
    'action' => 'edit',
  ],
  [
    'path' => '/employees/update',
    'controller' => 'EmployeeController',
    'action' => 'update',
  ],
  [
    'path' => '/employees/delete?id=' . $_GET['id'],
    'controller' => 'EmployeeController',
    'action' => 'delete',
  ],
];

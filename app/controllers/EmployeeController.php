<?php

namespace Controller;

use Repository\EmployeeRepository;

class EmployeeController {
    private $employeeRepository; 
    public function __construct(EmployeeRepository $er){
        $this->employeeRepository = $er;
    }
    public function getAll(){}
    public function getAllById(){}
    public function getAllJson() : string {
        return json_encode($this->employeeRepository->getAll());
    }

    public function getAllJsonWithMetaInformation()  {
        $employeeArray = $this->employeeRepository->getAll();
        $count = count($employeeArray);
        $ans = json_encode($employeeArray) . ', "count": ' . $count;
        return $ans;
    }
}

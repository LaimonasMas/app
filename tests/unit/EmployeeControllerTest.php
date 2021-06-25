<?php

declare(strict_types=1);

use Controller\EmployeeController;
use function PHPUnit\Framework\assertEquals;
use PHPUnit\Framework\TestCase;
use Repository\EmployeeRepository;
use Model\Employee;
use Faker\Factory;


class EmployeeContollerTest extends TestCase
{

    // STUBAS:

    // public function testGetAllJsonReturnsJson() {
    //     // given
    //     // $employeeRepository = new EmployeeRepository();
    //     $stub = $this->createStub(EmployeeRepository::class);
    //     $stub->method('getAll')->willReturn(array(
    //         new Employee(1, "Jonas"), 
    //         new Employee(2, "Petras")
    //     ));
    //     $employeeController = new EmployeeController($stub); 
    //     // when
    //     $res = $employeeController->getAllJson();
    //     // then ... turime pakeisti realiais duomenimis iš duomenų bazės!
    //     assertEquals('[{"id":1,"name":"Jonas"},{"id":2,"name":"Petras"}]', $res);
    // }

    // MOCKAS:

    public function testGetAllJsonReturnsJson()
    {
        $faker = Factory::create();
        $name1 = $faker->name;
        $name2 = $faker->name;
        $name3 = $faker->name;

        $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
        $employeeController = new EmployeeController($mock);
        $employeeArray = array(
            new Employee(1, $name1),
            new Employee(2, $name2),
            new Employee(3, $name3)
        );
        $count2 = count($employeeArray);
        $mock->expects($this->exactly(1))
            ->method('getAll')
            ->willReturn($employeeArray);
        // when
        $res = $employeeController->getAllJsonWithMetaInformation();
        print($res);
        // then
        assertEquals('[{"id":1,"name":"' . $name1 . '"},{"id":2,"name":"' . $name2 . '"},{"id":3,"name":"' . $name3 . '"}], "count": ' . $count2, $res);
    }

    // Naudojam Faker masiškai:

    // public function testGetAllJsonReturnsJson() {
    //     // given
    //     $faker = Factory::create();
    //     $employees = array();
    //     for($i = 0; $i < 10; $i++)
    //         array_push($employees, new Employee($i, $faker->name()));
    //     $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
    //     $employeeController = new EmployeeController($mock);
    //     $mock->expects($this->exactly(1))
    //         ->method('getAll')
    //         ->willReturn($employees);
    //     // when
    //     $res = $employeeController->getAllJson();
    //     // then
    //     assertEquals(json_encode($employees), $res);
    // }





}

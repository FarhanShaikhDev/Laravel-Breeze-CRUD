<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeesArr = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' =>  'jhondoe@gmail.com',
                'country_code' => 'US',
                'mobile_number' => '24214331',
                'address' => '34 Main Street, California, US',
                'gender' => 'male',
                'hobby' => json_encode(['reading','writing','travelling','singing']),
            ],
            [
                'first_name' => 'Jiya',
                'last_name' => 'Patel',
                'email' =>  'jiyapatel@gmail.com',
                'country_code' => 'IN',
                'mobile_number' => '9829819821',
                'address' => '21, Evershine Apartment S.G. Highway Ahmedabad, India',
                'gender' => 'female',
                'hobby' => json_encode(['reading','writing']),
            ]
        ];

        foreach ($employeesArr as $empData) {
            Employee::create($empData);
        }
    }
}

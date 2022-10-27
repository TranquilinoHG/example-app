<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employer;
class employersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employer1 = new Employer();
        $employer1->name = "Felipe";
        $employer1->lastName = "Guzman Lopez";
        $employer1->company_id = 1;
        $employer1->email = "Felipe@oracle.com";
        $employer1->phone = "951-123-122";
        $employer1->save();

        $employer2 = new Employer();
        $employer2->name = "Juan";
        $employer2->lastName = "Hernandez";
        $employer2->company_id = 2;
        $employer2->email = "Juan@ibm.com";
        $employer2->phone = "123-951-122";
        $employer2->save();

        
        $employer = new Employer();
        $employer->name = "Miguel";
        $employer->lastName = "Garcia";
        $employer->company_id = 3;
        $employer->email = "Miguel@google.com";
        $employer->phone = "123-122-951";
        $employer->save();

    }
}

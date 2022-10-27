<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
class companiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company1 = new Company();
        $company1->name = "Oracle";
        $company1->email = "oracle@oracle.com";
        $company1->logo = "\public\xPG5fIAMQ5yv9QyatOj5OVYqk4AU8h6pu9uulwzL.webp";
        $company1->website = "oracle.com";
        $company1->save();
        
        $company2 = new Company();
        $company2->name = "ibm";
        $company2->email = "ibm@ibm.com";
        $company2->logo = " \public\PtUh5Gf29UFJpKGHRveFh8bws8vNITnFvzOUmBtH.jpg";
        $company2->website = "ibm.com";
        $company2->save();

        $company3 = new Company();
        $company3->name = "google";
        $company3->email = "google@google.com";
        $company3->logo = "\public\ZxoMNWrEmFXcELTcBoU0Mbrz6E03q1WlXTPmfHkJ.png";
        $company3->website = "google.com";
        $company3->save();
    }
}

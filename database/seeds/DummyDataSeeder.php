<?php

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            array('name' => 'Plan 1', 'package' => '50000'),
            array('name' => 'Plan 2', 'package' => '100000'),
            array('name' => 'Plan 3', 'package' => '150000'),
            array('name' => 'Plan 4', 'package' => '200000'),
        ];

        DB::table('plans')->insert($plans);

        $services = [
            array('service' => 'Kidney dialysis', 'cost' => '125'),
            array('service' => 'MRI', 'cost' => '325'),
            array('service' => 'CT Scan', 'cost' => '175'),
            array('service' => 'Ultrasound', 'cost' => '75'),
            array('service' => 'Open heart surgery', 'cost' => '20'),
            array('service' => 'Liver transplantation', 'cost' => '100'),
            array('service' => 'Bone marrow transplantation', 'cost' => '150'),
            array('service' => 'Kidney transplantation', 'cost' => '150'),
        ];

        DB::table('medical_services')->insert($services);
    }
}

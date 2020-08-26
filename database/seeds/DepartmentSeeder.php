<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'departments_name'=>'Temp',
                'departments_number'=>1000,
                'departments_status'=> '0',
            ]
        ]);
    }
}

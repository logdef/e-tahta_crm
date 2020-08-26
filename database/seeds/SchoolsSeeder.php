<?php

use Illuminate\Database\Seeder;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            [
                'schools_name'=>'İlk Öğretim',
                'schools_code'=>'İ',
                'schools_must'=>1

            ],
            ['schools_name'=>'Orta Öğretim',
                'schools_code'=>'O',
                'schools_must'=>2
            ],
            ['schools_name'=>'LGS',
                'schools_code'=>'LGS',
                'schools_must'=>3
            ],
            ['schools_name'=>'Lise',
                'schools_code'=>'L',
                'schools_must'=>4
            ],
            ['schools_name'=>'TYT',
                'schools_code'=>'TYT',
                'schools_must'=>5
            ],
            ['schools_name'=>'AYT',
                'schools_code'=>'AYT',
                'schools_must'=>6
            ],
            ['schools_name'=>'KPSS Ön Lisans',
                'schools_code'=>'KÖ',
                'schools_must'=>7
            ],
            ['schools_name'=>'KPSS Lisans',
                'schools_code'=>'KL',
                'schools_must'=>8
            ],
            ['schools_name'=>'DGS',
                'schools_code'=>'DGS',
                'schools_must'=>9
            ]
        ]);
    }
}

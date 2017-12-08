<?php

use Illuminate\Database\Seeder;
use App\School_information;

class SchoolInformationSeeder extends Seeder
{

    public function run()
    {
        School_information::create([
            'school_name'   => 'Jesus Is Lord Christian School Tanauan City',
            'address'       => 'J.V. Pagaspas St.',
            'city'          => ' Tanauan City',
            'state'         => 'Batangas',
            'zip'           => 4232,
            'phone'         => '043-778-53-74',
            'administrator' => 'Mrs. Julie Asi',
            'website'       => 'www.jilcstanauan.com',
            'short_name'    => 'JILCS',
            'school_number'    => '#12378-123',
            'email'    => 'jilcstanauan@gmail.com',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseAddresses = [
            [
                'street'       => 'Rua Antonio Natal',
                'number'       => '61',
                'neighborhood' => 'Jardim Amélia',
                'city'         => 'Pinhais',
                'state'        => 'Parana',
                'country'      => 'Brasil',
                'zip_code'     => '83330-310'
            ]
        ];

        collect($baseAddresses)
            ->each(fn ($address) => Address::create($address));
        
    }
}

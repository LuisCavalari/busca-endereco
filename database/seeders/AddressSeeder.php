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
                'neighborhood' => 'Jardim Amélia',
                'city'         => 'Pinhais',
                'state'        => 'PR',
                'country'      => 'BR',
                'zip_code'     => '83330310'
            ],
            [
                'street'       => 'Avenida São João',
                'neighborhood' => 'Vila Joana',
                'city'         => 'Jundiaí',
                'state'        => 'SP',
                'country'      => 'BR',
                'zip_code'     => '13216000'
            ],
            [
                'street'       => 'Rua dos Carijós',
                'neighborhood' => 'Centro',
                'city'         => 'Belo Horizonte',
                'state'        => 'MG',
                'country'      => 'BR',
                'zip_code'     => '30120060'
            ],
            [
                'street'       => 'QE 11 Área Especial C',
                'neighborhood' => 'Guará I',
                'city'         => 'Brasília',
                'state'        => 'DF',
                'country'      => 'BR',
                'zip_code'     => '71020631'
            ],
            [
                'street'       => 'Rua Cristiano Olsen',
                'neighborhood' => 'Jardim Sumaré',
                'city'         => 'Araçatuba',
                'state'        => 'SP',
                'country'      => 'BR',
                'zip_code'     => '16015244'
            ],
            [
                'street'       => 'Rodovia Raposo Tavares',
                'neighborhood' => 'Lageadinho',
                'city'         => 'Cotia',
                'state'        => 'SP',
                'country'      => 'BR',
                'zip_code'     => '06709015'
            ],
            [
                'street'       => 'Travessa da CDL',
                'neighborhood' => 'Centro',
                'city'         => 'Ji-Paraná',
                'state'        => 'RO',
                'country'      => 'BR',
                'zip_code'     => '76900032'
            ],
            [
                'street'       => 'Avenida Almirante Maximiano Fonseca',
                'neighborhood' => 'Zona Portuária',
                'city'         => 'Rio Grande',
                'state'        => 'RS',
                'country'      => 'BR',
                'zip_code'     => '96204040'
            ]
        ];

        collect($baseAddresses)
            ->each(fn ($address) => Address::create($address));
        
    }
}

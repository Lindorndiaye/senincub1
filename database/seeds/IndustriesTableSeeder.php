<?php

use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('industries')->delete();
        
        \DB::table('industries')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Hébergement',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Comptabilité',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Auto',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Beauté et cosmétiques',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Charpentier',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Les communications',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Informatique',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Construction',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Consultant',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Éducation',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Électronique',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Divertissement',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Nourriture et boissons',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Services juridiques',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Commercialisation',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Immobilier',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Vente au détail',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Sports',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'technologie',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Tourisme',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'Transport',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Voyage',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Utilitaires',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Services Web',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'Autre',
            ),
        ));
    }
}

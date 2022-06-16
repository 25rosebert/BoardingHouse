<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangays')->insert([
            ['barangay'=>'Alos'],
            ['barangay'=>'Amandiego'],
            ['barangay'=>'Amangbangan'],
            ['barangay'=>'Balangobong'],
            ['barangay'=>'Balayang'],
            ['barangay'=>'Bisocol'],
            ['barangay'=>'Bolaney'],
            ['barangay'=>'Baleyadaan'],
            ['barangay'=>'Bued'],
            ['barangay'=>'Cabatuan'],
            ['barangay'=>'Cayucay'],
            ['barangay'=>'Dulacac'],
            ['barangay'=>'Inerangan'],
            ['barangay'=>'Landoc'],
            ['barangay'=>'Linmansangan'],
            ['barangay'=>'Lucap'],
            ['barangay'=>'Maawi'],
            ['barangay'=>'Macatiw'],
            ['barangay'=>'Magsaysay'],
            ['barangay'=>'Mona'],
            ['barangay'=>'Palamis'],
            ['barangay'=>'Pandan'],
            ['barangay'=>'Pangapisan'],
            ['barangay'=>'Poblacion'],
            ['barangay'=>'Pocal-Pocal'],
            ['barangay'=>'Pogo'],
            ['barangay'=>'Polo'],
            ['barangay'=>'Quibuar'],
            ['barangay'=>'Sabangan'],
            ['barangay'=>'San Antonio'],
            ['barangay'=>'San Jose'],
            ['barangay'=>'San Roque'],
            ['barangay'=>'San Vicente'],
            ['barangay'=>'Santa Maria'],
            ['barangay'=>'Tanaytay'],
            ['barangay'=>'Tancarang'],
            ['barangay'=>'Tawintawin'],
            ['barangay'=>'Telbang'],
            ['barangay'=>'Victoria'],


        ]);
    }
}

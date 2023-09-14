<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Agus', 'gender' => 'L', 'nis' => '55230', 'class_id' => 1],
        //     ['name' => 'Ara', 'gender' => 'P', 'nis' => '55231', 'class_id' => 2],
        //     ['name' => 'Windah', 'gender' => 'L', 'nis' => '55232', 'class_id' => 3],
        // ];

        // foreach ($data as $value){
        //     Student::insert([
        //         'name' => $value['name'],
        //         'gender' => $value['gender'],
        //         'nis' => $value['nis'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        Student::factory()->create();
    }
}

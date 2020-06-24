<?php

use Illuminate\Database\Seeder;

use App\User;

class tablaUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = User::create([
            'identificacion' => '4578522',
            'nombres' => 'admin',
            'email' => 'admin@admin.co',
            'password' => 'admin123'
        ]);

        $admins->assignRole('super-admin');

        $admisiosi = User::create([
            'identificacion' => '4578523',
            'nombres' => 'admisionista',
            'email' => 'admisionista@admin.co',
            'password' => 'admin123'
        ]);

        $admisiosi->assignRole('Admisionista');

        $doctor = User::create([
            'identificacion' => '4578525',
            'nombres' => 'laura',
            'email' => 'laura@admin.co',
            'password' => 'admin123'
        ]);

        $doctor->assignRole('Doctor');

        $doctor = User::create([
            'identificacion' => '4578526',
            'nombres' => 'armando',
            'email' => 'armando@admin.co',
            'password' => 'admin123'
        ]);

        $doctor->assignRole('Doctor');
    }
}

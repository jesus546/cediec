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
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            [
                'name' => 'Super Administrador',
                'code' => '100'
            ],
            [
                'name' => 'Administrador',
                'code' => '99'
            ],
            [
                'name' => 'Cliente',
                'code' => '98'
            ]
        ];

        foreach ($models as $key => $model) {
            $model_obj = Role::create($model);
        }
    }
}

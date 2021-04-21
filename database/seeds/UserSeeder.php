<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
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
                'email' => 'super@admin.com',
                'password' => 'micronics',
                'roles' => 1
            ]
        ];

        foreach ($models as $key => $model) {
            $current_model = $model;
            unset($current_model["roles"]);
            $model_obj = User::create($current_model);
            $model_obj->roles()->sync($model["roles"]);
        }

    }
}

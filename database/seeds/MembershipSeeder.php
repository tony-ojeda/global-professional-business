<?php

use Illuminate\Database\Seeder;
use App\Membership;

class MembershipSeeder extends Seeder
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
                'name' => 'Gratis',
                'price' => 0.00,
                'month_duration' => 1,
                'is_actived' => true
            ],
            [
                'name' => 'Básico',
                'price' => 25,
                'month_duration' => 1,
                'is_actived' => true
            ],
            [
                'name' => 'Premium',
                'price' => 200,
                'month_duration' => 12,
                'is_actived' => true
            ],
        ];

        foreach ($models as $key => $model) {
            $model_obj = Membership::create($model);
        }
    }
}

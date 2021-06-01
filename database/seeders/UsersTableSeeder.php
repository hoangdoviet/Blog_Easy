<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Đỗ Hoàng',
            'email' => 'hoangdv@vietis.com.vn',
            'password' => bcrypt('123'),
            'is_admin' => true,
        ]);
    }
}

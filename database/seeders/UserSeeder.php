<?php
/**
 *  database/seeders/UserSeeder.php
 *
 * Date-Time: 21.04.22
 * Time: 16:21
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'webmaster@gmail.com'
        ],
            [
                'name'  => 'Administrator',
                'username'  => 'webmaster',
                'password'  => Hash::make('webmaster')
            ]);
    }
}

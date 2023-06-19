<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Surat;
use App\Models\Penempatan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => "admin",
            'password' => bcrypt("123"),
            "penempatan_id" => 1,
            "role_id" => 1,
            "is_active" => 1
        ]);

        User::create([
            'username' => "kevinmpandoh",
            'password' => bcrypt("123"),
            "penempatan_id" => 2,
            "role_id" => 2,
            "is_active" => 1
        ]);

        Role::create([
            'keterangan' => "Admin"
        ]);

        Role::create([
            'keterangan' => "Pegawai"
        ]);

        Role::create([
            'keterangan' => "Wakil Dekan 1"
        ]);

        Penempatan::create([
            'keterangan' => "Teknik Informatika"
        ]);

        Penempatan::create([
            'keterangan' => "Arsitektur"
        ]);

        Penempatan::create([
            'keterangan' => "Bahasa Jepang"
        ]);

        Penempatan::create([
            'keterangan' => "Manajemen"
        ]);
    }
}

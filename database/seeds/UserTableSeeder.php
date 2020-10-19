<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    \DB::table('users')->truncate();
    \DB::table('agents')->truncate();
    \DB::table('users')->insert([
      'name_en' => 'Super Administrator',
      'name_kh' => 'ម្ចាស់ក្រុមហ៊ុន',
      'username' => 'superadmin',
      'referal_code' => '9988776655',
      'ref_group' => 'OWNER',
      'ref_level' => 'OWNER',
      'phone' => '092374003',
      'phone1' => '',
      'phone2' => '',
      'email' => 'superadmin@gmail.com',
      'address' => '',
      'province_id' => 1,
      'district_id' =>1,
      'commune_id' => 1,
      'password' =>  Hash::make('Phagna@sa225'),
      'photo' => 'superadmin-1598848862-641974319.png'
    ]);
    \DB::table('users')->insert([
      'name_en' => 'Administrator',
      'name_kh' => 'អ្នកគ្រប់គ្រង',
      'username' => 'admin',
      'referal_code' => '1122334455',
      'ref_group' => 'G1',
      'ref_level' => 'G1-001',
      'phone' => '012321422',
      'phone1' => '',
      'phone2' => '',
      'email' => 'admin@gmail.com',
      'address' => '',
      'province_id' => 1,
      'district_id' =>1,
      'commune_id' => 1,
      'password' =>  Hash::make('Phagna@sa225'),
      'photo' => 'admin-1598849035-1375235290.jpg'    
    ]);
    \DB::table('agents')->insert([
      'user_id'=>2,
      'referal_user_id'=>1,
      'referal_user_code'=>'9988776655',
      'ref_group' => 'G1',
      'ref_level' => 'G1-001',
      'name_en' => 'Administrator',
      'name_kh' => 'អ្នកគ្រប់គ្រង',
      'phone' => '012321422',
      'phone1' => '',
      'phone2' => '',
      'email' => 'admin@gmail.com',
      'address' => '',
      'job_title' => 'Administrator',
      'description' =>'Administrator',
      'photo' => 'admin-1598849035-1375235290.jpg'
    ]);    
  }
}

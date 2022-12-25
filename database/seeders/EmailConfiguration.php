<?php

namespace Database\Seeders;

use App\Models\Emailconfiguration as ModelsEmailconfiguration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmailConfiguration extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsEmailconfiguration::create([
            'email_from'=>"humera0333@gmail.com",
            'email_name'=>'humera fatima',
            'smtp_host'=>'smtp-relay.sendinblue.com',
            'smtp_port'=>'587',
            'smtp_encryption'=>"tls",
            'username'=>"humera0333@gmail.com",
            'password'=>'1MUSRAOVr4Z2PzBg'
        ]);
    }
}

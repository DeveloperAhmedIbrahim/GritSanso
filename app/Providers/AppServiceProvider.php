<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Emailconfiguration;
use DB;
use Config;
use Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
      
      try {
        DB::table('payouts')->whereDate('clearance', '<', now())->update(['status' => 'approved']);

        
            $mailsetting = Emailconfiguration::first();
            if ($mailsetting) {
                $data = [
                    'driver'            => 'smtp',
                    'host'              => $mailsetting->smtp_host,
                    'port'              => $mailsetting->smtp_port,
                    'encryption'        => $mailsetting->smtp_encryption,
                    'username'          => $mailsetting->username,
                    'password'          => $mailsetting->password,
                    'from'              => [
                        'address' => $mailsetting->email_from,
                        'name'   => 'azsolution'
                    ]
                ];
                Config::set('mail', $data);
            }
        } catch (Exception $ex) {
        }
    }
}

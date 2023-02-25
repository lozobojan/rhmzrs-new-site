<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('obfuscate', function ($email) {
            $alwaysEncode = array('.', ':', '@');

            $result = '';

            // Encode string using oct and hex character codes
            for ($i = 0; $i < strlen($email); $i++) {
                // Encode 25% of characters including several that always should be encoded
                if (in_array($email[$i], $alwaysEncode) || mt_rand(1, 100) < 25) {
                    if (mt_rand(0, 1)) {
                        $result .= '&#' . ord($email[$i]) . ';';
                    } else {
                        $result .= '&#x' . dechex(ord($email[$i])) . ';';
                    }
                } else {
                    $result .= $email[$i];
                }
            }
            return $result;
        });
    }

}

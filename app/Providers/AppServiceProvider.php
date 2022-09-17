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
        Blade::directive('recursiveNav', function ($links) {
            return $this->recursiveNav($links);
        });
    }

    private function recursiveNav($links): string
    {
        $result = "";
        foreach ($links as $link) {
            $result .= "<li class=\"nav-item dropdown\">";
            $result .= "    <a class=\"nav-link dropdown-toggle\" href=\"#\" data-bs-toggle=\"dropdown\">{$link->title}</a>";
            $result .= "</li>";
        }

        return '
                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Deeper level</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a class="dropdown-item" href="./services.html">Services I</a></li>
                                                        <li class="nav-item"><a class="dropdown-item" href="./services2.html">Services II</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item"><a class="dropdown-item" href="./services2.html">Services II</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a class="dropdown-item" href="./services.html">Services I</a></li>
                                                <li class="nav-item"><a class="dropdown-item" href="./services2.html">Services II</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item"><a class="dropdown-item" href="./pricing.html">Pricing</a></li>
                                    </ul>
                                </li>
            ';
    }
}

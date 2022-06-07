<?php

namespace Tests;

use Database\Seeders\SkillSeeder;
use Database\Seeders\TypeWorkSeeder;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        app(SkillSeeder::class)->run();
        app(TypeWorkSeeder::class)->run();

        return $app;
    }
}

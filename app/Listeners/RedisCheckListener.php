<?php

namespace App\Listeners;

use Exception;
use Illuminate\Container\Attributes\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\DiagnosingHealth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Redis;

class RedisCheckListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DiagnosingHealth $event): void
    {
        try {
            DB::connection()->getPdo();
            FacadesLog::info("Mysql Database Is Up");
        }catch (Exception $e) {
            FacadesLog::info("Mysql Database Is Down");
            throw new $e("MySQL Database Is Down");
        }
    }
}

<?php

namespace App\Listeners;

use Exception;
use Illuminate\Container\Attributes\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;

class MysqlCheckListener
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
    public function handle(object $event): void
    {
        //
        try {
            DB::connection()->getPdo();
            FacadesLog::info("Mysql Is Up");
        }catch (Exception $e) {
            FacadesLog::info("Mysql Is Down");
            throw new Exception("Mysql Is Down");
        } 
    }
}

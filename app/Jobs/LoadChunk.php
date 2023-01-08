<?php

namespace App\Jobs;

use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class LoadChunk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    private string $table;
    private array $chunk;
    private ?array $keys;

    /**
     * @param string $table
     * @param $chunk
     */
    public function __construct(string $table, array $chunk, array $keys = null)
    {
        $this->table = $table;
        $this->chunk = $chunk;
        $this->keys = $keys;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table($this->table)->insertOrIgnore($this->chunk);
    }
}

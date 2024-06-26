<?php

namespace App\Jobs;

use App\Models\Export;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreExportDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Authenticatable $user,
        protected String $filename
        )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->exports()->create([
            "file_name" => $this->filename
        ]);
        // Export::create([
        //     'file_name' => $this->filename,
        //     'user_id' => Auth::user()->id
        // ]);
    }
}

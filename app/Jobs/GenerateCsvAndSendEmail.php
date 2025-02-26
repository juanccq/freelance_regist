<?php

namespace App\Jobs;

use App\Mail\CsvReportMail;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use Illuminate\Support\Facades\Mail;

class GenerateCsvAndSendEmail implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $email;
    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $data)
    {
        $this->email = $email;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $directory = storage_path('app/reports');
        // if (!file_exists($directory)) {
        //     mkdir($directory, 0755, true);
        // }

        $filename = 'reports/report_' . now()->timestamp . '.csv';
        // Storage::disk('local')->makeDirectory('reports');
        $csvPath = storage_path("app/$filename");

        $csv = Writer::createFromPath($csvPath, 'w+');
        $csv->insertOne(array_keys($this->data[0]));
        $csv->insertAll($this->data);

        Mail::to($this->email)->send(new CsvReportMail($filename));
    }
}

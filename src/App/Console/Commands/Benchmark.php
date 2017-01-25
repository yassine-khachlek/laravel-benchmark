<?php

namespace Yk\LaravelBenchmark\App\Console\Commands;

use Illuminate\Console\Command;

use Artisan;

class Benchmark extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'benchmark {artisan_command}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public $report = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$command = $this->argument('artisan_command');

        $this->report['COMMAND_NAME'] = $command;
        $this->report['PHP_VERSION'] = phpversion();
        $this->report['PLATFORM']   = php_uname('s').' '.php_uname('m').' '.php_uname('r');

        $this->report['START'] = microtime(true);
        
        $memory_get_usage = memory_get_usage();

        $exitCode = Artisan::call($command, [
            
        ]);

        $this->report['END'] = microtime(true);

        $this->report['TIME'] = ceil(($this->report['END'] - $this->report['START']) * pow(10, 2)) / pow(10, 2)." Seconds";

        $this->report['MEMORY_PEAK_USAGE'] = round((memory_get_peak_usage() - $memory_get_usage)/pow(10, 6), 2, PHP_ROUND_HALF_UP).' Megabytes';

        $this->report['START']  = date('Y-m-d H:i:s', $this->report['START']);
        $this->report['END'] = date('Y-m-d H:i:s', $this->report['END']);
        $this->report['OUTPUT_LENGTH'] = strlen(Artisan::output());

        foreach (array_keys($this->report) as $key) {
            $title = $key;
            while (strlen($title)<20) {
                $title .= " ";
            }
            $this->info($title.': '.$this->report[$key]);
        }
    }
}

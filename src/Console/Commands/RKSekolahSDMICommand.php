<?php namespace Bantenprov\RKSekolahSDMI\Console\Commands;

use Illuminate\Console\Command;

/**
 * The RKSekolahSDMICommand class.
 *
 * @package Bantenprov\RKSekolahSDMI
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RKSekolahSDMICommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:rk-sekolah-sd-mi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\RKSekolahSDMI package';

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
        $this->info('Welcome to command for Bantenprov\RKSekolahSDMI package');
    }
}

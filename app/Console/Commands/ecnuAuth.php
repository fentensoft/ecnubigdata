<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ecnuAuth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ecnuAuth:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $client = new Client();
        $request = new \GuzzleHttp\Psr7\Request('POST', "http://10.9.27.18/include/auth_action.php", [], "action=login&username=10133700336&password={B}dG9ueTk4OUBwcGxl&ajax=1&ac_id=4");
        $ret = $client->send($request)->getBody();
        print $ret;
    }
}

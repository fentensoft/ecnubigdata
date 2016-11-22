<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class cleanup_jupyter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup_jupyter:docleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup idle jupyter notebook services.';

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
        $request = new \GuzzleHttp\Psr7\Request('GET', config('app.jupyterhub_host') . "/hub/api/proxy", ['Authorization' => 'token ' . config('app.jupyterhub_token')]);
        $ret = json_decode($client->send($request)->getBody(), true);
        foreach ($ret as $nodename => $node) {
            if (isset($node['user']))
                if (ceil((time() - strtotime($node['last_activity'])) / 60) > 60) {
                    echo "Killing server: " . $node['user'];
                    $request = new \GuzzleHttp\Psr7\Request('DELETE', config('app.jupyterhub_host') . "/hub/api/users/" . $node['user'] . '/server', ['Authorization' => 'token ' . config('app.jupyterhub_token')]);
                    echo "..." . ($client->send($request)->getStatusCode() == 204 ? 'Success' : 'Failed') . "\n";
                }
        }
    }
}

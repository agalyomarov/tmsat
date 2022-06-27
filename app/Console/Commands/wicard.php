<?php

namespace App\Console\Commands;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class wicard extends Command
{
    protected $signature = 'wicard';
    protected $description = 'wicard Command';
    public function handle()
    {
        try {
            $wicard = Storage::disk('wicard');
            foreach ($wicard->files() as $file) {
                $wicard->delete($file);
            }
            $servers = Client::all(['server'])->groupBy('server')->toArray();
            foreach ($servers as $index => $server) {
                $clients = Client::where('server', $index)->where('end_date', '>', Carbon::now()->subDays(1))->select(['login', 'parol'])->get();
                if (count($clients) > 0) {
                    Storage::disk('wicard')->put('wicard' . $index . '.user', '');
                    foreach ($clients as $client) {
                        $content = "[account]
login = $client->login
password = $client->parol
filter = ac,vipall
rule = next
debug = 0
";
                        Storage::disk('wicard')->append('wicard' . $index . '.user', $content);
                    }
                }
            }
        } catch (\Exception $e) {
            echo  "Error: " . $e->getMessage;
        }
    }
}

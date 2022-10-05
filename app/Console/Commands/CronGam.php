<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Models\Report;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class CronGam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getPost:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get post do gam';

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
     * @return int
     */
    public function handle()
    {
        $URL =  env('END_POINT_GAM');
        $client = new Client();
        $response = $client->get($URL);
        $array = json_decode($response->getBody(),true);
        $today = date('Y-m-d');
        foreach($array as $report){
            $domain_gam = $report['DOMAIN'];

            $domains = Domain::where('url',$domain_gam)->get();

            if($domains->count()>0){
                $domain = $domains->first();
               $reporte = Report::where('criteria_name', $report['CUSTOM_CRITERIA_NAME'])
                ->where('criteria_value',$report['CUSTOM_CRITERIA_VALUE'])
                ->where('date',$today)->first();

                if($reporte){

                    Report::find($reporte->id)->update([
                        'impressions'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_IMPRESSIONS'],
                        'clicks'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_CLICKS'],
                        'ctr'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_CTR'],
                        'revenue'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_REVENUE'],
                        'cpm'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_AVERAGE_ECPM'],
                        'date'=>$report['DATE']
                    ]);

                }
                else{
                    $data = [
                        'user_id'=>$domain->user_id,
                        'domain_id'=>$domain->id,
                        'impressions'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_IMPRESSIONS'],
                        'clicks'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_CLICKS'],
                        'ctr'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_CTR'],
                        'revenue'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_REVENUE'],
                        'cpm'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_AVERAGE_ECPM'],
                        'date'=>$report['DATE'],
                        "criteria_name"=>$report['CUSTOM_CRITERIA_NAME'],
                        "criteria_value"=>$report['CUSTOM_CRITERIA_VALUE']
                    ];
                    Report::create($data);

                }
            }
        }
    }
}

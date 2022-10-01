<?php

namespace App\Http\Controllers\Cron;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Report;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function getReports(){

        $URL = env('END_POINT_GAM');
        $client = new Client();
        $response = $client->get($URL);
        $array = json_decode($response->getBody(),true);

        foreach($array as $report){
            $domain_gam = $report['DOMAIN'];
            $domains = Domain::where(['url','like','%'.$domain_gam.'%']);
            if($domains->count()>0){
                $domain = $domains->first();
                $data = [
                    'user_id'=>$domain->user_id,
                    'domain_id'=>$domain->id,
                    'impressions'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_IMPRESSIONS'],
                    'clicks'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_CLICKS'],
                    'ctr'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_CTR'],
                    'revenue'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_REVENUE'],
                    'cpm'=>$report['AD_EXCHANGE_LINE_ITEM_LEVEL_AVERAGE_ECPM'],
                    'date'=>$report['DATE'],
                ];
                Report::create($data);
            }
        }

    }
}

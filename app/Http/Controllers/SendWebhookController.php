<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendWebhookController extends Controller
{
    public function send(Request $request)
    {
        //var_dump(openssl_get_cert_locations());

            $response = Http::post('https://webhook.site/47577e76-0aaf-4833-8fe4-57e623deda24', [
                'name' => 'Steve',
                'role' => 'Network Administrator',
            ]);


        // $url = 'https://webhook.site/47577e76-0aaf-4833-8fe4-57e623deda24';
        // $data = [
        //     'status_code' => 200,
        //     'status' => 'success',
        //     'message' => 'webhook send successfully',
        //     'extra_data' => [
        //         'first_name' => 'Anthony',
        //         'last_name' => 'Bird',
        //     ],
        // ];
    	// $json_array = json_encode($data);
        // $curl = curl_init();
        // $headers = ['Content-Type: application/json'];

        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_POST, 1);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $json_array);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl, CURLOPT_HEADER, 1);
        // curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        // $response = curl_exec($curl);
        // $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // curl_close($curl);


        // if ($http_code >= 200 && $http_code < 300) {
        // } else {

        //     echo "webhook failed.";
        // }
    }
}

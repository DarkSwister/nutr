<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Invertor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Inverters overview
     *
     * @OA\Post(
     **     path="/api/inverters/overview",
     *      operationId="invertersOverview",
     *      tags={"Inverters"},
     *      security={{"sanctum":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                           "message": "Success",
     *                           "statusCode": 200,
     *                           "data": {
     *                           "total_count": 30,
     *                           "not_working": 17,
     *                           "average_performance": 88.23,
     *                           "manufacturers": {
     *                               {
     *                               "manufacturer": "SMA",
     *                               "count": 21
     *                               },
     *                               {
     *                               "manufacturer": "Growatt",
     *                               "count": 9
     *                               },
     *                           }
     *                       }}
     *                 )
     *             )
     *         }
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function invertersOverview()
    {
        $inverters = Invertor::all();
        $total_count = $inverters->count();

        $not_working_count = 0;
        foreach ($inverters as $inverter) {
            if ($inverter->status != 200) {
                $not_working_count++;
            }
        }

        $manufacturers = Invertor::query()->select('manufacturer', DB::raw('COUNT(1) as count'))->groupBy('manufacturer')->orderByDesc('count')->get();

        $average_performance = round(History::whereDate('created_at', Carbon::today())->avg('performance') * 100, 2);

        $data = [
            "total_count" => $total_count,
            "not_working" => $not_working_count,
            "average_performance" => $average_performance,
            "manufacturers" => $manufacturers,
        ];

        return response()->json(['message' => "Success", "statusCode" => 200, 'data' => $data]);
    }


    /**
     * Inverter data
     *
     * @OA\POST(
     **     path="/api/inverter",
     *      operationId="inverterData",
     *      tags={"Inverters"},
     *      security={{"sanctum":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass inverter id",
     *          @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"id"},
     *                 @OA\Property(property="id", type="string", format="text"),
     *             ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                          "message": "Success",
    *                           "statusCode": 200,
    *                           "data": {
    *                               "id": 1,
     *                              "address": "65447 Cleora Overpass",
    *                               "location": "56.207969,24.253694",
     *                              "manufacturer": "Huawei",
    *                               "max_capacity": 30000,
    *                               "max_battery_capacity": 40000,
    *                               "status": 500,
    *                               "error": "This is an error message",
    *                               "has_battery": true,
    *                               "has_limits": false
    *                           }
     *                     }
     *                 )
     *             )
     *         }
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function inverterInfo(Request $request)
    {
        if(!$invertor = Invertor::where('id',$request->id)->first()){
            return response()->json(["message"=>"Invertor does not exist", "statusCode"=>400]);
        };

        $data = [
            'address'=>$invertor->address,
            'location'=>$invertor->location,
            'manufacturer'=>$invertor->manufacturer,
            "max_capacity"=> $invertor->max_capacity,
            "max_battery_capacity"=> $invertor->max_battery_capacity,
            "status"=> $invertor->status,
            "error"=>$invertor->error,
            "has_battery"=>$invertor->has_baterry,
            "has_limits"=>$invertor->has_limits,
        ];

        return response()->json(["message"=>"Success", "statusCode"=>200, "data"=>$data]);
    }
}

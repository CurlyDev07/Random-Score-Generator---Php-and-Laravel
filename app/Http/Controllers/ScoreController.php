<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function get_score(Request $request){
        if ($request->view == 'TIME') {
            $get_score = Score::orderBy('id', 'ASC')->get(['score', 'created_at']);
        }

        if ($request->view == 'DAY') {
           $get_score = DB::table('scores')->select('score', 
                DB::raw('COUNT(score) as count' ),
                DB::raw('DAY(created_at) as day'),
                DB::raw('MONTH(created_at) as month')
            )
            ->groupBy(['score', 'day', 'month'])
            ->orderByRaw("day ASC, score ASC")
            ->get();
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Get scores successfully',
            'data' => $get_score
        ]);
    }
    
    public function generate_score(){
        $score = rand(1,10);
        $insert_get_date = Score::create(['score' => $score]);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'New score successfully generated',
            'data' => [
                'score' => $score,
                'created_at' => $insert_get_date->created_at
            ]
        ]);
    }
}

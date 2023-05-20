<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class SurveyController extends Controller
{
    /**
     * Get all survey.
     */
    public function getSurveys()
    {
        try {
            $surveys = Cache::remember('survey', Config::get('cache.ttl'), function () {
                return  Survey::orderBy('id')->get();
            });
            if ($surveys) {
                return response()->json([
                    "success" => true,
                    "message" => "Surveys retrieved.",
                    "data" => $surveys
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to retrieve surveys.",
            ], 500);
        }
    }

    // public function getSurvey($id)
    // {
    //     $survey = Survey::find($id);
    //     if ($survey) {
    //         return response()->json([
    //             "success" => true,
    //             "message" => "Survey retrieved.",
    //             "data" => $survey
    //         ]);
    //     }
    //     return response()->json([
    //         "success" => false,
    //         "message" => "Survey not found.",
    //     ], 404);
    // }
}

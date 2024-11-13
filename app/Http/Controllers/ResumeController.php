<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class ResumeController extends Controller
{

    public function generateResume(Request $request)
    {

        $validated = $request->validate([
            'code' => 'required',
        ]);


        $resumeDetails = $this->getResumeDetails($validated['code']);
        Log::info('Validated data: ', $validated);

        $data = $resumeDetails->getData()->data->fields;

        $experienceArray = $data->History ? explode('!@#', urldecode($data->History)) : "N/A";
        $educationArray = $data->EducationFormated ? explode('!@#', urldecode($data->EducationFormated)) : "N/A";
        $skillsArray = $data->SkillsF ? explode('!@#', urldecode($data->SkillsF)) : "N/A";
        $competenciesArray = $data->Compentencies ? explode('!@#', urldecode($data->Compentencies)) : "N/A";
        $languagesArray = $data->LanguagesDetailed ? explode('!@#', urldecode($data->LanguagesDetailed)) : "N/A";

        $phone = $data->PhoneNumber[0] ?? "N/A";
        $email = $data->Email[0] ?? "N/A";
        $name = $data->NeuronyName ?? "N/A";
        $firstName = $data->FirstName ?? "N/A";
        $lastName = $data->LastName ?? "N/A";
        $showFullName = $data->Show_full_Name;

        // dd($data);
        $mappedExperience = array_map(function($item) {
            return explode('@#', $item);
        }, $experienceArray);
        $mappedExperience = array_filter($mappedExperience, function($item) {
            return !empty($item[0]);
        });

        $mappedEducation =  array_map(function($item) {
            return explode('@#', $item);
        }, $educationArray);

        $mappedEducation = array_filter($mappedEducation, function($item) {
            return !empty($item[0]);
        });

        $skillsArray =  array_filter($skillsArray, function($item) {
            return !empty($item[0]);
        });


        // dd($languagesArray);
        return SnappyPdf::loadView('resume', [
            'position' => $data->Position ?? 'N/A',
            'code' => $data->recordId,
            'name' => $name,
            'showFullName' => $showFullName,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'experience' => $mappedExperience,
            'skills' => $skillsArray,
            'education' => $mappedEducation,
            'competencies' => $competenciesArray,
            'description' => $data->description ?? "N/A",
            'languages' => $languagesArray,
        ])
        ->setOption('header-html', view('header', [
            'phone' => $phone,
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'position' => $data->Position ?? "N/A",
            'code' => $data->recordId,
            'showFullName' => $showFullName,
        ])->render())
        ->setOption('footer-html', view('footer')->render())
        ->setOption('margin-top', 76)
        ->setOption('margin-bottom', 30)
        ->setOption('page-size', 'A4')
        ->setOption('margin-left', 0)
        ->setOption('enable-local-file-access', true)
        ->inline('resume.pdf');  // Stream the generated PDF

    }


    public function getResumeDetails($record)
    {
        $baseId ="appSjzWwnAroSb2ct";  // Replace with actual data or validate as necessary
        $tableIdOrName = "tblIJ8s3fzfzWzDgB";  // Replace with actual data or validate as necessary
        $recordId = $record;  // Replace with actual data or validate as necessary
        $apiToken = config('airtable.outsourcing');  // Replace with your Airtable API token

        $url = "https://api.airtable.com/v0/{$baseId}/{$tableIdOrName}/{$recordId}";

        $client = new Client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiToken,
                    'Accept' => 'application/json',
                ]
            ]);

            $apiResponse = json_decode($response->getBody()->getContents(), true);

            Log::info('Airtable API Response:', $apiResponse);

            return response()->json([
                'message' => 'API call successful.',
                'data' => $apiResponse
            ]);
        } catch (\Exception $e) {
            Log::error('Error making Airtable API call: ' . $e->getMessage());

            return response()->json([
                'error' => 'Unable to make API call.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

}

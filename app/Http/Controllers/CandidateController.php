<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants;
use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();

        try {
            return response()->json([
                'status' => Constants::HTTP_RESPONSE_SUCCESSFULLY,
                'candidates' => $candidates
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => $e->getStatusCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidateRequest $request)
    {
        try {
            $input = $request->all();

            $candidate = Candidate::create($input);

            return response()->json([
                'status' => Constants::HTTP_RESPONSE_SUCCESSFULLY,
                'message' => 'Create candidate successfully!',
                'candidateId' => $candidate->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => $e->getStatusCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return response()->json([
            'status' => Constants::HTTP_RESPONSE_SUCCESSFULLY,
            'candidate' => $candidate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCandidateRequest $request, Candidate $candidate)
    {
        try {
            $input = $request->all();
            $candidate->update($input);

            return response()->json([
                'status' => Constants::HTTP_RESPONSE_SUCCESSFULLY,
                'message' => 'Update candidate successfully!',
                'candidateId' => $candidate->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => $e->getStatusCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        try {
            $candidate->delete();

            return response()->json([
                'status' => Constants::HTTP_RESPONSE_SUCCESSFULLY,
                'message' => 'Delete candidate successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => $e->getStatusCode(),
                'message' => $e->getMessage()
            ]);
        }
    }
}

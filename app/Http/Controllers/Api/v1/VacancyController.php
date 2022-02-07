<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\Vacancy as VacancyRequest;
use App\Http\Resources\v1\VacancyCollection;
use App\Http\Resources\v1\VacancyResource;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new VacancyCollection(Vacancy::with("company")->get());

        // return response()->json([
        //     '

        // ]);
    }

    public function indexFindOne(Vacancy $id)
    {
        return new VacancyResource($id);
        // return Vacancy::find($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyRequest $request)
    {
        // $dataVancancy = request()->except('_token');
        // Vacancy::create($dataVancancy);
        $dataVacancies = Vacancy::create($request->all());
        return response()->json($dataVacancies, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(vacancy $vacancy)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());
        return response()->json($vacancy);
    }

    public function patch(Request $request, Vacancy $vacancy, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());
        return response()->json($vacancy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vacancy::destroy($id);
        return response()->json([
            'message' => 'Success'
        ],);
    }

    public function patchActive(Request $request)
    {
        $vacancy_id = $request->id;
        $vacancy = Vacancy::find($vacancy_id);
        $vacancy->status = true;
        $vacancy->save();

        return response()->json($vacancy);
    }

    public function vacanciesActives()
    {
        return new VacancyCollection(Vacancy::where('status', 1)->OrderBy('updated_at', 'desc')->get());
    }
    public function vacanciesInactives()
    {
        return new VacancyCollection(Vacancy::where('status', 0)->OrderBy('updated_at', 'desc')->get());
    }
}

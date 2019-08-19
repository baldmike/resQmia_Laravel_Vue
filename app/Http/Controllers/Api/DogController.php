<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use App\Http\Resources\DogResource;
use App\Http\Requests\DogRequest;

use Illuminate\Support\Facades\Log;
use App\Models\Dog;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DogResource::collection(Dog::orderBy('created_at', 'asc')->get());
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
    public function store(Request $request)
    {
        // $validated = $request->validated();
        // if($validated)
        // {
            $dog = new Dog();

            $dog->name = request('name');
            $dog->species = request('species');
            $dog->status = request('status');
            $dog->date_of_birth = request('date_of_birth');
            $dog->weight = request('weight');
            $dog->exam = request('exam');
            $dog->deworming_1 = request('deworming_1');
            $dog->deworming_2 = request('deworming_2');
            $dog->fecal_test = request('fecal_test');
            $dog->heartworm_test = request('heartworm_test');
            $dog->heartworm_result = request('heartworm_result');
            $dog->spay_neuter = request('spay_neuter');
            $dog->distemper_1 = request('distemper_1');
            $dog->distemper_2 = request('distemper_2');
            $dog->distemper_3 = request('distemper_3');
            $dog->lepto_1 = request('lepto_1');
            $dog->lepto_2 = request('lepto_2');
            $dog->bord = request('bord');
            $dog->civ = request('civ');
            $dog->civ_booster = request('civ_booster');
            $dog->rabies = request('rabies');
            $dog->rabies_number = request('rabies_number');
            $dog->vet = request('vet');
            $dog->microchip = request('microchip');
            $dog->heartworm = request('heartworm');
            $dog->flea_tick = request('flea_tick');

            Log::debug('INSIDE DOGCONTROLLER');
            
            // if($request->hasFile('image'))
            // {
            //     $path = Storage::putFile('public/images', $request->file('image'), 'public');

            //     // $path includes 'public/', and we don't want that in our URL, so we chop it off:
            //     $path = substr($path, 6);

            //     $dog->image = $path;
            // }

        // }

        if ($dog->save()) {
            return response()->json(null, Response::HTTP_CREATED);
        };

        return response()->json(null, Response::HTTP_NOT_FOUND);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
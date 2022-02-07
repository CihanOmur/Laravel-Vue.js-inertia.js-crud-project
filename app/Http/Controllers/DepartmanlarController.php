<?php

namespace App\Http\Controllers;

use App\Models\Departmanlar;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmanlarRequest;
use Inertia\Inertia;

class DepartmanlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Departmanlar::paginate(10);
        return Inertia::render('Departments/Index', [
            'departments' => $departments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Departments/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmanlarRequest $request)
    {
        Departmanlar::create(
            $request->all()
        );
        return redirect()->route('departmanlar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departmanlar  $departmanlar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departmanlar  $departmanlar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Departmanlar::findOrFail($id);
        return Inertia::render('Departments/Edit',[
            'department' =>[
                'id' => $departments->id,
                'name' => $departments->name,
                'email' => $departments->email,
                'phone' => $departments->phone,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departmanlar  $departmanlar
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmanlarRequest $request, $id)
    {
        $dep = Departmanlar::findOrFail($id);
        $dep->name = $request->name;
        $dep->email = $request->email;
        $dep->phone = $request->phone;
        $dep->save();

        return redirect()->route('departmanlar.edit',[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departmanlar  $departmanlar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departmanlar::destroy($id);
        return redirect()->route('departmanlar.index');;
    }
}

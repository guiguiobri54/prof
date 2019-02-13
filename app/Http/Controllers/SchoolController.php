<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolCreateRequest;

use App\Http\Requests\SchoolUpdateRequest;

use App\Repositories\SchoolRepository;

use Illuminate\Http\Request;


class SchoolController extends Controller
{


    protected $schoolRepository;


    protected $nbrPerPage = 4;


    public function __construct(SchoolRepository $schoolRepository)

    {

        $this->schoolRepository = $schoolRepository;

    }


    public function index()

    {

        $schools = $this->schoolRepository->getPaginate($this->nbrPerPage);

        $links = $schools->render();


        return view('SchoolIndex', compact('schools', 'links'));

    }


    public function create()

    {

        return view('create');

    }


    public function store(SchoolCreateRequest $request)

    {

        $school = $this->schoolRepository->store($request->all());


        return redirect('school')->withOk("L'établissement scolaire " . $school->name . " a été créé.");

    }


    public function show($id)

    {

        $school = $this->schoolRepository->getById($id);


        return view('show',  compact('school'));

    }


    public function edit($id)

    {

        $school = $this->schoolRepository->getById($id);


        return view('edit',  compact('school'));

    }


    public function update(SchoolUpdateRequest $request, $id)

    {

        $this->schoolRepository->update($id, $request->all());



        return redirect('school')->withOk("L'établissement scolaire " . $request->input('name') . " a été modifié.");

    }


    public function destroy($id)

    {

        $this->schoolRepository->destroy($id);


        return back();

    }


}
<?php


namespace App\Repositories;


use App\School;


class SchoolRepository

{


    protected $School;


    public function __construct(School $school)

    {

        $this->school = $school;

    }


    private function save(School $school, Array $inputs)

    {
        $school->country = $inputs['country'];

        $school->grade = $inputs['grade'];

        $school->name = $inputs['name'];

        $school->department = $inputs['department'];

        $school->town = $inputs['town'];


        $school->save();

    }


    public function getPaginate($n)

    {

        return $this->school->paginate($n);

    }


    public function store(Array $inputs)

    {

        $school = new $this->school;


        $this->save($school, $inputs);


        return $school;

    }


    public function getById($id)

    {

        return $this->school->findOrFail($id);

    }


    public function update($id, Array $inputs)

    {

        $this->save($this->getById($id), $inputs);

    }


    public function destroy($id)

    {

        $this->getById($id)->delete();

    }


}
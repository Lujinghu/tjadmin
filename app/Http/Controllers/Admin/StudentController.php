<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    protected $fields = [
        'name' => '',
        'gender' => '',
        'school' => '',
        'grade' => '',
        'telephone' => '',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index')->withStudents($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreateRequest $request)
    {
        $student = new Student();
        foreach (array_keys($this->fields) as $field) {
            $student->$field = $request->get($field);
        }
        $student->save();

        return redirect('/admin/student')
                    ->withSuccess("学生'$student->name'保存成功");
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
        $student = Student::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $student->$field);
        }
        return view('admin.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        foreach (array_keys(array_except($this->fields, ['name'])) as $field) {
            $student->$field = $request->get($field);
        }
        $student->save();

        return redirect("/admin/student/$id/edit")
                        ->withSuccess("更改已保存");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect("/admin/student")
                        ->withSuccess("学生'$student->name'已被删除");
    }
}

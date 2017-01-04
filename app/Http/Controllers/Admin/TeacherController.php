<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherCreateRequest;
use App\Http\Requests\TeacherUpdateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * @var array
     * 用来提示教师model所包含的字段
     */
    protected $fields = [
        'name' => '',
        'gender' => '',
        'telephone' => '',
        'full_time' => ''
    ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teacher.index')->withTeachers($teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];//用于获取旧的表单数据
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.teacher.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherCreateRequest $request)
    {
        $teacher = new Teacher();
        foreach (array_keys($this->fields) as $field) {
            $teacher->$field = $request->get($field);
        }

        $teacher->save();

        return redirect('/admin/teacher')
                        ->withSuccess("教师'$teacher->name'保存成功");
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
        $data = ['id' => $id];
        $teacher = Teacher::findOrFail($id);
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $teacher->$field);
        }

        return view('admin.teacher.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdateRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        foreach (array_keys(array_except($this->fields, ['name'])) as $field) {
            $teacher->$field = $request->get($field);
        }
        $teacher->save();

        return redirect("/admin/teacher/$id/edit")//记住，要用双引号啊，单引号所见即所得
                        ->withSuccess("更改已经保存");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect('admin/teacher')
                        ->withSuccess("教师'$teacher->name'已被删除");
    }
}

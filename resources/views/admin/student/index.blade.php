@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>学生 <small>» Listing</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/student/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新增学生
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th class="hidden-md">学校</th>
                        <th class="hidden-md">年级</th>
                        <th class="hidden-md">手机号码</th>
                        <th class="hidden-md">编辑</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->gender }}</td>
                            <td class="hidden-md">{{ $student->school }}</td>
                            <td class="hidden-md">{{ $student->grade }}</td>
                            <td class="hidden-md">{{ $student->telephone }}</td>
                            <td>
                                <a href="/admin/student/{{ $student->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#tags-table").DataTable({
            });
        });
    </script>
@stop
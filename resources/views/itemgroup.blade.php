@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-4">
                    <form action="{{route('save')}}" method="post">
                        @csrf
                        <label for="itemgroupsname" class="p-2">ادخل اسم المجموعه</label>
                        <input type="text" id="itemgroupsname" class="form-control form-control-sm" name="itemgroupsname">
                        <div class="text-center">
                        <button class="btn btn-primary mt-2" type="submit">حفظ</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>رقم المجموعه</th>
                        <th>اسم المجموعه</th>
                        <th colspan="2">أجراء</tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->itemgroupsname}}</td>
                        <td><a href="{{ route('del',['x'=>$row->id])}}"><i class="bi bi-trash text-danger"></i></a> </td>
                        <td><a href="{{route('edit',['x'=>$row->id])}}"><i class="bi bi-pencil-square text-success"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
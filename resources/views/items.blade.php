@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-4">
                    <form action="{{route('saveitems')}}" method="post">
                        @csrf
                        <label for="itemname" class="p-2">ادخل اسم العنصر</label>
                        <input type="text" id="itemname" class="form-control form-control-sm" name="itemname">

                        <label for="price" class="p-2">ادخل سعر العنصر</label>
                        <input type="text" id="price" class="form-control form-control-sm" name="price">

                        <label for="qty" class="p-2">ادخل كميه العنصر</label>
                        <input type="text" id="qty" class="form-control form-control-sm" name="qty">
    
                        <label for="color" class="p-2">ادخل لون العنصر</label>
                        <input type="text" id="color" class="form-control form-control-sm" name="color"
                        >
                        <label for="itemgroupno" class="p-2">ادخل رقم العنصر</label>
                        <input type="text" id="itemgroupno" class="form-control form-control-sm" name="itemgroupno">

                        <label for="image" class="p-2">الصوره</label>
                        <input type="text" id="image" class="form-control form-control-sm" name="image">
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
                        <th>رقم العنصر</th>
                        <th>اسم العنصر</th>
                        <th>سعر العنصر</th>
                        <th>كميه العنصر</th>
                        <th>لون العنصر</th>
                        <th>رقم العنصر</th>
                        <th colspan="2">أجراء</tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->itemname}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->qty}}</td>
                        <td>{{$row->color}}</td>
                        <td>{{$row->itemgroupno}}</td>
                        <td><a href="{{ route('del2',['x'=>$row->id])}}"><i class="bi bi-trash text-danger"></i></a> </td>
                        <td><a href="{{route('edit2',['x'=>$row->id])}}"><i class="bi bi-pencil-square text-success"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row d-flex justify-content-center">
        <h1 class="alert alert-success">تعديل بيانات مجموعات الأصناف</h1>
        <div class="col">
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                    <form action="{{route('update2')}}" method="post">
                        @csrf
                        <div class="text-center">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <label for="x1" class="mt-2">اسم العنصر</label>
                        <input type="text"  name="name" id="x1" value="{{$item->itemname}}"><br>
                        <label for="x2" class="mt-2">سعر العنصر</label>
                        <input type="text" name="price" id="x2" value="{{$item->price}}"><br>
                        <label for="x3" class="mt-2">كميه العنصر</label>
                        <input type="text" name="qty" id="x3" value="{{$item->qty}}"><br>
                        <label for="x4" class="mt-2">لون العنصر</label>
                        <input type="text" name="color" id="x4" value="{{$item->color}}"><br>
                        <label for="x5" class="mt-2">رقم العنصر</label>
                        <input type="text" name="itemgroupno" id="x5" value="{{$item->itemgroupno}}">
                        </div>
                        <div class="text-center">
                          <button class="btn btn-primary mt-2" type="submit" >حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
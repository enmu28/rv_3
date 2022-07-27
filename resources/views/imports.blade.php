@extends('home_1')
@section('content')
    <div class="row" style="height: 40px; padding-top: 10px;">
        <h5 style="margin-left: 20px;">Import</h5>
    </div>
    <hr style="border: lightblue solid 1px;">
    <form action="{{url('import_csv')}}" method="POST" enctype="multipart/form-data" style="margin-left: 10px;">
        @csrf
        <input type="file" name="file" accept=".xlsx">&emsp;&emsp;&emsp;&emsp;
        <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
    </form>
    <hr style="border: lightblue solid 1px;">
    <div class="list_imports" style="margin-left: 10px;">
        Chưa có dữ liệu!
    </div>
@endsection

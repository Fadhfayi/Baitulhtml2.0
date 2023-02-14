@extends('layout.admin')

@section('content')
<div class="container text-center">
    <div class="row">
        <table class="table table-strip">

            <thead>
                <th>NO</th>
                <th>Nama</th>
                <th>Absensi</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <th>{{ $loop->iteration }}</th>
                <th>{{ $student->name }}</th>
         
                <th>
                    <form>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Hadir</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Izin/Sakit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                            <label class="form-check-label" for="inlineCheckbox3">Alfa</label>
                        </div>
                    </form>
                </th>
                <th>
                    <form>
                        <div class="form-floating">
                            <label for="exampleFormControlTextarea1" ></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                            </div>
                    </form>
                </th>
            </tbody>
            @endforeach
        </table>
        
    </div>
</div>
@endsection
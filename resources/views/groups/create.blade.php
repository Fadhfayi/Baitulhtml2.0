@extends('layout.admin')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">ID - Nama Dosen</label>
                                <select type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                    @foreach($group as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }}. {{ $user->name }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk user_id -->
                                @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Kelas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Kelas Programmer">

                                <!-- error message untuk name -->
                                @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">SUMBIT</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
    @stop
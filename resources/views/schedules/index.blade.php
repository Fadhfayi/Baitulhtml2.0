@extends('layout.admin')
@section('content')
    <!-- Awal Data Table -->
    <div id="table" class="container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif


        <h1>
            <center>ACTIVE CLASS DATA
        </h1>

        <table class="table table-strip">
            <a href="{{ route('schedules.create') }}" class="btn btn-md btn-success mb-3"><i class="fa fa-plus-circle
"></i> ADD NEW ({{ Auth::user()->name }})</a>
             <thead class="table table-dark">
                <tr class="table table-dark">
                    <th scope="col">
                        <center>ID
                    </th>
                    <th scope="col">
                        <center>Group 
                    </th>
                    <th scope="col">
                        <center>User Id
                    </th>
                    <th scope="col">
                        <center>Note
                    </th>
                    <th scope="col">
                        <center>time_start_at
                    </th>
                    <th scope="col">
                        <center>time_end_at
                    </th>
                    <th scope="col" colspan="2">
                        <center>Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($schedules as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->group_id }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->note }}</td>
                    <td>{{ $item->time_start_at }}</td>
                    <td>{{ $item->time_end_at }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('schedules.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('schedules.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                            <a href="{{ route('presences.show', $item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-list-ul"></i> Attendance</a>
                        </form>
                    </td>
                </tr>

                @empty
                <div class="alert alert-danger">
                    <center>DATA NOT FOUND</center>
                </div>

                @endforelse
            </tbody>
            <!-- Akhir Data Table -->
        </table>
        <div>

        </div>
    </div>


@stop
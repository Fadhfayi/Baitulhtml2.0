@extends('layout.admin')
@section('content')
<div class="continer">
    <div class="row">
        <div class="col-9">
            @foreach
            <div class="card">
                <div class="card-header">
                    {{ $quize->quiz }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $quize->id }}</td>
                                </tr>
                                <tr>
                                    <th> Group Id </th>
                                    <td> {{ $quize->group->name }} </td>
                                </tr>
                                <tr>
                                    <th> Quiz </th>
                                    <td> {{ $quize->quiz }} </td>
                                </tr>
                                <tr>
                                    <th> Opsi1 </th>
                                    <td> {{ $quize->opsi1 }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
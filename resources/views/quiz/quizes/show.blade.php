@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">quize {{ $quize->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/quiz/quizes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/quiz/quizes/' . $quize->id . '/edit') }}" title="Edit quize"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('quiz/quizes' . '/' . $quize->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete quize" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $quize->id }}</td>
                                    </tr>
                                    <tr><th> Group Id </th><td> {{ $quize->group->name }} </td></tr><tr><th> Quiz </th><td> {{ $quize->quiz }} </td></tr><tr><th> Opsi1 </th><td> {{ $quize->opsi1 }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                <div class="card-header">{{ $quize->quiz }}</div>
                    <div class="card-body">
                        <input type="radio" value="1" {{ $quize->answer=='1' ? 'checked':''}}  id="opsi1" name="opsi1"> 
                        <label>{{ $quize->opsi1 }}</label>
                        <br>
                        <input type="radio" value="2" {{ $quize->answer=='2'? 'checked':'' }} id="opsi2" name="opsi2"> 
                        <label>{{ $quize->opsi2 }}</label>
                        <br>
                        <input type="radio" value="3" {{ $quize->answer=='3'? 'checked':'' }} id="opsi3" name="opsi3"> 
                        <label>{{ $quize->opsi3 }}</label>
                        <br>
                        <input type="radio" value="4" {{ $quize->answer=='4'? 'checked':'' }} id="opsi4" name="opsi4"> 
                        <label>{{ $quize->opsi4 }}</label>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

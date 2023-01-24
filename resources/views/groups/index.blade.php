@extends('layout.admin')
@section('content')
<h4>Groups Data</h4>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('groups.create') }}" class="btn btn-md btn-success mb-3">TAMBAH GROUP</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Users_id</th>
                                <th scope="col">Name</th>
                                <th scope="col">   </th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($groups as $group)
                                <tr>
                                <td>{{ $group->user_id }}</td>
                                    <td>{{ $group->name }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Group belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $groups->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
    @stop
@extends('admin.layouts.app')

@section('content')

<!-- Table head options start -->
<div class="row" id="table-head">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><a class="btn btn-primary" href="{{ route('admin.skills.create') }}" role="button">Buat baru</a></h4>
        @if(session('success.up'))
          <div class="alert alert-success">
            {!! session('success.up') !!}
          </div>
        @endif
        @if(session('success.down'))
            <div class="alert alert-danger">
                {!! session('success.down') !!}
            </div>
        @endif
      </div>
      <div class="card-content">
        <div class="card-body">
          <p>Similar to tables and dark tables, use the modifier classes <code
              class="highlighter-rouge">.thead-light</code> or <code class="highlighter-rouge">.thead-dark</code> to
            make <code class="highlighter-rouge">&lt;thead&gt;</code>s appear light or dark gray.</p>
        </div>
        <!-- table head dark -->
        <div class="table-responsive">
          <table class="table mb-0">
            <thead class="thead-dark">
              <tr>
                <th>Name</th>
                <th>Percentage</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @forelse($skills as $a)  
              <tr>
                <td class="text-bold-500">{{ $a->name }}</td>
                <td>{{ $a->percentage }}</td>
                <td>
                    <div class="d-flex">
                      <a href="{{ route('admin.skills.edit', $a->id) }}" class="btn btn-warning btn-sm mx-2"><i class="fa fa-edit"></i></a>
                      <form action="{{ route('admin.skills.hapus', $a->id) }}" method="POST">
                        @csrf
                            @method('delete')
                          <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </form>
				    </div>
                </td>
              </tr>
            @empty
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Table head options end -->
@endsection
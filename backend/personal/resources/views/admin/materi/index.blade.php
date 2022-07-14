@extends('admin.layouts.app')

@section('content')

<!-- Table head options start -->
<div class="row" id="table-head">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><a class="btn btn-primary" href="{{ route('admin.materi.create') }}" role="button">Buat baru</a></h4>
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
                <th>Title</th>
                <th>Desc</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @forelse($materi as $m)  
              <tr>
                <td class="text-bold-500">{{ $m->title }}</td>
                <td>{{ $m->desc }}</td>
                <td><embed type="application/pdf" src="/filemateri/{{ $m->file }}" frameborder="0"></embed></td>
                <td>
                    <div class="d-flex">
                      <a href="{{ route('admin.materi.edit', $m->id) }}" class="btn btn-warning btn-sm mx-2"><i class="fa fa-edit"></i></a>
                      <form action="{{ route('admin.materi.hapus', $m->id) }}" method="POST">
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
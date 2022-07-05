@extends('admin.layouts.app')

@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input</h3>
                <p class="text-subtitle text-muted">Fill data or information using input is better than writing by pen.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Inputs</h4>
            </div>
            <form action="{{ route('admin.skills.update', $skills->id) }}" method="post" enctype="multipart/form-data">
			@csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="helpInputTop">name</label>
                            <input type="text" class="form-control" name="name" id="helpInputTop" value="{{ $skills->name }}">
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">percentage</label>
                            <input type="text" class="form-control" name="percentage" id="helpInputTop" value="{{ $skills->percentage }}">
                        </div>
                      
                        <small style="color:red">*Semua harus diisi</small>
                        <p></p>
                        
                        <div class="form-group">
								<button class="btn btn-primary">
									<i class="fa fa-paper-plane"></i> Save
								</button>
						</div>
                </div>
            </div>
          </form>
        </div>
    </div>
@endsection
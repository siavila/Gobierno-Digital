@extends('layouts.app')

@section('template_title')
    {{ $role->name ?? 'Show Role' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles de  Rol</span>
                        </div>
                        <br>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $role->name }}
                        </div>

                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $role->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $role->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    Role
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Roles') }}
                            </span>

                             <div class="float-right">
                                 
                                 @if($rolActual->role_id==1)

                                    <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                          {{ __('Crear Rol') }}
                                     </a>
                                @else

                                    <button  class="btn btn-sm btn-primary" disabled ><i class="fa fa-fw fa-trash"></i> Crear Rol</button>


                                @endif
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Slug</th>
										<th>Descripción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $role->name }}</td>
											<td>{{ $role->slug }}</td>
											<td>{{ $role->description }}</td>

                                            <td>
                                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info " href="{{ route('roles.show',$role->id) }}"><i class="fa fa-fw fa-eye"></i> Detalles</a>


                                                    @if($rolActual->role_id==1)
                                                        <a class="btn btn-sm btn-secondary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @else
                                                        <button  class="btn btn-sm btn-secondary" disabled ><i class="fa fa-fw fa-trash"></i> Editar</button>

                                                    @endif


                                                    @csrf
                                                    @method('DELETE')

                                                    @if($rolActual->role_id==1)
                                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                     @else
                                                        <button type="submit" class="btn btn-warning btn-sm" disabled ><i class="fa fa-fw fa-trash"></i> Eliminar</button>

                                                    @endif

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $roles->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('template_title')
    Update Role User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Role User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('role-users.update', $roleUser->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('role-user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

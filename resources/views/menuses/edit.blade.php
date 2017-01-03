@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Menus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($menus, ['route' => ['menuses.update', $menus->id], 'method' => 'patch']) !!}

                        @include('menuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@extends('layouts.user')
@section('main')

<h3 align=right> <b>{{HTML::link('dashboard', 'Dashboard') }} </b></h3>

<h1>Lista Alumnos</h1>

<p>{{ link_to_route('students.create', 'Agregar Alumno') }}</p>


@if ($students->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
		<th>Nombre</th>
                <th>Apellido</th>
		<th>Activo</th>
                <th>CURP</th>
                <th>Editar</th>
        
            </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
                <tr>
		    <td>{{ $student->firstName_students }}</td>
                    <td>{{ $student->lastName_students }}</td>
                    <td>{{ $student->active_students}}</td>        
		    <td>{{ $student->curp_students}}</td>
                    <td>{{ link_to_route('students.edit', 'Editar',
 array($student->id_students), array('class' => 'btn btn-info')) }}</td>
                    <td>
          {{ Form::open(array('method'=> 'DELETE', 'route' => array('students.destroy', $student->id_students))) }}                       
                            {{ Form::submit('Activar/Desactivar', array('class'
 => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    No hay alumnos registrados
@endif

@stop














         






















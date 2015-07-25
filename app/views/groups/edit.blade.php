@extends('layouts.user')

@section('main')

<h1> Grupo {{ $group->name_groups }}</h1>
{{ Form::model($group, array('method' => 'PATCH', 'route' =>
 array('groups.update', $group->id_groups))) }}
    <ul>
         <li>
             {{ Form::label('name_groups','Nombre') }}
	     {{ Form::text('name_groups',$group->name_groups) }}
         </li>
        <li>
             {{ Form::label('year_groups','Year') }}
	     {{ Form::text('year_groups', $group->year_groups) }}
	 </li>
	 <li>
           
           <br>
	</li>  
	<li>
           {{Form::label('grados_id_grados', 'Grado:')  }}
           {{Form::select('grados_id_grados', $id_grados, $group->grados_id_grados,  ['class'=> 'form-control']) }}
	</li>   
<?php //$s=$group->students();
  $s = Student::find(1);
         $ids = array_map(create_function('$st', 'return $st->id_students;' ), $s);?>
        <li>
            {{  Form::label('id_students', 'Alumnos:')  }}
            {{  Form::select('id_students', $id_students, $group->students(),  ['class' => 'form-control','multiple' ]) }} 

        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('groups.show', 'Cancel', $group->
id_groups, array('class' => 'btn')) }}
        </li>  
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

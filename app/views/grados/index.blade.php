<!--@extends('layouts.user')
@section('main')-->

<html>
<head>

{{HTML::script('assets/js/jquery-1.11.1.js'); }}
{{HTML::script('assets/js/jquery-ui.js');  }}
{{HTML::script('assets/js/jquery-ui.min.js'); }}
{{HTML::style('assets/css/jquery-ui.min.css'); }}
 
  <script>
  $(function() {
  // $(document).ready(function() {
    $( '#tabs' ).tabs();
  });
  </script>
</head>


<body>
<h1>Lista Materias por Grado</h1>
<?php 
    $year = date("Y");
    $month = date("m"); 
    if($month < 8){
       $year = $year - 1;  
    }
 ?>
<h2>{{$year}}-{{$year+1}}</h2>
<div id="tabs">
<ul> <?php $i=1; ?>
   @foreach($grados as $grado)
    <li><a href="#tabs-{{$i}}">{{ $grado->name_grados}} </a></li>
    <?php $i++; ?>
   @endforeach
  </ul>
  <?php $i = 1; ?>
@foreach($grados as $grado)
	<div id="tabs-{{$i}}" >  
	   @if($grado->subject->count())
           <table>
             @foreach($grado->subject as $subject)
	     <tr> <td> {{ $subject->name_subjects }}</td> 
              <td>
	        
		{{Form::open(array('method' => 'DELETE', 'route' => array('grados.destroy', $grado->id_grados, $subject->id_subjects)))  }} 
 
       <!--     {{ Form::open(array ('method' => 'DELETE', 'action' => array('GradoController@destroy', $grado->id_grados, $subject->id_subjects))) }} -->
	    {{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
	 </td> </tr>
	     @endforeach
          </table>
           @else
	        No hay materias asociadas
	   @endif
             </br></br>
              {{ link_to_route('grados.edit', 'Agregar Materias',
 array($grado->id_grados), array('class' => 'btn btn-info')) }} 
             <?php $i++; ?>
  </div>
@endforeach
</div>
 
</body>
</html>

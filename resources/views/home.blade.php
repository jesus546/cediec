@extends('themes.layaoutT')
@section('cont')
      <h5>Bienvenido {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h5>
@endsection
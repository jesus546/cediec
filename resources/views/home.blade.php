@extends('themes.layaoutT')
@section('cont')
      <h5>Bienvenido {{ ucwords(Auth::user()->nombres) }} {{ ucwords(Auth::user()->apellidos) }}</h5>
@endsection
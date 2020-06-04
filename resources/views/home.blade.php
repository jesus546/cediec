@extends('themes.layaoutT')
@section('cont')
      <h5>Bienvenido {{ Auth::user()->nombres }}</h5>
@endsection
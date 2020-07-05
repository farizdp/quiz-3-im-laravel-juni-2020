@extends('layouts.master')
@section('content')
<div class="card">
    <form action = "{{ url('/artikel') }}" method = "POST">
        @csrf
        <label for = ""> Judul </label>
        <input class = "form-control" type = "text" name = "judul">
        <br>
        <label for = ""> Isi </label>
        <textarea class = "form-control" name = "isi" id = "" cols = "10" rows = "10"></textarea>
        <br>
        <label for = ""> Tag </label>
        <p> Note: bila lebih dari 1 tag, pisah dengan tanda koma. </p> 
        <input class = "form-control" type = "text" name = "tag">
        <input hidden name = "tgl_dibuat" value = " {{ \Carbon\Carbon::now() }}">
        <input hidden name = "tgl_diperbaharui" value = "{{ \Carbon\Carbon::now() }}">
        <br>
        <button class = "btn btn-primary" type = "Submit"> Create </button>
    </form>
</div>
@endsection
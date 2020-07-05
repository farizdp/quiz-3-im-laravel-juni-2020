@extends('layouts.master')
@section('content')
<div class="card">
    <a href=" {{ url('/artikel/create')}}">
        <button class = "btn btn-primary"> Create </button>
    </a>
    <br>
        <table clsss="table table-bordered">
            <thead>
                <th> No </th>
                <th> Judul Artikel </th>
                <th> Action </th>
            </thead>
            <tbody>
                @if (isset($artikels))
                    @foreach ($artikels as $i)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $i->judul }} </td>
                    <td>
                        <a href=" {{'/artikel/'.$i->id}}" method = "POST" >
                            <button class = "btn btn-primary"> Detail </button>
                        </a>
                        <a href=" {{'/artikel/'.$i->id.'/edit'}}" method = "POST" >
                            <button class = "btn btn-warning"> Edit </button>
                        </a>
                        <form action = " {{ url('/pertanyaan/'.$i->id) }} " method = "POST">
                            @csrf
                            {{ method_field('delete')}}
                            <button class = "btn btn-danger" type = "Submit"> Delete </button>
                        </form>
                    </td>
                    <tr>
                    @endforeach
                @else
                    <h2> Data artikel belum ada! </h2> 
                @endif
            </tbody>
        </table>
    <br>
    <a href=" {{ url('/artikel/create')}}">
        <button class = "btn btn-primary"> Create </button>
    </a>
    </div>
@endsection
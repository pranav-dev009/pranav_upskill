@extends('layouts.app')
@section('title', 'Show Page')
@section('content')
<?php
    $id = request()->route('id');
    $people = [
        0 => [
            'id' => 1, 'name' => 'Pranav', 'tech' => 'core PHP'
        ],
        1 => [
            'id' => 2, 'name' => 'Parth', 'tech' => 'Laravel'
        ],
        2 => [
            'id' => 3, 'name' => 'Dhaval', 'tech' => 'Odoo'
        ]
    ];
?>
<div class="container">
    <div class="row">
        @for ($i = 0; $i < count($people); $i++)
            @if ($id != "")
                <div>Name : {{ $people[$id]['name']; }}</div>
                <div>Technology : {{ $people[$id]['tech']; }}</div>
                @break;
            @endif
            <div>Name : {{ $people[$i]['name']; }}</div>
            <div>Technology : {{ $people[$i]['tech']; }}</div>
        @endfor
    </div>
</div>
@endsection
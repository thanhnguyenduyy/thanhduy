@extends('layout')

@section('body')
<div style="margin-left: -40px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List member</h1>
    </div>

    <div>
    @if(session('success'))
        <div class="alert alert-success" style="color: red; font-weight: bold; margin: 20px 0 20px 0;">
            {{ session('success') }}
        </div>
    @endif
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="center" style=" width: 5%;">STT</th>
                <th class="center">Image</th>
                <th class="center">Name</th>
                <th class="center">Note</th>
                <th class="center">Status</th>
                <th class="center">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($members as $member)
                <tr>
                    <td class="center">{{ $i++ }}</td>
                    <td class="center">
                        <img src="{{ $member->images }}" width="70px" height="70px" alt="Image">
                        <!-- <img src="{{ asset('uploads/members/'.$member->images) }}" width="70px" height="70px" alt="Image"> -->
                    </td>
                    <td class="center">{{ $member->name }}</td>
                    <td class="center">{{ $member->note }}</td>  
                    <td class="center">
                        @if ($member->delete_flg == 0)
                            <button class="btn btn-xs btn-info" style="background-color: gray;">enabled</button>
                        @else
                            <button class="btn btn-xs btn-info" style="background-color: violet;">disabled</button>
                        @endif
                    </td>
                    <td class="center">
                    <div class="btn-group">
                        <button class="btn btn-xs btn-info">
                            <a class="decoration" href="create">Create</a>
                        </button>
                        <button class="btn btn-xs btn-info">
                            <a class="decoration" href="edit/{{$member->id}}">Edit</a>
                        </button>
                        <!-- <button class="btn btn-xs btn-danger">
                            <a class="decoration" href="destroy/{{$member->id}}"  
                            onclick="return confirm('Bạn có chắc không?')">Del</a>
                        </button> -->
                        <button class="btn btn-xs btn-danger">
                            <a class="decoration" href="delete/{{$member->id}}"  
                            onclick="return confirm('Bạn có chắc không?')">Delele</a>
                        </button>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
/* Reset CSS styles for the table */
    table 
    {
        border-collapse: collapse;
        width: 100%;
    }

    .center{
        text-align: center;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #ddd;
    }

    /* Add styles for table header and table body */
    .table-header {
        background-color: #333;
        color: #fff;
    }

    .table-body tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Add styles for hover effect on table rows */
    tr:hover {
        background-color: #ddd;
    }

    .decoration {
        text-decoration: none;
        color: black;
    }

</style>
@stop
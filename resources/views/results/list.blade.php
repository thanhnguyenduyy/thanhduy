@extends('layout')

@section('body')
<div style="margin-left: -40px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Result</h1>
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
                <th class="center">Name</th>
                <th class="center">Vòng đấu</th>
                <th class="center">Điểm số</th>
                <th class="center">Thắng</th>
                <th class="center">Thua</th>
                <th class="center">Ghi chú</th>
                <th class="center" style=" width: 20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($results as $result)
                <tr>
                    <td class="center">{{ $i++ }}</td>
                    <td class="center">{{ $result->member_name }}</td>
                    <td class="center">Vòng {{ $result->round_matches }}</td>
                    <td class="center">{{ $result->point }}</td>
                    <td class="center">{{ $result->result_win }}</td>
                    <td class="center">{{ $result->result_lose }}</td>
                    <td class="center">{{ $result->note }}</td>
                    <td class="center">
                    <div class="btn-group">
                        <button class="btn btn-xs btn-info">
                            <a class="decoration" href="create">Create</a>
                        </button>
                        <button class="btn btn-xs btn-info">
                            <a class="decoration" href="edit/{{$result->id}}">Edit</a>
                        </button>
                        <button class="btn btn-xs btn-danger">
                            <a class="decoration" href="destroy/{{$result->id}}" onclick="return confirm('Bạn có chắc không?')">Del</a>
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

    .btn-success {
        background-color: green;
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }
</style>
@stop
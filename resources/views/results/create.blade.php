@extends('layout')

@section('body')
<div class="page-header">
    <h1 class="page-title">Create Results</h1>
</div>

<div class="notification">
    @if(session('success'))
    <div class="alert alert-success" style="color: red; font-weight: bold;">
        {{ session('success') }}
    </div>
    @endif
</div>

<div class="container">
    <form action="{{ route('results.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_member">Tên(*)</label>
                    <select class="custom-select" name="id_member" id="id_member">
                        @foreach ($name_member as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="round_matches">Vòng đấu(*)</label>
                    <select class="custom-select" name="round_matches" id="round_matches">
                        @foreach ($round_matches as $item)
                            <option value="{{ $item }}">Vòng {{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="point">Điểm số(*)</label>
                    <input type="number" name="point" class="form-control" id="point" placeholder="Điểm số">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <div class="form-group" style="width: 93%;">
                    <label for="result_win">result_win</label>
                    <select class="custom-select" name="result_win" id="result_win">
                        <option value="">Option</option>
                        <option value="1">Thắng</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="width: 93%;">
                    <label for="result_lose">result_lose</label>
                    <select class="custom-select" name="result_lose" id="result_lose">
                        <option value="">Option</option>
                        <option value="1">Thua</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4" style="margin-left: -30px;">
                <div class="form-group" style="width: 93%;">
                    <label for="note">Note(*)</label>
                    <input type="text" name="note" class="form-control" id="note" placeholder="Ghi chú">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">ADD</button>
    </form>
</div>
<style>
    .page-header {
        padding: 20px 0;
        border-bottom: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .page-title {
        font-size: 24px;
        margin: 0;
        padding: 0;
    }

    .notification {
        margin: 20px 0;
    }

    .form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .custom-select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-row {
        display: flex;
        margin-right: -15px;
        margin-left: -15px;
    }

    .col-md-4 {
        flex-basis: 33.33%;
        max-width: 33.33%;
        padding: 0 15px;
    }

    .btn {
        padding: 10px 20px;
    }
</style>
@stop

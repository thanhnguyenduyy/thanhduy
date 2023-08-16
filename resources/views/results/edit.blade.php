@extends('layout')

@section('body')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit results</h1>
</div>

<div>
    @if(session('success'))
    <div class="alert alert-success" style="color: red; font-weight: bold;">
        {{ session('success') }}
    </div>
    @endif
</div>
    <form action="{{ route('results.update', $edit_result->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_member">Tên(*)</label>
                    <input type="text" disabled name="id_member" value="{{ $edit_result->member_name }}" class="form-control" id="id_member" placeholder="id_member">
                    <input type="hidden" name="id_member" value="{{ $edit_result->id_member }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="round_matches">Vòng đấu(*)</label>
                    <input type="text" name="round_matches" value="{{ $edit_result->round_matches }}" class="form-control" id="round_matches" placeholder="round_matches">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="point">Điểm số(*)</label>
                    <input type="number" name="point" value="{{ $edit_result->point }}" class="form-control" id="point" placeholder="Điểm số">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <div class="form-group" style="width: 93%;">
                    <label for="result">Kết quả(*)</label>
                    <input type="number" name="result" value="{{ $edit_result->result }}" class="form-control" id="result" placeholder="Kết quả">
                </div>
            </div>
            <div class="col-md-4" style="margin-left: -30px;">
                <div class="form-group" style="width: 93%;">
                    <label for="note">Note(*)</label>
                    <input type="text" name="note" value="{{ $edit_result->note }}" class="form-control" id="note" placeholder="Ghi chú">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-space">Update</button>
    </form>
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

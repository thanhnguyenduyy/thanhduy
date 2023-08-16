@extends('layout')

@section('body')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit member</h1>
</div>

<div>
    @if(session('success'))
    <div class="alert alert-success" style="color: red; font-weight: bold; margin: 20px;">
        {{ session('success') }}
    </div>
    @endif
</div>
    <form action="{{ route('members.update', $edit_members->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-12">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $edit_members->name }}" class="form-control" id="name" placeholder="name">
            </div>
            <div class="form-group col-12" style="margin-top: 20px;">
                <label for="images">Images</label>
                <input type="text" name="images" value="{{ $edit_members->images }}" class="form-control" id="images" placeholder="images">
                <img id="image-preview" src="#" alt="Image Preview" style="display: none; width: 100px; height: 100px; margin-top: 10px;">
            </div>
            <!-- <div class="form-group col-12" style="margin-top: 20px;">
                <label for="images">Images</label>
                <input type="file" id="images" value="{{ $edit_members->images }}" name="images" class="form-control form-control-file" required>
                <img id="image-preview" src="#" alt="Image Preview" style="display: none; width: 100px; height: 100px; margin-top: 10px;">
            </div> -->
            <div class="form-group col-12" style="margin-top: 20px;">
                <label for="note">Note</label>
                <input type="text" name="note" value="{{ $edit_members->note }}" class="form-control" id="note" placeholder="note">
            </div>

            <button type="submit" class="btn btn-primary btn-space">Update</button>
        </div>
    </form>
<script>
document.getElementById('images').addEventListener('change', function(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var imagePreview = document.getElementById('image-preview');
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
});
</script>
    <style>
    /* CSS cho các nhóm form và input */
    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }

    .form-group {
        flex: 0 0 100%;
        max-width: 100%;
    }

    /* CSS cho nhãn (label) */
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    /* CSS cho các input */
    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* CSS cho nút ADD */
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
    }

    /* Khoảng cách giữa nút ADD và các phần tử trước nó */
    .btn-space {
        margin-top: 15px;
    }
</style>
@stop

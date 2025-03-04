@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Add Product Variation</h3>
                <a href="{{ url('admin/variations/index') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/variations/store') }}"  method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Variation Name</label>
                        <input type="text" name="variation_name" class="form-control" required>
                        <small class="text-muted">Example: Color, Size, RAM, Storage</small>
                    </div>

                    <div class="mb-3">
                        <label>Variation Values</label>
                        <div id="variation_values_container">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <input type="text" name="values[]" class="form-control" placeholder="Value (e.g., Red, 4GB, 128GB)" required>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="addVariationValue()">Add Another Value</button>
                    </div>

                    <div class="mb-3">
                        <label>Status</label><br>
                        <input type="checkbox" name="status"> Active
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function addVariationValue() {
        const container = document.getElementById('variation_values_container');
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-2');
        newRow.innerHTML = `
            <div class="col-md-6">
                <input type="text" name="values[]" class="form-control" placeholder="Value (e.g., Red, 4GB, 128GB)" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger" onclick="removeVariationValue(this)">Remove</button>
            </div>
        `;
        container.appendChild(newRow);
    }

    function removeVariationValue(button) {
        button.closest('.row').remove();
    }
</script>

@endsection

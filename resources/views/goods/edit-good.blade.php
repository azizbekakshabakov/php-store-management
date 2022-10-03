<!DOCTYPE html>
<html>
<head>
	<title>Supermarket</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

<div class="border-end bg-white" id="sidebar-wrapper" style="position: fixed; bottom: 0; top: 0; width: 250px;">
	<a href="/" class="text-decoration-none"><div class="text-dark p-3 fs-5">Supermarket</div></a>
	<div class="list-group list-group-flush">
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/employees">Employees</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/categories">Categories</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="/table/goods">Goods</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/sales">Sales</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/suppliers">Suppliers</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/warehouses">Warehouses</a>
	</div>
</div>

<div class="container">

	<h1 class="text-center mt-5">Editing</h1>

	@if(isset($_GET['fail-save']))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Change failed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

	<form action="/table/goods/edit/{{$good->id}}" method="post">
		<!-- <input type="hidden" name="table" value="SomeValue"> -->
		@csrf
		<div class="form-group modal-body">
			<label>Title : </label>
			<input type="text" name="name" class="form-control" value="{{$good->name}}">
		</div>
		<div class="form-group modal-body">
			<label>Quantity : </label>
			<input type="number" name="quantity" class="form-control" value="{{$good->quantity}}">
		</div>
		<div class="form-group modal-body mb-3">
			<label>Category : </label>
			<select class="form-select" name="category_id">
				@foreach($categories as $category)
					<option value="{{$category->id}}" @if($category->id == $good->category_id) selected @endif>
						{{$category->name}}
					</option>
				@endforeach
			</select>
		</div>
		<div class="form-group modal-body mb-3">
			<label>Supplier : </label>
			<select class="form-select" name="supplier_id">
				@foreach($suppliers as $supplier)
					<option value="{{$supplier->id}}" @if($supplier->id == $good->supplier_id) selected @endif>
						{{$supplier->name}}
					</option>
				@endforeach
			</select>
		</div>
		<div class="form-group modal-body mb-3">
			<label>Warehouse : </label>
			<select class="form-select" name="warehouse_id">
				@foreach($warehouses as $warehouse)
					<option value="{{$warehouse->id}}" @if($warehouse->id == $good->warehouse_id) selected @endif>
						{{$warehouse->index}}
					</option>
				@endforeach
			</select>
		</div>
		<div class="row"><div class="col text-center">
			<button type="submit" class="btn btn-success">Submit</button>
		</div></div>
	</form>

</div>

</body>
</html>
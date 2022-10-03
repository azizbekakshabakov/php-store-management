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
		<a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="/table/categories">Categories</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/goods">Goods</a>
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

	<form action="/table/categories/edit/{{$category->id}}" method="post">
		<!-- <input type="hidden" name="table" value="SomeValue"> -->
		@csrf
		<div class="form-group modal-body">
			<label>Title : </label>
			<input type="text" name="name" class="form-control" value="{{$category->name}}">
		</div>
		<div class="form-group modal-body mb-3">
			<label>Employee responsible : </label>
			<select class="form-select" name="employee_id">
				@foreach($employees as $employee)
					<option value="{{$employee->id}}" @if($employee->id == $category->employee_id) selected @endif>
						{{$employee->name}} {{$employee->surname}}
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
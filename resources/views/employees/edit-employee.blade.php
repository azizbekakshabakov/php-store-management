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
		<a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="/table/employees">Employees</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/categories">Categories</a>
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

	<form action="/table/employees/edit/{{$employee->id}}" method="post" enctype="multipart/form-data">
		<!-- <input type="hidden" name="table" value="SomeValue"> -->
		@csrf
		<div class="form-group modal-body">
			<label>Name : </label>
			<input type="text" name="name" class="form-control" value="{{$employee->name}}">
		</div>
		<div class="form-group modal-body">
			<label>Surname : </label>
			<input type="text" name="surname" class="form-control" value="{{$employee->surname}}">
		</div>
		<div class="form-group modal-body">
			<label>Salary : </label>
			<input type="number" name="salary" class="form-control" value="{{$employee->salary}}">
		</div>
		<div class="form-group modal-body">
			<label>Experience : </label>
			<input type="number" name="experience" class="form-control" value="{{$employee->experience}}">
		</div>
		<div class="form-group modal-body">
			<label>Photo : </label>
			<input type="file" name="image" class="form-control" value="{{$employee->experience}}">
		</div>

		<div class="row"><div class="col text-center">
			<button type="submit" class="btn btn-success">Submit</button>
		</div></div>
	</form>

</div>

</body>
</html>
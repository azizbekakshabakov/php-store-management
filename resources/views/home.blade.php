<!DOCTYPE html>
<html>
<head>
	<title>Supermarket</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <div></div>
    <form class="d-flex">
      @if(\Illuminate\Support\Facades\Auth::user())
        <div class="m-2">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
        <a class="btn btn-success" href="/auth/logout">Log out</a>
      @else
        <a class="btn btn-success me-2" href="/auth/register">Register</a>
        <a class="btn btn-success" href="/auth/login">Authorize</a>
      @endif
    </form>
  </div>
</nav>

<div class="border-end bg-white" id="sidebar-wrapper" style="position: fixed; bottom: 0; top: 0; width: 250px;">
	<a href="/" class="text-decoration-none"><div class="text-dark p-3 fs-5">Supermarket</div></a>
	<div class="list-group list-group-flush">
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/employees">Employees</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/categories">Categories</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/goods">Goods</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/sales">Sales</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/suppliers">Suppliers</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/warehouses">Warehouses</a>
	</div>
</div>

<div class="container">

	@if(session('status'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			{{session('status')}}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif

    <div class="d-flex align-items-center justify-content-center" style="height: 90vh;">
        <h1 class="text-center mt-5">Store management system</h1>
    </div>

    <!-- <div class="row mt-2">
        <div class="col-sm-12">
            We offer best experience for you
        </div>
    </div> -->

</div>

</body>
</html>
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
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/goods">Goods</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="/table/sales">Sales</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/suppliers">Suppliers</a>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/table/warehouses">Warehouses</a>
	</div>
</div>

<div class="container">

	<h1 class="text-center mt-5">Sales</h1>

    @if(isset($_GET['fail-add']))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Add failed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(isset($_GET['fail-remove']))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Remove failed. Reason: key constraint
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(isset($_GET['success']))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Add confirmed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(isset($_GET['remove']))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Removal confirmed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mt-2">
        <div class="col-sm-12">
            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addItemModal">Add</button>
            <table class="table table-hover table-striped">
                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Goods</th>
                        <th>Sales quantity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{$sale->good->name}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group me-1">
                                    <form action="/table/sales/edit/{{$sale->id}}" method="GET">
                                        <button type="submit" class="btn btn-primary">edit</button>
                                    </form>
                                </div>
                                <div class="btn-group">
                                    <form action="/table/sales/remove/{{$sale->id}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">remove</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal for adding -->
<form action="/table/sales/add" method="POST">
    @csrf
	<div class="modal fade" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Add properties</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
                <div class="form-group modal-body mb-3">
                    <label>Goods : </label>
                    <select class="form-select" name="good_id">
                        <option hidden disabled selected value></option>
                        @foreach($goods as $good)
                        <option value="{{$good->id}}">
                            {{$good->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group modal-body">
                    <label>Quantity : </label>
                    <input type="number" name="quantity" class="form-control">
                </div>
                
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Add</button>
				</div>
			</div>
		</div>
	</div>
</form>

</body>
</html>
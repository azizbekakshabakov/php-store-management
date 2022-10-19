<!DOCTYPE html>
<html>
<head>
	<title>Supermarket</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

<div class="container">

    <!-- <div class="d-flex align-items-center justify-content-center" style="height: 90vh;"> -->
        <h1 class="text-center mt-5">Register form</h1>
    <!-- </div> -->

	@if(session('status'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		{{session('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
	@endif

	<form action="/auth/user/create" method="POST">
		@csrf
		<div class="form-group modal-body">
			<label>Name : </label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group modal-body">
			<label>Email : </label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group modal-body">
			<label>Password : </label>
			<input type="text" name="password" class="form-control">
		</div>
		<div class="form-group modal-body">
			<label>Confirm password : </label>
			<input type="text" name="confirm_password" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-success">Confirm</button>
		</div>
	</form>

</body>
</html>
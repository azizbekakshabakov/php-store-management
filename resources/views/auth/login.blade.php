<!DOCTYPE html>
<html>
<head>
	<title>Supermarket</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

    <!-- <div class="d-flex align-items-center justify-content-center" style="height: 90vh;"> -->
        <h1 class="text-center mt-5">Login form</h1>
    <!-- </div> -->

	@if(session('status'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			{{session('status')}}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif

	<form action="/auth/signin" method="POST">
		@csrf
		<div class="form-group modal-body">
			<label>Email : </label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group modal-body">
			<label>Password : </label>
			<input type="text" name="password" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-success">Confirm</button>
		</div>
	</form>

</body>
</html>
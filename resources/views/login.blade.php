@extends('layouts.onlytop')
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
	@section('title','會員登入')
	<style type="text/css">
			@import url(login.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>
	<script src="index.js"></script>
</head>
<body>
	@yield('top')
	@section('mid')
		@parent
			<!-- login begin -->
			<section class="vh-100" style="background-color:#a6a6a6;">
			<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-xl-9">
				<h1 class="text-white mb-4 bg-info text-center" style="border-radius: 15px;">登入</h1>
				@if(isset($err))
				<div class="alert alert-danger">
				<ul>
					<li>{{ $err }}</li>
				</ul>
				</div><br/>
				@endif
				<form method="post" action="login">
					<div class="card" style="border-radius: 15px;">
						<div class="card-body">
							<div class="row align-items-center pt-4 pb-3">
							<div class="col-md-3 ps-5">
								<h6 class="mb-0">*請輸入帳號</h6>
							</div>
							<div class="col-md-9 pe-5">
								<input type="text" class="form-control form-control-md" placeholder="請輸入姓名" required name="memberName">
							</div>
							</div>
							<hr class="mx-n3">
							<div class="row align-items-center py-3">
							<div class="col-md-3 ps-5">
								<h6 class="mb-0">*請輸入密碼</h6>
							</div>
							<div class="col-md-9 pe-5">
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="memberPassword">
							</div>
							</div>
							<hr class="mx-n3">
							<div class="px-5 py-1">
								<button type="submit" class="btn btn-primary btn-lg">登入</button>
							</div>
							<div class="px-5 py-1">
							<a href="{{ route('register.index')}}"><button type="button" class="btn btn-primary btn-lg">註冊</button></a>
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</div>
					</div>
				</form>
			</div>
			</div>
		</div>
		</section>
	<!-- login end -->
	@endsection
</body>
</html>
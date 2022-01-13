@extends('layouts.top')
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
	@section('title','食譜列表')
	<style type="text/css">
			@import url(S1.css);
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
	@yield('head')
	@section('mid')
    <!-- 內文 -->
    <div class="container">
		<div class="row">
			@foreach($recipecases as $case)
				<div class="col mx-auto py-4">	
					<div class="card rounded" style="width: 19rem;">
						<img class="card-img-top" src="index_img/chiahan.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">{{$case->recipeName}}</h5>
							<p class="card-text">{{$case->ingredients}}</p>
							<a href="{{ route('recipe.show', $case->recpieId)}}" class="btn btn-primary">查看食譜</a>
							<a href="{{ route('recipe.edit', $case->recpieId)}}" class="btn btn-primary">修改食譜</a>
						</div>
					</div>
				</div>
        	@endforeach
		</div>
    </div>
    <!-- 內文 -->
	@endsection
	@yield('foot')
</body>
</html>
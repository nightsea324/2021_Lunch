<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
	<title>首頁</title>
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
	<!-- 頁首開始 -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<img src="index_img/lunch.png" width="30" height="30" class="d-inline-block align-top" alt="">
  		<a class="navbar-brand" href="{{ route('recipe.index')}}">午餐呷啥</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav w-100">
				<li class="nav-item align-item-center" style="width:5rem;">
					<a class="nav-link" href="{{ route('recipe.create')}}">新增食譜</a>
				</li>
				<li class="nav-item align-item-center" style="width:5rem;">
					<a class="nav-link" href="part2.php">我的食譜</a>
				</li>
				<div class="container text-center">
					<div class="row">
						<form class="form-inline">
							<input class="form-control mr-sm-5" style="width:40em;" type="search" placeholder="請輸入食譜" aria-label="Search">
							<button class="btn btn-outline-success my-3 my-sm-0" type="submit">搜尋食譜</button>
						</form>
					</div>
				</div>
				<li class="nav-item float-right" style="width:7rem;">
					<a class="nav-link" href="{{ route('member.index')}}"><img src="index_img/enter.png" width="20" height="20" class="d-inline-block align-top" alt=""> 登入</a>
				</li>
			</ul>
  		</div>
	</nav>
	<!-- 頁首結束 -->

	<!-- 廣告倫波 -->
	<div class="container">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  			<ol class="carousel-indicators">
    			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="index_img/chiahan.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="index_img/raman.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="index_img/chiahan.jpg" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!-- 廣告倫波結束 -->

	<!-- 熱門食譜 -->
	<div class="row">
		<div class="col mx-auto py-4">
			<h4 class="text-center font-weight-bold"><img src="index_img/hot-sale.png" width="30" height="30" class="d-inline-block align-items-center" alt=""> 熱門食譜</h4>
		</div>
	</div>
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
						</div>
					</div>
				</div>
        	@endforeach
		</div>
	</div>
	<footer class="bg-light text-center text-lg-start">
		<!-- Grid container -->
		<div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">聯絡我們</h5>

        <p>
          聯絡資訊之類的東西
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">更多資訊</h5>

        <p>
          更多資訊之類的東西
        </p>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-dark" href="index.php">午餐呷啥</a>
  </div>
  <!-- Copyright -->
	</footer>
	<!-- 頁尾結束 -->
</body>
</html>
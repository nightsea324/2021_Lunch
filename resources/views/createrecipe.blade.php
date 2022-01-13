<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <title>新增食譜</title>
  <meta charset="utf-8">
  <!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>
  <script src="index.js"></script>
  <style type="text/css">
   
  </style>
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
				@if(isset($username))
				<li class="nav-item align-item-center" style="width:5rem;">
					<a class="nav-link" href="{{ route('recipe.create')}}">新增食譜</a>
				</li>
				<li class="nav-item align-item-center" style="width:5rem;">
					<a class="nav-link" href="part2.php">我的食譜</a>
				</li>
				@endif
				<div class="container text-center">
					<div class="row">
						<form class="form-inline">
							<input class="form-control mr-sm-5" style="width:40em;" type="search" placeholder="請輸入食譜" aria-label="Search">
							<button class="btn btn-outline-success my-3 my-sm-0" type="submit">搜尋食譜</button>
						</form>
					</div>
				</div>
				@if(isset($username))
				<li class="nav-item float-right" style="width:10rem;">
					<a class="nav-link" href="login"><img src="index_img/enter.png" width="20" height="20" class="d-inline-block align-top" alt=""> 歡迎，{{ $username }}</a>
				</li>
				<li class="nav-item float-right" style="width:7rem;">
					<a class="nav-link" href="logout">登出</a>
				</li>
				@else
				<li class="nav-item float-right" style="width:7rem;">
					<a class="nav-link" href="login"><img src="index_img/enter.png" width="20" height="20" class="d-inline-block align-top" alt=""> 登入</a>
				</li>
				@endif
			</ul>
  		</div>
	</nav>
  <!-- 頁首結束 -->
<!-- 內文開始 -->
  <div class="container">
    <div class="row">
      <div class="col mx-auto py-4">
        <h4 class="text-center font-weight-bold"><img src="index_img/edit.png" width="30" height="30" class="d-inline-block align-items-center" alt=""> 編輯食譜</h4>
      </div>
    </div>
    <!-- input group -->
    <form method="post" action="{{ route('recipe.store') }}">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlFile1">上傳成果照片</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple >
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="form-group">
            <label for="exampleFormControlFile1">食譜名稱</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="recipeName"></textarea>
            
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="form-group">
            <label for="exampleFormControlFile1">食譜食材</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ingredients"></textarea>
            
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">詳細步驟說明</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="step"></textarea>
            <input type="hidden" name="memberName" value="NightSea" >
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
        </div>
      <!-- </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">食譜分量</label>
        <input type="text" class="form-control" placeholder="2人分">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">製作時間</label>
        <input type="text" class="form-control" placeholder="30分鐘">
      </div> -->
      <button type="submit" class="btn btn-primary my-3">新增</button>
    </form>
    <!-- input group -->
  </div>
<!-- 內文結束 -->
  <!-- 頁尾 -->
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

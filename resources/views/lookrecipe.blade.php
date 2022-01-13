<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <title>lookrecipe</title>
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
    .imgsize .imgsize2 img{
      width: 100%;
      height: 100%;
      object-fit: cover;
      overflow: hidden;
    }
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
          <a class="nav-link" href="login.php"><img src="index_img/enter.png" width="20" height="20" class="d-inline-block align-top" alt=""> 登入</a>
        </li>
      </ul>
      </div>
  </nav>
  <!-- 頁首結束 -->
<!-- 內文開始 -->
<div class="container-fluid bg-body">
  <div class="row">
    <div class="col-sm-4 bg-info rounded">
      <h4 class="font-weight-bold py-3">相關食譜</h4>
        <div class="container">
          <div class="row">
            <div class="col mx-auto py-4 pl-5">  
              <div class="card rounded" style="width: 15rem;">
                <img class="card-img-top" src="index_img/chiahan.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">炒飯</h5>
                  <p class="card-text">炒飯的做法</p>
                  <a href="#" class="btn btn-primary">查看食譜</a>
                </div>
              </div>
            </div>
            <div class="col mx-auto py-4 pl-5">  
              <div class="card rounded" style="width: 15rem;">
                <img class="card-img-top" src="index_img/chiahan.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">炒飯</h5>
                  <p class="card-text">炒飯的做法之類的東西</p>
                  <a href="#" class="btn btn-primary">查看食譜</a>
                </div>
              </div>
            </div>
            <div class="col mx-auto py-4 pl-5">  
              <div class="card rounded" style="width: 15rem;">
                <img class="card-img-top" src="index_img/chiahan.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">炒飯</h5>
                  <p class="card-text">炒飯的做法之類的簡介介紹</p>
                  <a href="#" class="btn btn-primary">查看食譜</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-sm-8 order-first rounded imgsize">
      <h4><small>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('recipe.index')}}">首頁</a></li>
            <li class="breadcrumb-item"><a href="#">中式料理</a></li>
            <li class="breadcrumb-item"><a href="#">米</a></li>
            <li class="breadcrumb-item active" aria-current="page">炒飯</li>
          </ol>
        </nav>
      </small></h4>
      <hr>
      <div class="row">
        <div class="col-sm">
          <h2>{{ $recipecases->recipeName }}</h2>
          <h5><small class="bg-light rounded"> 上傳日期 {{ $recipecases->created_at }} </small></h5>
          <h5><span></span></h5><br>
        </div>
        <div class="col-sm imgsize2">
          <img src="index_img/chiahan.jpg" class="d-inline-block rounded" alt="">
        </div>
      </div>
      <div class="row">
        <div class="col-sm py-2">
          <p>食材</p>
          <p>{{ $recipecases->ingredients }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm py-2">
          <p>步驟</p>
          <p>{{ $recipecases->step }}</p>
        </div>
      </div>
      <hr>

      <h4>留言感想</h4>
      <form>
        <div class="form-group">
          <textarea class="form-control" rows="3" placeholder="請輸入留言..." required name = "context"></textarea>
        </div>
        <button type="submit" class="btn btn-success">確認</button>
      </form>
      <br><br>
      
      <p class="font-weight-bold"><span class="badge badge-secondary">2</span> 則回應:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="index_img/lunch.png" class="rounded-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>留言者姓名 <small>2021/12/28</small></h4>
          <p>好吃之類的</p>
          <form class="py-3">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="回覆留言...">
              <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit">確認</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-sm-2 text-center">
          <img src="index_img/lunch.png" class="rounded-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>留言者姓名 <small>2021/12/28</small></h4>
          <p class="">好吃之類的</p>
          <form class="py-3">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="回覆留言...">
              <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit">確認</button>
              </div>
            </div>
          </form>
          <p class="font-weight-bold"><span class="badge badge-secondary">1</span> 則回應:</p><br>
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="index_img/chiahan.jpg" class="rounded-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-sm-10">
              <h4>回覆者姓名<small> 2021/12/28</small></h4>
              <p>Me too! WOW!</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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

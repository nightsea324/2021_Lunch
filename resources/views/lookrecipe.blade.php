@extends('layouts.top')
<!DOCTYPE html>
<html lang="zh-TW">
<head>
  @section('title','查看食譜')
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
@yield('head')
@section('mid')
<!-- 內文開始 -->
<div class="container-fluid bg-body">
  <div class="row">
    <div class="col-sm-4 bg-info rounded">
      <h4 class="font-weight-bold py-3">其他食譜</h4>
			<div class="container">
				<div class="row">
					@foreach($otherrecipecases as $case)
						<div class="col mx-auto py-4">	
							<div class="card rounded" style="width: 19rem;">
								<img class="card-img-top" src="/index_img/chiahan.jpg" alt="Card image cap">
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
    </div>

    <div class="col-sm-8 order-first rounded imgsize">
      <h4><small>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('recipe.index')}}"></a>首頁</li>
          </ol>
        </nav>
      </small></h4>
      <hr>
      <div class="row">
        <div class="col-sm">
          <h2>{{ $recipecases->recipeName }}</h2>
          <h5><small class="bg-light rounded"> 上傳日期 ： {{ $recipecases->created_at }} </small></h5>
          <h5><small class="bg-light rounded"> 上傳者 ： {{ $recipecases->memberName }} </small></h5>
          <h5><span></span></h5><br>
        </div>
        <div class="col-sm imgsize2">
          <img src="/index_img/chiahan.jpg" class="d-inline-block rounded" alt="">
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
      @if(isset($username))
      <form method="post" action="{{ route('board.store') }}">
      @csrf
        <div class="form-group">
          <textarea class="form-control" rows="3" placeholder="請輸入留言..." required name = "content"></textarea>
        </div>
        <input type="hidden" name="recipeId" value="{{$recipeId}}">
        <input type="hidden" name="memberName" value={{$username}} >
        <button type="submit" class="btn btn-success">確認</button>
      </form>
      @else
      <div class="form-group">
      </div>
      <a class="nav-link" href="/login"><button type="button" class="btn btn-success">請先登入</button></a>
      @endif

      <br><br>
      
      <p class="font-weight-bold"><span class="badge badge-secondary">{{count($boardcases)}}</span> 則回應:</p><br>
      <div class="row">
      @foreach($boardcases as $case)
        <div class="col-sm-2 text-center">
          <img src="/index_img/lunch.png" class="rounded-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>留言者 {{$case->memberName}} <small>{{$case->created_at}}</small></h4>
          <p>{{$case->content}}</p>          
        </div>
      @endforeach
      </div>
    </div>
  </div>
</div>
<!-- 內文結束 -->
@endsection
@yield('foot')
</body>
</html>

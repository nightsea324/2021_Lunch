@extends('layouts.top')
<!DOCTYPE html>
<html lang="zh-TW">
<head>
  @section('title','新增食譜')
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
		@import url(S1.css);
	</style>
	
  </style>
</head>
<body>
@section('head')

@section('mid')
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
@endsection
@section('foot')

</body>
</html>

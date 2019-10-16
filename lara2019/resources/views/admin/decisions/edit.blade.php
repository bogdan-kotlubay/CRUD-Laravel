@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Редактировать решение</h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['decisions.update', $decision->id],
		'files'	=>	true,
		'method'	=>	'put'
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем решение</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$decision->title}}" name="title">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="short_desc" id="" cols="30" rows="10" class="form-control" >{{$decision->short_desc}}</textarea>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$decision->description}}</textarea>
          </div>
            <div class="form-group">
                <img src="{{$decision->getImage()}}" alt="" class="img-responsive" width="200">
                <label for="exampleInputFile">Лицевая картинка</label>
                <input type="file" id="exampleInputFile" name="short_image">
            </div>
              <div class="form-group">
                  @if($decision->image !== null)
                      <img src="{{$decision->getBigImage()}}" alt="" class="img-responsive" width="200">
                      <label>{{$decision->image}}}</label/>{{Form::open(['route'=>['deleteImage', $decision->id], 'method'=>'post'])}}
                  <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                      <i class="fa fa-remove"></i>
                  </button>

                  {{Form::close()}}
                  @else
                  <label for="exampleInputFile">Главная картинка</label>
                  <input type="file" id="exampleInputFile" name="image">
                  @endif
              </div>
              <div class="form-group">
                  <label>Продукты</label>
                  {{Form::select('products[]',
                      $products,
                      $selectedProducts,
                      ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите продукты'])
                  }}
              </div>
          </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	{{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

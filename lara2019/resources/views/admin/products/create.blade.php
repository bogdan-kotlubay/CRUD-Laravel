@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Создать продукт</h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=> 'products.store',
		'files'	=>	true
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем продукт</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Заголовок</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
            </div>

          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Краткое описание</label>
              <textarea name="short_desc" id="" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
          </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полное описание</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control" ></textarea>
          </div>
        </div>
            <div class="form-group">
                <label for="exampleInputFile">Лицевая картинка</label>
                <input type="file" id="exampleInputFile" name="image">
            </div>
            <div class="form-group">
                <label>Категория</label>
                {{Form::select('cat_id',
                    $categories,
                    null,
                    ['class' => 'form-control select2'])
                }}
            </div>
            <div class="form-group">
                <label>Теги</label>
                {{Form::select('tags[]',
                    $tags,
                    null,
                    ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])
                }}
            </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Сохранить</button>
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

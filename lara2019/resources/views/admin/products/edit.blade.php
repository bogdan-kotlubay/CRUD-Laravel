@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Редактировать продукт</h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['products.update', $product->id],
		'files'	=>	true,
		'method'	=>	'put'
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем продукт</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$product->title}}" name="title">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="short_desc" id="" cols="30" rows="10" class="form-control" >{{$product->short_desc}}</textarea>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
          </div>
            <div class="form-group">
                <img src="{{$product->getImage()}}" alt="" class="img-responsive" width="200">
                <label for="exampleInputFile">Лицевая картинка</label>
                <input type="file" id="exampleInputFile" name="image">
            </div>

            <div class="form-group">
                <label>Категория</label>
                {{Form::select('cat_id',
                    $categories,
                    $product->getCategoryID(),
                    ['class' => 'form-control select2'])
                }}
            </div>

        <div class="form-group">
            <label>Теги</label>
            {{Form::select('tags[]',
                $tags,
                $selectedTags,
                ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])
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

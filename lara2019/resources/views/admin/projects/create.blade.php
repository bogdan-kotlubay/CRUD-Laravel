@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Создать проект</h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=> 'projects.store',
		'files'	=>	true
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем проект</h3>
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
            <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputFile">Лицевая картинка</label>
                <input type="file" id="exampleInputFile" name="short_image">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Главная картинка</label>
                <input type="file" id="exampleInputFile" name="image">
                <div class="form-group">
                    <label for="exampleInputEmail1">Заголовок для клиента</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="client_title" value="{{old('client_title')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Изображение клиента</label>
                <input type="file" id="exampleInputFile" name="client_image">
            </div>
            <div class="form-group">
                <label>Продукты</label>
                {{Form::select('products[]',
                    $products,
                    null,
                    ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите продукты'])
                }}
            </div>
                {{Form::close()}}
                {{Form::open([
                'route'	=> 'projects.addImageForGallery',
                'files'	=>	true
            ])}}
                    <div class="form-group">
                        <label for="exampleInputFile">Альбом проекта</label>
                    <div class="row">

                        <div class="col-md-5">
                            <strong>Название</strong>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="col-md-5">
                            <strong>Изображение</strong>
                            <input type="file" name="gallery_image" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <br/>
                            <button type="submit" class="btn btn-success">Загрузить</button>
                        </div>
                    </div>
                   {{Form::close()}}
                    </div>
                <div class="row">
                    <div class='list-group gallery'>
                @if(isset($galleryimages))
                    @foreach($galleryimages as $galleryimage)
                        <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                            <a class="thumbnail fancybox" rel="ligthbox" href="/images/galleryprojects/{{ $galleryimage->gallery_image }}">
                                <img class="img-responsive" alt="" src="/images/galleryprojects/{{ $galleryimage->gallery_image }}" />
                                <div class='text-center'>
                                    <small class='text-muted'>{{ $galleryimage->title }}</small>
                                </div> <!-- text-center / end -->
                            </a>
                            <form action="{{ url('admin/projects/create/deleteImageGallery',$galleryimage->id) }}" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                {!! csrf_field() !!}
                                <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                            </form>
                        </div> <!-- col-6 / end -->
                    @endforeach
                @endif


                    </div> <!-- list-group / end -->
                </div> <!-- row / end -->
            </div> <!-- container / end -->
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Сохранить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Редактировать проект</h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['projects.update', $projects->id],
		'files'	=>	true,
		'method'	=>	'put'
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем проект</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$projects->title}}" name="title">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="short_desc" id="" cols="30" rows="10" class="form-control" >{{$projects->short_desc}}</textarea>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$projects->description}}</textarea>
          </div>
            <div class="form-group">
                <img src="{{$projects->getImage()}}" alt="" class="img-responsive" width="200">
                <label for="exampleInputFile">Лицевая картинка</label>
                <input type="file" id="exampleInputFile" name="short_image">
            </div>
              <div class="form-group">
                  @if($projects->image !== null)
                      <img src="{{$projects->getImage()}}" alt="" class="img-responsive" width="200">
                      <label>{{$projects->image}}}</label/><form action="{{ url('admin/projects/edit/deleteImage',$projects->id) }}" method="POST">
                          <input type="hidden" name="_method" value="delete">
                          {!! csrf_field() !!}
                          <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                      </form>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

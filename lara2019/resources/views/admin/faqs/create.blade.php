@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить faq информацию
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      {{Form::open([
        'route'	=> 'faqs.store',
        'files'	=>	true
        ])}}
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем faq</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Описание</label>
                      <textarea name="text" id="" cols="30" rows="10" class="form-control" ></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">Загрузить документ</label>
                  <input type="file" id="exampleInputFile" name="file">
              </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
        {!! Form::close() !!}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

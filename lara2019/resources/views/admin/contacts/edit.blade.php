@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Редактировать контакт
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    {{Form::open([
        'route'	=>	['contacts.update', $contacts->id],
        'files'	=>	true,
        'method'	=>	'put'
    ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Меняем контакт</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{$contacts->title}}">
            </div>
          </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Описание</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$contacts->description}}</textarea>
            </div>
        </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Телефонный номер</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phonenumber" placeholder="" value="{{$contacts->phonenumber}}">
                </div>
            </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Сохранить</button>
        </div>
        <!-- /.box-footer-->
        {{Form::close()}}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

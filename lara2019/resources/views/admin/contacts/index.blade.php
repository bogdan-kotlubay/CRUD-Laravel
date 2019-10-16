@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Контакты
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li class="active">Контакт лист</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('contacts.create')}}" class="btn btn-success">Добавить контакт</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Заголовок</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
					<tr>
	                  <td>{{$contact->id}}</td>
	                  <td>{{$contact->title}}</td>
	                  <td><a href="{{route('contacts.edit', $contact->id)}}" class="fa fa-pencil"></a>

	                  {{Form::open(['route'=>['contacts.destroy', $contact->id], 'method'=>'delete'])}}
	                  <button onclick="return confirm('are you sure?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                  </button>

	                   {{Form::close()}}

	                   </td>
	                </tr>
                @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

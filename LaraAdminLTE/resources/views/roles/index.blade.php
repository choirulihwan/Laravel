@extends('adminlte::page')

@section('title', 'Roles Management')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('role.role') }}</h1>
@stop

@section('js')
<script> 
  $(document).ready( function () {
    $('#myTable').DataTable({
      language: {
          url: "{{ __('global.url_datatables') }}"
      }
    });

    $('#btnDel').on('click', function() {
      var message = "{{ __('global.confirm_delete') }}";
      return confirm(message);
    });
    
  });
</script>
@stop


@section('content')
<div class="container-fluid">
        
    @if ($message = Session::get('success'))
      <x-adminlte-alert theme="success" title="Success" dismissable>
        {{ __('global.'.$message) }}
      </x-adminlte-alert>
    @endif
    
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            
              <h3 class="card-title col-md-8">{{ __('global.list') }} {{ __('role.role') }}</h3>
            
            @can('role-create')
              <div class="d-flex col-md-4 justify-content-end">
                <a class="btn btn-success mr-1" href="{{ route('roles.create') }}"><i class="fas fa-fw fa-plus"></i> {{ __('global.create') }}</a>
                <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i> {{ __('global.back') }} </a>
              </div>
            @endcan
          </div>
          
          <div class="card-body">              
          <div class="row">
            <div class="col-sm-12">
            <table id="myTable" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
            <thead>
              <tr class="table-primary">
                <th>No</th>
                <th>{{ __('role.name') }}</th>                
                <th width="280px">{{ __('global.action') }}</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($roles as $key => $role)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $role->name }}</td>
            <td class="text-center">
                @can('role-edit')
                    <a class="btn btn-warning" href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-fw fa-pen"></i> {{ __('global.edit') }}</a>
                @endcan
                @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}                    
                        {{-- {{ Form::button('<i class="fas fa-fw fa-trash"></i> '."{{ __('global.delete') }}", ['type' => 'submit', 'class' => 'btn btn-danger'] ) }} --}}
                        <button type="submit" id="btnDel" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> {{ __('global.delete') }}</button>
                    {!! Form::close() !!}
                @endcan
            </td>
          </tr>
         @endforeach
          </tbody>
          <tfoot></tfoot>
          </table>
          </div>
          
          </div>
          </div>
        </div>
    </div>
</div>
@endsection
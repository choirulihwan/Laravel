@extends('adminlte::page')

@section('title', 'References')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('ref.ref') }}</h1>
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
          <h3 class="card-title col-md-8">{{ __('global.list') }} {{ __('ref.ref') }}</h3>                
          @can('ref-create')
            <div class="d-flex col-md-4 justify-content-end">
              <a class="btn btn-success mr-1" href="{{ route('refs.create') }}"><i class="fas fa-fw fa-plus"></i> {{ __('global.create') }}</a>
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
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">{{ __('ref.group') }}</th>
                    <th class="text-center" scope="col">{{ __('ref.no_ref') }}</th>
                    <th class="text-center" scope="col">{{ __('ref.name') }}</th>
                    <th class="text-center" scope="col">{{ __('ref.label') }}</th>
                    <th class="text-center" scope="col">{{ __('global.action') }}</th>              
                  </tr>
                </thead>
                <tbody>
                  @foreach ($refs as $ref)
                      <tr>
                          <td class="text-right">{{ $loop->iteration }}</td>
                          <td class="text-center">{{ $ref->id_ref }}</td>
                          <td class="text-center">{{ $ref->no_ref }}</td>
                          <td>{{ $ref->keterangan }}</td>
                          <td>{{ $ref->keterangan2 }}</td>
                          <td class="text-center">    
                            @can('ref-edit')                    
                              <a href="{{ route('refs.edit', $ref->id) }}" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i> </a>                              
                            @endcan

                            @can('user-delete')
                              {!! Form::open(['method' => 'DELETE','route' => ['refs.destroy', $ref->id],'style'=>'display:inline']) !!}                                  
                                  {{ Form::button('<i class="fas fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', "id" => "btnDel"] )  }}
                              {!! Form::close() !!}
                            @endcan                              
                          </td>                    
                      </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection


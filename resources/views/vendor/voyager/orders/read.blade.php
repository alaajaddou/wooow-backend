@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager::generic.edit') }}
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan

        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="panel panel-bordered" style="padding-bottom:5px;">
              <div class="panel-heading" style="border-bottom:0;">
                <h3 class="panel-title">Order Details</h3>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-3">
                    <h4>Customer</h4>
                    <label>{{ $user->name }}</label>
                  </div>
                  <div class="col-md-3">
                    <h4>Created At</h4>
                    <label>{{ $order->created_at }}</label>
                  </div>
                  <div class="col-md-3">
                    <h4>Updated At</h4>
                    <label>{{ $order->updated_at }}</label>
                  </div>
                  <div class="col-md-3">
                    <h4>Status: <label class="text
                        @php
                          if ($order['status'] === 0) {
                            echo 'text-danger';
                          } else if ($order['status'] === 4) {
                            echo 'text-success';
                          } else {
                            echo 'text-warning';
                          }
                        @endphp
                      ">{{ $statuses[$order['status']]['name'] }}</label></h4>

                      <form role="form"
                            class="form-edit-add"
                            action="{{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}"
                            method="POST" enctype="multipart/form-data" id="rejectForm">
                        <!-- PUT Method if we are editing -->
                        {{ method_field("PUT") }}
                        {{ Form::token() }}
                        {{ Form::hidden('status', 0) }}
                        {{ Form::hidden('created_by', $order['created_by']) }}
                        {{ Form::hidden('modified_by', $admin->id) }}
                        {{ Form::hidden('address_id', $order['address_id']) }}
                        {{ Form::hidden('created_at', $order['created_at']) }}
                        {{ Form::hidden('updated_at', \Carbon\Carbon::now()) }}
                      {{ Form::close() }}
                      <form role="form"
                            class="form-edit-add"
                            action="{{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}"
                            method="POST" enctype="multipart/form-data" id="statusChangeForm">
                        <!-- PUT Method if we are editing -->
                        {{ method_field("PUT") }}
                        {{ Form::token() }}
                        {{ Form::hidden('status', ($order['status'] + 1)) }}
                        {{ Form::hidden('created_by', $order['created_by']) }}
                        {{ Form::hidden('modified_by', $admin->id) }}
                        {{ Form::hidden('address_id', $order['address_id']) }}
                        {{ Form::hidden('created_at', $order['created_at']) }}
                        {{ Form::hidden('updated_at', \Carbon\Carbon::now()) }}
                      {{ Form::close() }}
                      @if ($order['status'] != 0 && $order['status'] != 4)
                          <div class="btn-toolbar" role="group">
                            <button role="submit" class="btn btn-danger mr-2" form="rejectForm"><i class="voyager-x"></i> reject </button>
                            @foreach ($statuses as $status)
                              @if($loop->index === ($order['status'] + 1) && ($order['status'] != 0 || $order['status'] != 4))
                                  <button role="submit" class="btn btn-primary" form="statusChangeForm"><i class="voyager-check"></i> {{ $status['name'] }}</button>
                              @endif
                          @endforeach
                        </div>
                      @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
              <div class="panel panel-bordered" style="padding-bottom:5px;">
                <div class="panel-heading" style="border-bottom:0;">
                    <h3 class="panel-title">Items</h3>
                </div>
                <table class="table table-responsive">
                  <thead>
                      <tr>
                          <th style="width: 10%;">Id</th>
                          <th style="width: 10%;">Image</th>
                          <th style="width: 50%;">Name</th>
                          <th style="width: 10%;">Quantity</th>
                          <th style="width: 10%;">Price</th>
                          <th style="width: 10%;">Total</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($items as $item)
                      <tr>
                          <td style="vertical-align: middle;">{{ $item->id  }}</td>
                          <td style="vertical-align: middle;"><img src="{{ Voyager::image($item->item->image) }}" style="width:50px; height: auto;" /></td>
                          <td style="vertical-align: middle;">{{ $item->item->name  }}</td>
                          <td style="vertical-align: middle;">{{ $item->quantity  }}</td>
                          <td style="vertical-align: middle;">₪{{ $item->price  }}</td>
                          <td style="vertical-align: middle;">₪{{ $item->total  }}</td>
                      </tr>
                  </tbody>
                  @endforeach
              </table>
            </div>
          </div>

          <div class="col-6">
            <div class="panel panel-bordered" style="padding-bottom:5px;">
              <div class="panel-heading" style="border-bottom:0;">
                  <h3 class="panel-title">Address</h3>
              </div>
              <table class="table table-responsive">
                  <tr>
                      <th style="width: 30%;">City</th><td>{{ $address->city }}</td>
                  </tr>
                  <tr>
                      <th>Village</th><td>{{ $address->village }}</td>
                  </tr>
                  <tr>
                      <th>Address</th><td>{{ $address->address }}</td>
                  </tr>
                  <tr>
                      <th>Building</th><td>{{ $address->building }}</td>
                  </tr>
                  <tr>
                      <th>Mobile</th><td>{{ $address->mobile }}</td>
                  </tr>
                  <tr>
                      <th>Phone</th><td>{{ $address->phone }}</td>
                  </tr>
              </table>
            </div>
        </div>
    </div>
  </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop

@extends('components.layouts.app')

@section('content')
    <h1><a href="{{ route('orders.index') }}">@lang('order.order.title')</a></h1>
    <p class="lead">@lang('order.order.sub_title')</p>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('orders.search') }}" method="GET" name="search">
                <div class="form-row">
                    <div class="col-md-8">
                        <input type="text" name="keyword" class="form-control" placeholder="@lang('order.form.keyword')" value="@if(isset($searchKeyword)){{$searchKeyword}}@endif">
                    </div>
                    <div class="col-md-3">
                        <select name="field" class="custom-select mr-sm-2">
                            <option value="all">@lang('order.form.all')</option>
                            <option
                                value="client"
                                @if((isset($searchKeyword)) && ($searchField == 'client')) selected @endif
                            >@lang('order.form.client')</option>
                            <option
                                value="product"
                                @if((isset($searchKeyword)) && ($searchField == 'product')) selected @endif
                            >@lang('order.form.product')</option>
                            <option
                                value="total"
                                @if((isset($searchKeyword)) && ($searchField == 'total')) selected @endif
                            >@lang('order.form.total')</option>
                            <option
                                value="date"
                                @if((isset($searchKeyword)) && ($searchField == 'date')) selected @endif
                            >@lang('order.form.date')</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary float-right">@lang('general.form.btn.search')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mb-3"></div>
    @if(isset($searchKeyword))
        <p>@lang('general.messages.search.result')</p>
        <a href="{{ route('orders.index') }}">@lang('general.links.labels.home_page')</a>
    @endif
    <div class="mb-5"></div>

    <div class="row">
        <div class="col-md-12">
            <canvas id="chLine"></canvas>
        </div>
    </div>
    <div class="mb-5"></div>

    <div class="row">
        <div class="col-md-12">
            <table id="orders" class="ui celled table" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('order.table.fields.client')</th>
                    <th>@lang('order.table.fields.product')</th>
                    <th>@lang('order.table.fields.total')</th>
                    <th>@lang('order.table.fields.date')</th>
                    <th width="100px">@lang('general.table.fields.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $index => $row)
                    <tr>
                        <td>{{ $row->getClient() }}</td>
                        <td>{{ $row->getProduct() }}</td>
                        <td>{{ $row->getTotal() }}</td>
                        <td>{{ $row->getDate() }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $row->getId()) }}" class="btn btn-primary btn-sm">@lang('general.form.btn.edit')</a>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm order-destroy" data-id="{{ $row->getId() }}">@lang('general.form.btn.delete')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>@lang('order.table.fields.client')</th>
                    <th>@lang('order.table.fields.product')</th>
                    <th>@lang('order.table.fields.total')</th>
                    <th>@lang('order.table.fields.date')</th>
                    <th>@lang('general.table.fields.action')</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@include('components.elements.modals')

@endsection

@section('page.scripts')
    <!-- scripts for dashboard  -->
    <script src="{{ asset('scripts/order.js?v=1') }}"></script>
@endsection

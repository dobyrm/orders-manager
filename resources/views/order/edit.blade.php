@extends('components.layouts.app')

@section('content')
    <h1><a href="{{ route('orders.index') }}">@lang('order.order.title')</a></h1>
    <p class="lead">@lang('order.edit_order.sub_title')</p>
    @if ($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('orders.update', $order->getId() )}}" method="POST" name="edit">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="client">@lang('order.form.client')</label>
                            <select name="client" class="custom-select mr-sm-2" id="client">
                                @foreach ($clients as $row)
                                    <option
                                        value="{{ $row->getId() }}"
                                        @if($row->getId() == $order->getClientId()) selected @endif
                                    >{{ $row->getName() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="product">@lang('order.form.product')</label>
                            <select name="product" class="custom-select mr-sm-2" id="product">
                                @foreach ($products as $row)
                                    <option
                                        value="{{ $row->getId() }}"
                                        @if($row->getId() == $order->getProductId()) selected @endif
                                    >{{ $row->getName() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="total">@lang('order.form.total')</label>
                            <input type="number" name="total" class="form-control" id="total" placeholder="@lang('order.form.total')" value="{{ $order->getTotal() }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">@lang('order.form.date')</label>
                            <input type="text" name="date" class="form-control" id="date" placeholder="@lang('order.form.total')" value="{{ $order->getDate() }}" disabled>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">@lang('general.form.btn.edit')</button>
            </form>
        </div>
    </div>

@include('components.elements.modals')

@endsection

@section('page.scripts')
    <!-- scripts for dashboard  -->
    <script src="{{ asset('scripts/order.js?v=1') }}"></script>
@endsection

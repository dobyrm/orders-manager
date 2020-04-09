<table>
    <thead>
    <tr>
        <th>@lang('order.table.fields.client')</th>
        <th>@lang('order.table.fields.product')</th>
        <th>@lang('order.table.fields.total')</th>
        <th>@lang('order.table.fields.date')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $index => $row)
        <tr>
            <td>{{ $row->getClient() }}</td>
            <td>{{ $row->getProduct() }}</td>
            <td>{{ $row->getTotal() }}</td>
            <td>{{ $row->getDate() }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>@lang('order.table.fields.client')</th>
        <th>@lang('order.table.fields.product')</th>
        <th>@lang('order.table.fields.total')</th>
        <th>@lang('order.table.fields.date')</th>
    </tr>
    </tfoot>
</table>

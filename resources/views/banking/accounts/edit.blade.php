@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.accounts', 1)]))

@section('content')
    <!-- Default box -->
    <div class="box box-success">
        {!! Form::model($account, [
            'method' => 'PATCH',
            'url' => ['banking/accounts', $account->id],
            'role' => 'form'
        ]) !!}

        <div class="box-body">
            {{ Form::textGroup('name', trans('general.name'), 'id-card-o') }}

            {{ Form::textGroup('number', trans('accounts.number'), 'pencil') }}

            {{ Form::selectGroup('currency_code', trans_choice('general.currencies', 1), 'exchange', $currencies) }}

            {{ Form::textGroup('opening_balance', trans('accounts.opening_balance'), 'money') }}

            {{ Form::textGroup('bank_name', trans('accounts.bank_name'), 'university', []) }}

            {{ Form::textGroup('bank_phone', trans('accounts.bank_phone'), 'phone', []) }}

            {{ Form::textareaGroup('bank_address', trans('accounts.bank_address')) }}

            {{ Form::radioGroup('default_account', trans('accounts.default_account')) }}

            {{ Form::radioGroup('enabled', trans('general.enabled')) }}
        </div>
        <!-- /.box-body -->

        @permission('update-banking-accounts')
        <div class="box-footer">
            {{ Form::saveButtons('banking/accounts') }}
        </div>
        <!-- /.box-footer -->
        @endpermission

        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var text_yes = '{{ trans('general.yes') }}';
        var text_no = '{{ trans('general.no') }}';

        $(document).ready(function(){
            $("#currency_code").select2({
                placeholder: "{{ trans('general.form.select.field', ['field' => trans_choice('general.currencies', 1)]) }}"
            });
        });
    </script>
@endpush

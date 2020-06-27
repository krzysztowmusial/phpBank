<style>
    .content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .box {
        width: 280px;
        margin-bottom: 3em;
        padding: 3em 2em 2em 2em;
        position: relative;
        background: #f9f9fb;
        border: 1px solid rgba(0,0,0,.2);
    }

    .box__title {
        font-size: 10px;
        text-transform: uppercase;
        padding: 5px 10px;
        background: white;
        border: 1px solid rgba(0,0,0,.2);
        position: absolute;
        top: -1em;
        left: 28px;
    }

    .box__content {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .account__saldo {
        font-size: 60px;
    }

    .account__number {
        margin: 2em 0;
        width: 100%;
        text-align: center;
        padding: .5em 0;
        background: white;
        border: 1px solid rgba(0,0,0,.2);
        font-family: 'Roboto Mono', monospace;
    }

    .account__buttons {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
    }

    .box__content.contacts {
        display: flex;
        flex-direction: row;
    }

    .contacts__avatar, .contacts__add {
        width: 50px;
        height: 50px;
        background: white;
        border: 1px solid rgba(0,0,0,.2);
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: .5em;
        cursor: pointer;
    }

    .contacts__add {
        margin: 0;
        padding: 0;
        line-height: 30px;
        font-size: 30px;
        color: rgba(0, 0, 0, 0.5);
    }

    .contacts__add:hover {
        color: rgba(0, 0, 0, 0.5);
        text-decoration: none;
    }

    .box__content.transactions {
        /* display: flex; */
    }

    .transactions__item {
        width: 100%;
        margin-bottom: 1em;
        display: flex;
        justify-content: space-between;
    }

    .transactions__group {
        display: flex;
        align-items: center;
    }

    .transactions__plus, .transactions__minus {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

    .transactions__plus {
        background: mediumseagreen;
    }

    .transactions__minus {
        background: tomato;
    }

    .transactions__amount {
        margin-left: .5em;
    }

</style>

@extends('layouts.app')

{{-- CONTENT --}}
@section('content')

<div class="content">
    <div class="box">
        <div class="box__title">Account</div>
        <div class="box__content account">
            <div class="account__saldo">${{ $user->saldo }}</div>
            <div class="account__number">{{ number_format(  $user->account, 0, '.', ' ') }}</div>
            <div class="account__buttons">
                <a href="{{ route('transactions_add') }}"><button>Add Money</button></a>
                <a href="{{ route('transactions') }}"><button>Send Money</button></a>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box__title">Contacts</div>
        <div class="box__content contacts">
            @foreach ($contacts as $contact)
                <a href="{{ route('contacts') }}" class="contacts__avatar" style="background: url({{ $contact[0]->photo }}); background-position: center center; background-size: contain;"></a>
            @endforeach
            <a class="contacts__add" href="{{ route('contacts') }}">+</a>
        </div>
    </div>
    <div class="box">
        <div class="box__title">Transactions</div>
        <div class="box__content transactions">

            @foreach ($transactions as $transaction)
            <?php
            $from = DB::table('users')->where('id', $transaction->from)->value('name');
            $to = DB::table('users')->where('id', $transaction->to)->value('name');
            ?>
            <div class="transactions__item">

                @if ($transaction->from == $user->id && $transaction->to == $user->id)
                    <div class="transactions__group">
                        <div class="transactions__plus">+</div>
                        <div class="transactions__amount">${{ $transaction->amount }}</div>
                    </div>
                    <div>Doładowanie konta</div>
                @else
                    <div class="transactions__group">
                        @if ($transaction->from == $user->id)
                            <div class="transactions__minus">-</div>
                        @else
                            <div class="transactions__plus">+</div>
                        @endif
                        <div class="transactions__amount">${{ $transaction->amount }}</div>
                    </div>
                    <div class="transactions__from">{{ $from }}</div>
                    <div>-></div>
                    <div class="transactions__to">{{ $to }}</div>
                @endif

            </div>
            @endforeach
            
        </div>
    </div>
    {{-- <div class="box">
        <div class="box__title">Stocks</div>
        <div class="box__content">

        </div>
    </div> --}}
</div>

@endsection

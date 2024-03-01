@extends('layouts.app')

@section('content')
    <div class="container">
   

    <div class="row">
<div class="col-md-6" style="margin-top:-10px;">
    <!-- <h3 style="margin-top:20px;text-align:left;">Add Raw Material to Inventory</h3> -->
    <a href="{{ route('newrecord', ['wallet' => $wallet->id]) }}" class="btn btn-primary">New Transaction</a> 
       <!-- total amount -->
        @php $isBalanceDisplayed = false; @endphp
</div>
    <div class="col-md-6">
                <div id="totalBox" style="float:right;">
                @foreach ($records as $record)
    @if (!$isBalanceDisplayed)
        <p><b>Total Money :<b> {{ $record->currency->pfx_symbol }} {{ $record->balance->value }}</p>
        @php $isBalanceDisplayed = true; @endphp
    @endif
@endforeach
                </div>
            </div>
</div>



        <!-- <a href="{{ route('newrecord', ['wallet' => $wallet->id]) }}" class="btn btn-primary">New Transaction</a> 
       
        @php $isBalanceDisplayed = false; @endphp

@foreach ($records as $record)
    @if (!$isBalanceDisplayed)
        <p>Total Money : {{ $record->currency->pfx_symbol }} {{ $record->balance->value }}</p>
        @php $isBalanceDisplayed = true; @endphp
    @endif
@endforeach -->
       <!-- total amount end -->

@foreach ($records as $record)
            <div class="px-3 py-2 my-2 d-flex justify-content-between align-items-center text-white"
                style="background: @if ($record->type == 'Expense') #ff6666 @elseif($record->type == 'Income') #00b400 @else #0016a7 @endif;
                  border-radius: 10px">
                <span>
    @if ($record->currency)
    {{$record->type}} -   {{ $record->currency->pfx_symbol }} {{ $record->amount }} &nbsp;&nbsp; Transactor : {{ $record->description }} &nbsp;&nbsp; Date : {{ date('Y-m-d', strtotime($record->date)) }}

    @else
        Currency Not Available
    @endif
</span>
<div>
                    <a href="{{ route('editRecord', ['wallet' => $wallet->id, 'record' => $record->id]) }}"
                        class="btn me-2 btn-warning">View</a>

                   


                    <form action="{{ route('deleteRecord', ['wallet' => $wallet->id, 'record' => $record->id]) }}"
                        style="display: inline;" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

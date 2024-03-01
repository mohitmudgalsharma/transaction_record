@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-danger">
            @if(\Illuminate\Support\Facades\Session::has('message'))
                {{session('message')}}
            @endif
        </div>
        
        <form action="{{ route('updateRecord', ['wallet' => $wallet->id, 'record' => $record->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>
                <div class="col-md-6">
                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                           name="amount" value="{{ $record->amount }}" required autocomplete="amount">
                    @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Name of  Payee/Payer') }}</label>
                <div class="col-md-6">
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ $record->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Comment') }}</label>
                <div class="col-md-6">
                    <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment">{{ $record->comment }}</textarea>
                    @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>



            <div class="row mb-3">
                <label for="balance" class="col-md-4 col-form-label text-md-end">{{ __('Currency') }}</label>
                <div class="col-md-6">
                    <select name="balance" id="balance" class="form-control">
                        @foreach($balances as $balance)
                            <option value="{{ $balance->id }}" {{ $balance->id == $record->balance_id ? 'selected' : '' }}>
                                @if ($balance->currency)
                                    {{ $balance->currency->symbol_name ?? 'N/A' }}
                                @else
                                    N/A
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                <div class="col-md-6">
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ $category->id == $record->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                            @foreach($category->subcategories as $subcategory)
                                <option value="{{$subcategory->id}}" {{ $subcategory->id == $record->subcategory_id ? 'selected' : '' }}>&nbsp;&nbsp;{{$subcategory->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>

            {{--<div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                    {{ __('Update Record') }}
                    </button>
                </div>
            </div>--}}
        </form>
    </div>

@endsection

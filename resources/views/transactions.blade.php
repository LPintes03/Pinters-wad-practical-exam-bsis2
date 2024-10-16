<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>

<body>
    <h1>Transactions</h1>

    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('createTransaction') }}" method="GET">
        <button type="submit">Create Transaction</button>
    </form>

    @if(count($transactions) > 0)
    @foreach($transactions as $transaction)
    <div class="transaction">
        <h2>Transaction Title: {{ $transaction->transaction_title }}</h2>
        <p>Description: {{ $transaction->description }}</p>
        <p>Status: {{ $transaction->status }}</p>
        <p>Total Amount: {{ $transaction->total_amount }}</p>
        <p>Transaction Number: {{ $transaction->transaction_number }}</p>
        <p>Timestamps: {{ $transaction->updated_at }}</p>
        <form action="{{ route('viewTransaction', ['id' =>$transaction->id]) }}" method="GET">
            <button type="submit">View</button>
        </form>
        <form action="{{ route('editTransaction', ['id' =>$transaction->id]) }}" method="GET">
            <button type="submit">Edit</button>
        </form>
        <form action="{{ route('deleteTransaction', ['id' =>$transaction->id]) }}" method="POST"
            onsubmit="return confirm('Are you sure?')">
            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>
    </div>
    <hr>
    @endforeach
    @else
    <p>No transactions found.</p>
    @endif
</body>

</html>
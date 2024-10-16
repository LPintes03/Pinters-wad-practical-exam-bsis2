Verify

Open In Editor
Edit
Copy code
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>

<body>
    <h1>Transactions</h1>

    <!-- Back button -->
    <form action="{{ route('showAllTransactions') }}" method="GET">
        <button type="submit">Back</button>
    </form>

    <!-- Transaction details -->
    <div class="transaction-details">
        <p><strong>Transaction Title:</strong> {{ $transaction->transaction_title }}</p>
        <p><strong>Description:</strong> {{ $transaction->description }}</p>
        <p><strong>Status:</strong> {{ $transaction->status }}</p>
        <p><strong>Total Amount:</strong> {{ $transaction->total_amount }}</p>
        <p><strong>Transaction Number:</strong> {{ $transaction->transaction_number }}</p>
        <p><strong>Timestamps:</strong> {{ $transaction->updated_at }}</p>
    </div>

    <hr>

    <!-- Edit and Delete buttons -->
    <div class="actions">
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

</body>

</html>
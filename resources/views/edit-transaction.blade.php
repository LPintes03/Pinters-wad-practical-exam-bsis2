<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
</head>

<body>
    <h1>Edit Transaction</h1>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        <button type="submit">Back</button>
    </form>

    <form action="{{ route('updateTransaction', ['id' => $transaction->id]) }}" method="POST">
        @method('PUT')
        @csrf

        <div>
            <label for="transaction_title">Transaction Title:</label>
            <input type="text" id="transaction_title" name="transaction_title" value="{{ $transaction->transaction_title }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{ $transaction->description }}" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="successful" {{ $transaction->status == 'successful' ? 'selected' : '' }}>Successful</option>
                <option value="declined" {{ $transaction->status == 'declined' ? 'selected' : '' }}>Declined</option>
            </select>
        </div>

        <div>
            <label for="total_amount">Total Amount:</label>
            <input type="number" id="total_amount" name="total_amount" value="{{ $transaction->total_amount }}" required>
        </div>

        <div>
            <label for="transaction_number">Transaction Number:</label>
            <input type="number" id="transaction_number" name="transaction_number" value="{{ $transaction->transaction_number }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
</body>

</html>
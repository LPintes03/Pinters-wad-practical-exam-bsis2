<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
</head>

<body>
    <h1>Create Transaction</h1>

    <form action="{{ route('storeTransaction') }}" method="POST" id="transactionForm">
        @csrf
        @method('POST')

        <div>
            <label for="transaction_title">Transaction Title:</label>
            <input type="text" id="transaction_title" name="transaction_title" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="" disabled selected>Select status</option>
                <option value="successful">Successful</option>
                <option value="declined">Declined</option>
            </select>
        </div>

        <div>
            <label for="total_amount">Total Amount:</label>
            <input type="number" id="total_amount" name="total_amount" required step="0.01" min="0">
        </div>

        <div>
            <label for="transaction_number">Transaction Number:</label>
            <input type="text" id="transaction_number" name="transaction_number">
        </div>

        <button type="submit">Submit</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        <button type="submit">Back</button>
    </form>

   
</body>

</html>

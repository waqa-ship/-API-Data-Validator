
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Dynamic Form</h1>
        <form action="#" method="POST">
            @csrf

            <!-- Heading: Closing -->
            <h2>Closing</h2>

            <!-- Make Fund Checkbox -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="makeFund" name="makeFund">
                <label class="form-check-label" for="makeFund">Make fund</label>
            </div>

            <!-- Paperwork Section -->
            <h3>All Paperwork</h3>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="sell" name="paperwork[]" value="sell">
                <label class="form-check-label" for="sell">Sell</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="buyer" name="paperwork[]" value="buyer">
                <label class="form-check-label" for="buyer">Buyer</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="lender" name="paperwork[]" value="lender">
                <label class="form-check-label" for="lender">Lender</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="collectCheck" name="paperwork[]"
                    value="collectCheck">
                <label class="form-check-label" for="collectCheck">Collect check</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="closingDocument" name="paperwork[]"
                    value="closingDocument">
                <label class="form-check-label" for="closingDocument">Get closing document</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="forwardManager" name="paperwork[]"
                    value="forwardManager">
                <label class="form-check-label" for="forwardManager">Forward to manager</label>
            </div>

            <!-- Officially Close Section -->
            <h3>Officially Close</h3>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="getPaid" name="officiallyClose[]" value="getPaid">
                <label class="form-check-label" for="getPaid">Get paid</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="pickupLockBox" name="officiallyClose[]"
                    value="pickupLockBox">
                <label class="form-check-label" for="pickupLockBox">Pickup lock box</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="removeSign" name="officiallyClose[]"
                    value="removeSign">
                <label class="form-check-label" for="removeSign">Remove sign</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="markPropertySold" name="officiallyClose[]"
                    value="markPropertySold">
                <label class="form-check-label" for="markPropertySold">Mark property sold on all listings</label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

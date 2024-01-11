<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF Information</title>
</head>
<body>
    <!-- PDF content goes here -->
    <p>Name: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Amount: ${{ $data['amount'] }}</p>
    <p>Country: {{ $data['country'] }}</p>

    <p>Thank you for your donation!</p>
    Thanks,<br>
    {{ $setting['site_title'] ?? env('APP_NAME') }}<br>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Reward Details</title>
    <style>
        .container {
            max-width: 600px;
            margin: 30px auto;
            font-family: Arial, sans-serif;
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        h1 {
            margin-bottom: 10px;
        }

        p {
            margin: 8px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #3182ce;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #2c5282;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>{{ $reward->name }}</h1>

            @if($reward->image)
                <img src="{{ asset('storage/' . $reward->image) }}" alt="{{ $reward->name }}">
            @endif

            <p><strong>Description:</strong> {{ $reward->description ?? 'N/A' }}</p>
            <p><strong>Price:</strong> ${{ number_format($reward->price, 2) }}</p>

            <a href="{{ route('rewards.index') }}">← Back to Rewards</a>
        </div>
    </div>
</body>
</html>
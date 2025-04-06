<!DOCTYPE html>
<html>
<head>
    <title>{{ $reward->name }}</title>
    <style>
        .reward-details {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .reward-image {
            max-width: 300px;
            margin: 0 auto;
            display: block;
            margin-bottom: 20px;
        }

        .reward-info {
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .actions a,
        .actions form {
            display: inline;
        }

        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        .icon-btn.edit {
            color: #4299e1;
            text-decoration: none;
        }

        .icon-btn.delete {
            color: #e53e3e;
        }

        .icon-btn.delete:hover {
            color: #c53030;
        }

        .go-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            text-decoration: none;
            color: #3182ce;
        }

        .go-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="reward-details">
        <h1>{{ $reward->name }}</h1>

        <img src="{{ asset('storage/' . $reward->image) }}" alt="{{ $reward->name }}" class="reward-image">
        
        <div class="reward-info">
            <strong>Description:</strong> <p>{{ $reward->description }}</p>
        </div>
        
        <div class="reward-info">
            <strong>Price:</strong> ${{ number_format($reward->price, 2) }}
        </div>

        <div class="actions">
            <a href="{{ route('rewards.edit', $reward->id) }}" class="icon-btn edit" title="Edit">
                ✏️ Edit
            </a>
            <form action="{{ route('rewards.destroy', $reward->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reward?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="icon-btn delete" title="Delete">
                    🗑️ Delete
                </button>
            </form>
        </div>

        <a href="{{ route('rewards.index') }}" class="go-back">← Back to Rewards List</a>
    </div>
</body>
</html>

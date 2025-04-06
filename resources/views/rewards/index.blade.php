<!DOCTYPE html>
<html>
<head>
    <title>Rewards List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        img {
            max-width: 100px;
            height: auto;
            display: block;
            max-height: 120px; /* limit max height for image */
        }

        .create-btn {
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #38a169;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .create-btn:hover {
            background-color: #2f855a;
        }

        a.reward-link {
            color: #3182ce;
            text-decoration: none;
            font-weight: bold;
        }

        a.reward-link:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
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
        }

        .icon-btn.delete {
            color: #e53e3e;
        }

        .icon-btn.delete:hover {
            color: #c53030;
        }
    </style>
</head>
<body>
    <h1>Rewards List</h1>

    <a href="{{ route('rewards.create') }}" class="create-btn">+ Create New Reward</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($rewards->count())
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rewards as $reward)
                    <tr>
                        <td>
                            <a href="{{ route('rewards.show', $reward->id) }}" class="reward-link">
                                {{ $reward->name }}
                            </a>
                        </td>
                        <td>{{ $reward->description }}</td>
                        <td>${{ number_format($reward->price, 2) }}</td>
                        <td>
                            @if($reward->image)
                                <img src="{{ asset('storage/' . $reward->image) }}" alt="{{ $reward->name }}">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('rewards.edit', $reward->id) }}" title="Edit">
                                    ✏️
                                </a>
                                <form action="{{ route('rewards.destroy', $reward->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reward?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="icon-btn delete" title="Delete">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No rewards found.</p>
    @endif
</body>
</html>

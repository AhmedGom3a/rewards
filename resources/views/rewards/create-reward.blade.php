<!DOCTYPE html>
<html>
    <head>
        <title>Create Reward</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f7fafc;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 500px;
                margin: 60px auto;
                background-color: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                margin-bottom: 25px;
                color: #2d3748;
            }

            label {
                display: block;
                margin-top: 15px;
                font-weight: bold;
                color: #4a5568;
            }

            input[type="text"],
            input[type="number"],
            textarea,
            input[type="file"] {
                width: 100%;
                padding: 10px;
                margin-top: 5px;
                border: 1px solid #cbd5e0;
                border-radius: 6px;
                box-sizing: border-box;
            }

            button {
                margin-top: 25px;
                width: 100%;
                background-color: #3182ce;
                color: white;
                padding: 12px;
                border: none;
                border-radius: 6px;
                font-size: 16px;
                cursor: pointer;
            }

            button:hover {
                background-color: #2b6cb0;
            }

            .success {
                color: green;
                margin-bottom: 15px;
                text-align: center;
            }
            
            .errors {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 20px;
                font-size: 16px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .errors ul {
                list-style-type: none;
                padding: 0;
            }

            .errors li {
                margin: 5px 0;
                display: flex;
                align-items: center;
            }

            .errors li::before {
                content: "❌";
                margin-right: 10px;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Create a New Reward</h1>

            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="errors">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rewards.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">

                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>

                <label for="price">Price:</label>
                <input type="text" step="0.01" name="price" id="price" value="{{ old('price') }}">

                <label for="image">Image:</label>
                <input type="file" name="image" id="image">

                <button type="submit">Create Reward</button>
            </form>
        </div>

        <script>
            document.getElementById('price').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9.-]/g, '');
            });
        </script>
    </body>
</html>

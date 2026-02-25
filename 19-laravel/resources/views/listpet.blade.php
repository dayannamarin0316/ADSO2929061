<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All Pets (View)</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-emerald-900 p-12 ">
    <h1 class="text-white p-2 text-2xl text-center mb-8">List All Pets</h1>
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead class="bg-emerald-400">
                <tr class="text-white">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Kind</th>
                    <th>Breed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($pets as $pet )
                <tr>
                    <th>{{ $pet->id }}</th>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->kind }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>
                        
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
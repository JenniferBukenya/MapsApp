<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FARMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <h3>OUR FARMS</h3>

    <div class="container">
        <h1>Farm Table</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>District</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($farms as $farm)
                <tr>
                    <td>{{ $farm->id }}</td>
                    <td>{{ $farm->name }}</td>
                    <td>{{ $farm->district }}</td>
                    <td>{{ $farm->address }}</td>
                    <td>{{ $farm->created_at }}</td>
                    <td>{{ $farm->updated_at }}</td>
                    <td>
                        {{-- <a href="{{ route('farms.hives', ['id' => $farm->id]) }}">View Hives</a> --}}
                        <a href="{{ url('/farms/hive/' . $farm->id) }}"> View Hives</a></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>
</html>
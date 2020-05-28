<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers List</title>
</head>
<body>
    <h1>Flowers list</h1>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>
            @foreach($flowers as $flower)
            <tr>
                <td>{{$flower->name}}</td>
                <td>{{$flower->price}}</td>
            </tr>
            @endforeach
        </table>

        {{$flowers->links()}}
    </div>
</body>
</html>
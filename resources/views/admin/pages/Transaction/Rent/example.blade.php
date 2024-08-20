<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Code</th>
            <th>from_date</th>
            <th>to_date</th>
            <th>Rent Status</th>
            <th>Active Status</th>
        </tr>
        @foreach ($rent as $r )

        <tr>
            <td>{{$r->id}}</td>
            <td>{{$r->member->name}}</td>
            <td>{{$r->code}}</td>
            <td>{{$r->from_date}}</td>
            <td>{{$r->to_date}}</td>
            <td>{{$r->rent_status}}</td>
            <td>{{$r->active_closed}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>

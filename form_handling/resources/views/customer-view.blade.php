@include('layouts.header')
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>state</th>
                    <th>country</th>
                    <th>Address</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        @if ($data->gender == 'M')
                        Male
                        @elseif($data->gender == 'F')
                        Female
                        @else
                        Other
                        @endif
                    </td>
                    <td>{{($data->dob)}}</td>
                    <td>{{$data->state}}</td>
                    <td>{{$data->country}}</td>
                    <td>{{$data->address}}</td>
                    <td>
                        @if($data->status == '1')
                        <a href="">
                            <span class="badge text-bg-success">Active</span>
                        </a>
                        @else
                        <a href="">
                            <span class="badge text-bg-danger">Inactive</span>
                        </a>
                        @endif
                    </td>
                    <td>
                        <a href="{{url('/customer/view/delete')}}/{{$data->customer_id}}" onclick="return confirm('Are you sure?')">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                        <a href="{{url('/customer/view/edit')}}/{{$data->customer_id}}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
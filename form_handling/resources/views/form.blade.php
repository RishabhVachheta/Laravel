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
    <form action="{{$url}}" method="post">
        @csrf
        <div class="container">
            <h1 class="text-center">{{$title}}</h1>
            <!-- 
            <x-input type="text" name="name" label="please enter your name" />
            <x-input type="email" name="email" label="please enter your email" />
            <x-input type="password" name="password" label="password" />
            <x-input type="password" name="password_confirmation" label="confirm password" /> -->

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->name}}" />
                <span class="text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->email}}" />
                <span class="text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                <span class="text-danger">
                    @error('password_confirmation')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Country</label>
                <input type="text" name="country" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->country}}" />
                <span class="text-danger">
                    @error('country')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">State</label>
                <input type="text" name="state" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->state}}" />
                <span class="text-danger">
                    @error('state')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <textarea type="text" name="address" id="" class="form-control" placeholder="" aria-describedby="helpId"> {{$customer->address}}</textarea>
                <span class="text-danger">
                    @error('address')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="M" {{$customer->gender == "M" ? "checked" : ""}} />
                    <label class="form-check-label" for="">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="F" {{$customer->gender == "F" ? "checked" : ""}} />
                    <label class="form-check-label" for="">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="O" {{$customer->gender == "O" ? "checked" : ""}} />
                    <label class="form-check-label" for="">Other</label>
                </div>
                <span class="text-danger">
                    @error('gender')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label class="form-label">Date:</label>
                <input type="date" id="" name="dob" class="form-control" value="{{$customer->dob}}">
                <span class="text-danger">
                    @error('dob')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <button class="btn btn-primary">submit</button>

        </div>
    </form>
</body>

</html>
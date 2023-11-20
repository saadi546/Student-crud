<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Edit Student</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
     @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" id="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" id="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $student->address }}" id="address" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" id="gender" required>
                <option value="Male" @if($student->gender === 'Male') selected @endif>Male</option>
                <option value="Female" @if($student->gender === 'Female') selected @endif>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="courses">Courses</label>
            <select name="courses[]" class="form-control" id="courses" multiple required>
                @foreach ($courses as $key=>$value )
                <option  value="{{$value->id}}" {{ in_array($value->id, $userCourses) ? 'selected' : '' }}>{{$value->name}}</option>
                @endforeach
               
                
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>

</body>
</html>

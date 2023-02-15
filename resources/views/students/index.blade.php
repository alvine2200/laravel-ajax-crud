@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="success fw-bold">{{ Session::get('success') }}</div>
            @elseif (Session::has('errors'))
                <div class="errors fw-bold align-items-center">{{ Session::get('errors') }}</div>                
            @else
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Students Data</h4>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddStudentModal"
                            class="btn btn-primary float-end">Add Student</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Course</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->course }}</td>
                                        <td>
                                            <a href="" class="btn btn-info">View</a> |
                                            <a href="" class="btn btn-secondary">Edit</a> |
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>  
                                    @empty
                                      <tr>
                                        <td>1</td>
                                        <td>avine</td>
                                        <td>alvinellavu@gmail.com</td>
                                        <td>07123445542</td>
                                        <td>Comp Science</td>
                                        <td>
                                            <a href="" class="btn btn-info">View</a> |
                                            <a href="" class="btn btn-secondary">Edit</a> |
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>  
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </>
    </div>

    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter Full Names..."
                                    class="name form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" Email="email" placeholder="Enter Email..."
                                    class="email form-control">
                            </div>
                            <div class="mb-3">
                                <label for="nphone">Phone</label>
                                <input type="text" Phone="phone" placeholder="Enter Phone Number ..."
                                    class="phone form-control">
                            </div>
                            <div class="mb-3">
                                <label for="course">Course</label>
                                <input type="text" name="course" placeholder="Enter Course..."
                                    class=" course form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_student">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.add_student', function(event) {
                event.preventDefault();

                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'phone': $('.phone').val(),
                    'course': $('.course').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/students",
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)

                    }
                });
            });
        });
    </script>
@endsection

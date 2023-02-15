@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row">
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
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add  Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form class="form-group" action="" method="POST">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter Full Names..." class="form-control">
                            </div>
                             <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" Email="email" placeholder="Enter Email..." class="form-control">
                            </div>
                             <div class="mb-3">
                                <label for="nphone">Phone</label>
                                <input type="text" Phone="phone" placeholder="Enter Phone Number ..." class="form-control">
                            </div>
                             <div class="mb-3">
                                <label for="course">Course</label>
                                <input type="text" name="course" placeholder="Enter Course..." class="form-control">
                            </div>
                             <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    @include('students.addstudent')
    @include('students.editmodal')


    <div class="container">
        <div class="row">
            {{-- @if (Session::has('success'))
                <div class="success fw-bold">{{ Session::get('success') }}</div>
            @elseif (Session::has('errors'))
                <div class="errors fw-bold align-items-center">{{ Session::get('errors') }}</div>
            @else
            @endif --}}
            <div class="col-md-12">
                <div id="success_message"></div>
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
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {

                fetchStudent()

                function fetchStudent() {
                    $.ajax({
                        type: "GET",
                        url: "/fetch/students",
                        dataType: 'json',
                        success: function(response) {
                            // console.log(response.data)
                             $.each(response.data, function (key, item) { 
                                  $('tbody').append('<tr>\
                                            <td>'+item.id+'</td>\
                                           <td>'+item.name+'</td>\
                                           <td>'+item.email+'</td>\
                                           <td>'+item.phone+'</td>\
                                           <td>'+item.course+'</td>\
                                           <td><button type="button" value="'+item.id+'" data-bs-toggle="modal" data-bs-target="#EditStudentModal" class=" edit_student btn btn-info">Edit</button></td>\
                                           <td><button type="button" value="'+item.id+'"  class=" delete_student btn btn-danger">Delete</button></td>\
                                        </tr>');
                             });
                        }
                    });
                }
                // edit student
                $(document).on('click','.edit_student', function (e) {
                    e.preventDefault();
                    var student_id= $(this).val();
                    $('#EditStudentModal').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "/edit/student/"+student_id,
                        dataType: "json",
                        success: function (response) {
                            
                        }
                    });
                });

                // add student
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
                            if (response.status == 400) {
                                $('#saveformError').html("");
                                $('#saveformError').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#saveformError').append('<li>' + err_values +
                                        '</li>');
                                });
                            } else {
                                $('#saveformError').html("");
                                $('#success_message').addClass("alert alert-success");
                                $('#success_message').text(response.message);
                                $('#AddStudentModal').find('input').val("");

                                fetchStudent()
                            }
                        }
                    });
                });
            });
        </script>
    @endsection

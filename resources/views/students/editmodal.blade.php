<div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" id="edit_stud_id">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" id="edit_name" name="name" placeholder="Enter Full Names..."
                                        class="name form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" id="edit_email" Email="email" placeholder="Enter Email..."
                                        class="email form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="edit_phone" Phone="phone" placeholder="Enter Phone Number ..."
                                        class="phone form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="course">Course</label>
                                    <input type="text" id="edit_course" name="course" placeholder="Enter Course..."
                                        class="course form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_student">Update</button>
                    </div>
                </div>
            </div>
        </div>
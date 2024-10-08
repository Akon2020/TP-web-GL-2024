<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid bg-dark text-white min-vh-100">
        <div class="row">
            <div class="col-12 text-center p-4">
                <h1>Gestion des Cours</h1>
                <nav class="nav justify-content-center">
                    <a class="nav-link text-white" href="index.html">Dashboard</a>
                    <a class="nav-link text-white" href="students.php">Etudiants</a>
                    <a class="nav-link text-white" href="courses.php">Cours</a>
                    <a class="nav-link text-white" href="academic_year.php">Année Académique</a>
                </nav>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-12">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createCourseModal">Ajouter un cours</button>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Nom du Cours</th>
                            <th>Crédits</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="courseTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="createCourseModal" tabindex="-1" aria-labelledby="createCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCourseModalLabel">Ajouter un cours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createCourseForm">
                        <div class="mb-3">
                            <label for="courseCode" class="form-label">Code du cours</label>
                            <input type="text" class="form-control" id="courseCode" name="course_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="courseName" class="form-label">Nom du cours</label>
                            <input type="text" class="form-control" id="courseName" name="course_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="courseCredits" class="form-label">Crédits</label>
                            <input type="number" class="form-control" id="courseCredits" name="credits" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Modifier le cours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCourseForm">
                        <input type="hidden" id="editCourseCode" name="course_code">
                        <div class="mb-3">
                            <label for="editCourseName" class="form-label">Nom du cours</label>
                            <input type="text" class="form-control" id="editCourseName" name="course_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseCredits" class="form-label">Crédits</label>
                            <input type="number" class="form-control" id="editCourseCredits" name="credits" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCourseModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Êtes-vous sûr de vouloir supprimer le cours <span id="deleteCourseName"></span> ?</p>
                    <button type="button" class="btn btn-danger" id="confirmDeleteCourse">Supprimer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

    <script>
        $(document).ready(function() {
            loadCourses();

            $('#createCourseForm').submit(function(e) {
                e.preventDefault();
                $.post('create_course.php', $(this).serialize(), function(response) {
                    alert(response);
                    $('#createCourseModal').modal('hide');
                    loadCourses();
                });
            });

            $(document).on('click', '.edit-btn', function() {
                const courseCode = $(this).data('id');
                $.get('get_course.php', { coursecode: courseCode }, function(data) {
                    const course = JSON.parse(data);
                    $('#editCourseCode').val(course.coursecode);
                    $('#editCourseName').val(course.coursename);
                    $('#editCourseCredits').val(course.credits);
                    $('#editCourseModal').modal('show');
                });
            });

            $('#editCourseForm').submit(function(e) {
                e.preventDefault();
                $.post('update_course.php', $(this).serialize(), function(response) {
                    alert(response);
                    $('#editCourseModal').modal('hide');
                    loadCourses();
                });
            });

            $(document).on('click', '.delete-btn', function() {
                const courseCode = $(this).data('id');
                const courseName = $(this).data('name');
                $('#deleteCourseName').text(courseName);
                $('#deleteCourseModal').modal('show');
                $('#confirmDeleteCourse').click(function() {
                    $.post('delete_course.php', { coursecode: courseCode }, function(response) {
                        alert(response);
                        $('#deleteCourseModal').modal('hide');
                        loadCourses();
                    });
                });
            });
        });

        function loadCourses() {
            $.get('fetch_courses.php', function(data) {
                $('#courseTableBody').html(data);
            });
        }
    </script>
</body>

</html>

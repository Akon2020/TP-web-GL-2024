<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Nom du Cours</th>
                            <th>Crédits</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="courseTableBody">
                        <!-- Les cours seront chargés ici par AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter un cours -->
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

    <!-- Modal pour éditer un cours -->
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

    <!-- Modal pour supprimer un cours -->
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
    <script src="script.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Années Académiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container-fluid bg-dark text-white min-vh-100">
        <div class="row">
            <div class="col-12 text-center p-4">
                <h1>Gestion des Années Académiques</h1>
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
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createAcademicYearModal">Ajouter une année académique</button>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Année Début</th>
                            <th>Année Fin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="academicYearTableBody">
                        <!-- Les années académiques seront chargées ici par AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter une année académique -->
    <div class="modal fade" id="createAcademicYearModal" tabindex="-1" aria-labelledby="createAcademicYearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAcademicYearModalLabel">Ajouter une année académique</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createAcademicYearForm">
                        <div class="mb-3">
                            <label for="startYear" class="form-label">Année Début</label>
                            <input type="number" class="form-control" id="startYear" name="start_year" required>
                        </div>
                        <div class="mb-3">
                            <label for="endYear" class="form-label">Année Fin</label>
                            <input type="number" class="form-control" id="endYear" name="end_year" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour éditer une année académique -->
    <div class="modal fade" id="editAcademicYearModal" tabindex="-1" aria-labelledby="editAcademicYearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAcademicYearModalLabel">Modifier l'année académique</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAcademicYearForm">
                        <input type="hidden" id="editAcademicYearId" name="academic_year_id">
                        <div class="mb-3">
                            <label for="editStartYear" class="form-label">Année Début</label>
                            <input type="number" class="form-control" id="editStartYear" name="start_year" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndYear" class="form-label">Année Fin</label>
                            <input type="number" class="form-control" id="editEndYear" name="end_year" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour supprimer une année académique -->
    <div class="modal fade" id="deleteAcademicYearModal" tabindex="-1" aria-labelledby="deleteAcademicYearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAcademicYearModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Êtes-vous sûr de vouloir supprimer l'année académique <span id="deleteAcademicYearName"></span> ?</p>
                    <button type="button" class="btn btn-danger" id="confirmDeleteAcademicYear">Supprimer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
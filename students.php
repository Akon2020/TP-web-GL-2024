<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuGest - Etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center p-4">
                <h1>Liste des étudiants</h1>
                <nav class="nav justify-content-center">
                    <a class="nav-link text-white" href="index.html">Dashboard</a>
                    <a class="nav-link text-white" href="students.php">Etudiants</a>
                    <a class="nav-link text-white" href="courses.php">Cours</a>
                    <a class="nav-link text-white" href="academic_year.php">Année Académique</a>
                </nav>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createStudentModal">Créer</button>
        </div>
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Postnom</th>
                    <th>Date de Naissance</th>
                    <th>Numéro Mutuel</th>
                    <th>Promotion</th>
                    <th>Faculté</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
                <!-- Les données des étudiants seront chargées ici -->
            </tbody>
        </table>
    </div>

    <!-- Modal pour créer un étudiant -->
<div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="createStudentModalLabel">Ajouter un Étudiant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createStudentForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="second_name" class="form-label">Postnom</label>
                        <input type="text" class="form-control" id="second_name" name="second_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Date de Naissance</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="is_member_mutual" class="form-label">Êtes-vous membre d'une mutuelle de santé ?</label>
                        <select class="form-select" id="is_member_mutual" name="is_member_mutual" required>
                            <option value="Non">Non</option>
                            <option value="Oui">Oui</option>
                        </select>
                    </div>
                    <div class="mb-3" id="mutual_number_div" style="display: none;">
                        <label for="mutual_number" class="form-label">Numéro Mutuel</label>
                        <input type="text" class="form-control" id="mutual_number" name="mutual_number">
                    </div>
                    <div class="mb-3">
                        <label for="promotion" class="form-label">Promotion</label>
                        <select class="form-select" id="promotion" name="promotion" required>
                            <option value="Bac 1">Bac 1</option>
                            <option value="Bac 2">Bac 2</option>
                            <option value="Bac 3">Bac 3</option>
                            <option value="Bac 4">Bac 4</option>
                            <option value="L1">L1</option>
                            <option value="L2">L2</option>
                            <option value="M1">M1</option>
                            <option value="M2">M2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="faculty" class="form-label">Faculté</label>
                        <select class="form-select" id="faculty" name="faculty" required>
                            <option value="Sciences informatique">Sciences informatique</option>
                            <option value="Génie logiciel">Génie logiciel</option>
                            <option value="Système informatique">Système informatique</option>
                            <option value="Economie">Economie</option>
                            <option value="Agronomie">Agronomie</option>
                            <option value="Architecture">Architecture</option>
                            <option value="Environnement">Environnement</option>
                            <option value="Sciences sociales">Sciences sociales</option>
                            <option value="Droit">Droit</option>
                        </select>
                    </div>
                    <!-- Sélection de l'année académique et de la session -->
                    <div class="mb-3">
                        <label for="academic_year" class="form-label">Année Académique</label>
                        <select class="form-select" id="academic_year" name="academic_year" required>
                            <!-- Options seront générées dynamiquement à partir de la base de données -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="session" class="form-label">Session</label>
                        <select class="form-select" id="session" name="session" required>
                            <!-- Options seront générées dynamiquement à partir de la base de données -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Modal pour éditer un étudiant -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-light text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Modifier un Étudiant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editStudentForm">
                        <input type="hidden" id="editMatricule" name="matricule">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSecondName" class="form-label">Postnom</label>
                            <input type="text" class="form-control" id="editSecondName" name="second_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBirthDate" class="form-label">Date de Naissance</label>
                            <input type="date" class="form-control" id="editBirthDate" name="birth_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="editMutualNumber" class="form-label">Numéro Mutuel</label>
                            <input type="text" class="form-control" id="editMutualNumber" name="mutual_number">
                        </div>
                        <div class="mb-3">
                            <label for="editPromotion" class="form-label">Promotion</label>
                            <input type="text" class="form-control" id="editPromotion" name="promotion" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFaculty" class="form-label">Faculté</label>
                            <input type="text" class="form-control" id="editFaculty" name="faculty" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour la confirmation de suppression -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-light text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Supprimer un Étudiant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer les données de l'étudiant <span id="deleteStudentName"></span>?</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteStudent">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

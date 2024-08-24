$(document).ready(function () {
  function loadStudents() {
    $.ajax({
      url: "fetch_students.php",
      type: "GET",
      success: function (data) {
        $("#studentTableBody").html(data);
      },
    });
  }

  loadStudents();

  function loadYear() {
    $.ajax({
      url: "fetch_year.php",
      type: "GET",
      success: function (data) {
        $("#academicYearTableBody").html(data);
      },
    });
  }

  loadYear();

  $("#createStudentForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "create_student.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (data) {
        $("#createStudentModal").modal("hide");
        loadStudents();
      },
    });
  });

  $(document).on("click", ".edit-btn", function () {
    const matricule = $(this).data("id");
    $.ajax({
      url: "get_student.php",
      type: "GET",
      data: { matricule: matricule },
      success: function (data) {
        const student = JSON.parse(data);
        $("#editMatricule").val(student.matricule);
        $("#editName").val(student.name);
        $("#editSecondName").val(student.second_name);
        $("#editBirthDate").val(student.birth_date);
        $("#editMutualYes").prop("checked", student.mutual_number !== null);
        $("#editMutualNo").prop("checked", student.mutual_number === null);
        $("#editMutualNumber")
          .val(student.mutual_number)
          .parent()
          .toggle(student.mutual_number !== null);
        $("#editPromotion").val(student.promotion);
        $("#editFaculty").val(student.faculty);
        $("#editStudentModal").modal("show");
      },
    });
  });

  $("#editStudentForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "update_student.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (data) {
        $("#editStudentModal").modal("hide");
        loadStudents();
      },
    });
  });

  $(document).on("click", ".delete-btn", function () {
    const matricule = $(this).data("id");
    const name = $(this).data("name");
    $("#deleteStudentName").text(name);
    $("#confirmDeleteStudent").data("id", matricule);
    $("#deleteStudentModal").modal("show");
  });

  $("#confirmDeleteStudent").on("click", function () {
    const matricule = $(this).data("id");
    $.ajax({
      url: "delete_student.php",
      type: "POST",
      data: { matricule: matricule },
      success: function (data) {
        $("#deleteStudentModal").modal("hide");
        loadStudents();
      },
    });
  });

  $("input[name='mutual']").on("change", function () {
    if ($(this).val() === "Oui") {
      $("#mutualNumberContainer").show();
    } else {
      $("#mutualNumberContainer").hide();
      $("#mutualNumber").val("");
    }
  });

  $("#addAcademicYearForm").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "add_academic_year.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        alert(response);
        location.reload(); // Recharger la page après l'ajout
      },
    });
  });

   $(".editAcademicYearBtn").on("click", function () {
     let id = $(this).data("id");
     let startYear = $(this).data("startyear");
     let endYear = $(this).data("endyear");
     $("#editAcademicYearId").val(id);
     $("#editStartYear").val(startYear);
     $("#editEndYear").val(endYear);
     $("#editAcademicYearModal").modal("show");
   });

   // Modifier une année académique
   $("#editAcademicYearForm").on("submit", function (event) {
     event.preventDefault();
     $.ajax({
       url: "edit_academic_year.php",
       type: "POST",
       data: $(this).serialize(),
       success: function (response) {
         alert(response);
         location.reload(); // Recharger la page après la mise à jour
       },
     });
   });

   // Ouvrir le modal de suppression d'année académique
   $(".deleteAcademicYearBtn").on("click", function () {
     let id = $(this).data("id");
     let yearRange = $(this).data("yearrange");
     $("#deleteAcademicYearName").text(yearRange);
     $("#confirmDeleteAcademicYear").data("id", id);
     $("#deleteAcademicYearModal").modal("show");
   });
});

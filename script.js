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
});

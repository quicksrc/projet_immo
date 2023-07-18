$(function () {
  $("#toolbar")
    .find("select")
    .change(function () {
      $("#table")
        .bootstrapTable("destroy")
        .bootstrapTable({
          exportDataType: $(this).val(),
          exportTypes: ["csv", "excel"],
          columns: [
            {
              field: "state",
              checkbox: true,
              visible: $(this).val() === "selected",
            },
            {
              field: "id",
              title: "N°",
            },
            {
              field: "adresse",
              title: "Adresse",
            },
            {
              field: "cp",
              title: "CP",
            },
            {
              field: "ville",
              title: "Ville",
            },
            {
              field: "refPropriete",
              title: "Référence Propriétaire",
            },
            {
              field: "date",
              title: "Date de l'Enquête",
            },
            {
              field: "intermediaire",
              title: "Intermédiaire",
            },
            {
              field: "suiviPar",
              title: "Responsable du Dossier",
            },
            {
              field: "description",
              title: "Description",
            },
          ],
        });
    })
    .trigger("change");
});

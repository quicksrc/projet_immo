$(function () {
  $("#toolbarImmeuble")
    .find("select")
    .change(function () {
      $("#tableImmeuble")
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
              field: "action",
              title: "Actions",
            },
            {
              field: "refPropriete",
              title: "Réf. Propriétaire",
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
              field: "date",
              title: "Date de l'Enquête",
            },
            {
              field: "intermediaire",
              title: "Intermédiaire",
            },
            {
              field: "suiviPar",
              title: "Resp. du Dossier",
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
$(function () {
  $("#toolbarImmeubleSearch")
    .find("select")
    .change(function () {
      $("#tableImmeubleSearch")
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
              field: "action",
              title: "Actions",
            },
            {
              field: "refPropriete",
              title: "Réf. Propriétaire",
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
              field: "date",
              title: "Date de l'Enquête",
            },
            {
              field: "intermediaire",
              title: "Intermédiaire",
            },
            {
              field: "suiviPar",
              title: "Resp. du Dossier",
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

$(function () {
  $("#toolbarContact")
    .find("select")
    .change(function () {
      $("#tableContact")
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
              field: "action",
              title: "Actions",
            },
            {
              field: "id",
              title: "N°",
            },
            {
              field: "nom",
              title: "Nom",
            },
            {
              field: "prenom",
              title: "Prenom",
            },
            {
              field: "tel",
              title: "Telephone",
            },
            {
              field: "telPor",
              title: "Telephone Portable",
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
          ],
        });
    })
    .trigger("change");
});

$(function () {
  $("#toolbarSociete")
    .find("select")
    .change(function () {
      $("#tableSociete")
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
              field: "action",
              title: "Actions",
            },
            {
              field: "id",
              title: "N°",
            },
            {
              field: "etatDossier",
              title: "Etat",
            },
            {
              field: "jal",
              title: "JAL",
            },
            {
              field: "vrs",
              title: "Raison Sociale du Vendeur",
            },
            {
              field: "ars",
              title: "Raison Sociale de l'Acheteur",
            },
          ],
        });
    })
    .trigger("change");
});

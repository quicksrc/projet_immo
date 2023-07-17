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
              title: "ID",
            },
            {
              field: "description",
              title: "Description",
            },
            {
              field: "referenceProprio",
              title: "Référence Propriétaire",
            },
            {
              field: "vendu",
              title: "Vendu",
            },
          ],
        });
    })
    .trigger("change");
});

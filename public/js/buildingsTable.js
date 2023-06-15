var $table = $("#table");

$(function () {
  $("#toolbar")
    .find("select")
    .change(function () {
      $table.bootstrapTable("destroy").bootstrapTable({
        exportDataType: $(this).val(),
        exportTypes: ["json", "xml", "csv", "txt", "sql", "excel", "pdf"],
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

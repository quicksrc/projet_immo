$(function () {
  $("#toolbarImmeuble")
    .find("select")
    .change(function () {
      $("#tableImmeuble")
        .bootstrapTable("destroy")
        .bootstrapTable({
          exportDataType: $(this).val(),
          exportTypes: ["excel"],
          columns: [
            {
              field: "state",
              checkbox: true,
              visible: $(this).val() === "selected",
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
          exportTypes: ["excel"],
          columns: [
            {
              field: "state",
              checkbox: true,
              visible: $(this).val() === "selected",
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
          exportTypes: ["excel"],
          columns: [
            {
              field: "state",
              checkbox: true,
              visible: $(this).val() === "selected",
            },
          ],
        });
    })
    .trigger("change");
});

$(function () {
  $("#toolbarContactSearch")
    .find("select")
    .change(function () {
      $("#tableContactSearch")
        .bootstrapTable("destroy")
        .bootstrapTable({
          exportDataType: $(this).val(),
          exportTypes: ["excel"],
          columns: [
            {
              field: "state",
              checkbox: true,
              visible: $(this).val() === "selected",
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
          exportTypes: ["excel"],
          columns: [
            {
              field: "state",
              checkbox: true,
              visible: $(this).val() === "selected",
            },
            
          ],
        });
    })
    .trigger("change");
});


$(function () {
  $("#toolbarSocieteSearch")
    .find("select")
    .change(function () {
      $("#tableSocieteSearch")
        .bootstrapTable("destroy")
        .bootstrapTable({
          exportDataType: $(this).val(),
          exportTypes: ["excel"],
          columns: [
            {
              field: "state",
              checkbox: true,
              visible: $(this).val() === "selected",
            },
          ],
        });
    })
    .trigger("change");
});
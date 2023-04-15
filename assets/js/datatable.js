$(document).ready(function () {
    $('#mitra').DataTable({
        // scrollX: true,
        sScrollXInner: "100%",
        "initComplete": function (settings, json) {  
            $("#mitra").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
          },
    });
});

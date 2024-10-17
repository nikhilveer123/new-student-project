
$(document).ready(function() {

    $('#studentSubmenu').addClass('show');




$('#studentsTable').DataTable({
    paging: false,
    searching: true,
    ordering: true,
    info: true,
    language: {
        search: "Search by name:",
        lengthMenu: "Display _MENU_ records per page",
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "No entries available",
        infoFiltered: "(filtered from _MAX_ total entries)"
    }
});
});

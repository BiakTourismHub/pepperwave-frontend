$(document).ready(() => {
    $('.select2').select2();
    $('#list-data').DataTable();
});

function confirmAndSubmitForm(id, message) {
    if (confirm(message)) {
        document.getElementById('delete-form-' + id).submit();
    }
}

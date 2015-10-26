function ConfirmDelete() {
    var x = confirm("Are you sure you want to delete this?");
    if (x)
        return true;
    else
        return false;
}

$('body').scrollspy({
    target: '.bs-docs-sidebar',
    offset: 40
});

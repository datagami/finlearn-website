window.addEventListener("beforeunload", function (e) {
    e.preventDefault();
    e.returnValue = 'Are you sure you want to leave this website? Your unsaved changes may be lost.';
});

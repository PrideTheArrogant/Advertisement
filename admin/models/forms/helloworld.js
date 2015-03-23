jQuery(
function() {
    document.formvalidator.setHandler('title',
        function (value) {
            regex=/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
            return regex.test(value);
        });
}

function() {
    document.formvalidator.setHandler('email',
        function (value) {
            regex=/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/;
            return regex.test(value);
        });
}
);
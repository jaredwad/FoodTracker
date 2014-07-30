function goToIndividual(foodType) {
    var form = $('<form action="' + getURL() + '" method="post">' +
        '<input type="text" name="type" value="' + foodType + '" />' +
        '</form>');
    $(form).submit();
}

function getURL() {
    return document.URL.substr(0, document.URL.lastIndexOf("/") + 1) + "individual.php"
}
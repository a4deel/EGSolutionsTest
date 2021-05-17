function makeRed() {
    $(document).ready(function () {
        $("button").click(function () {
            $('#target').css('color', 'red');
        });
    });
}
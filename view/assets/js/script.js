$('#addform').on('submit', function (p) {
    p.preventDefault();
    $.ajax({
        type: "post",
        url: "../controller/CadastraColaborador.php",
        data: $(this).serialize(),
        beforeSend: () => {console.log($(this).serialize())},
        success: function (response) {
            document.location.reload(true);
        }
    });
});


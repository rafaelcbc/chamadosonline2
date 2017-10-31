function usuarioSenhaInvalidos() {
    $(".teste").prepend(
        "<div class='alert alert-danger alert-dismissable'>"+
            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
            "Usuário ou senha inválidos."+
        "</div>"
    );
}
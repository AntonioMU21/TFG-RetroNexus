function redirigir_al_inicio( $redirigir_a, $peticion, $usuario ) {
    if ( is_wp_error( $usuario ) || in_array( 'administrator', $usuario->roles ) ) {
        return $redirigir_a;
    }

    return home_url( '/' ); 
}

add_filter( 'login_redirect', 'redirigir_al_inicio', 10, 3 );
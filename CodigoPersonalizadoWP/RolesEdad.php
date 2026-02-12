<?php
function asignar_rol_por_edad( $user_id, $is_active ) {

    if ( ! $is_active ) {
        return;
    }

    $fecha_nacimiento = xprofile_get_field_data( 2, $user_id ); 

    if ( empty( $fecha_nacimiento ) ) {
        return;
    }

    $fecha_nac = new DateTime( $fecha_nacimiento );
    $hoy = new DateTime();
    $edad = $hoy->diff( $fecha_nac )->y;

    $usuario = get_user_by( 'id', $user_id );

    $usuario->remove_role( 'subscriber' );

    if ( $edad >= 18 ) {
        $usuario->add_role( 'mayor_edad' );
    } else {
        $usuario->add_role( 'menor_edad' );
    }
}

add_action( 'bp_core_activated_user', 'asignar_rol_por_edad', 10, 2 );

function añadir_rol_a_la_clase_body( $clases ) {
    
    if ( is_user_logged_in() ) {
        $usuario_actual = wp_get_current_user();
        $roles_del_usuario = (array) $usuario_actual->roles;

        if ( ! empty( $roles_del_usuario ) ) {
            $rol_principal = array_shift( $roles_del_usuario );
            $clases[] = 'role-' . $rol_principal; // Esto imprime "role-mayor_edad" o "role-menor_edad"
        }
    }
    
    return $clases;
}
add_filter( 'body_class', 'añadir_rol_a_la_clase_body' );

function redirigir_al_inicio( $redirigir_a, $peticion, $usuario ) {

    if ( is_wp_error( $usuario ) || in_array( 'administrator', $usuario->roles ) ) {
        return $redirigir_a;
    }

    return home_url( '/' ); 
}
add_filter( 'login_redirect', 'redirigir_al_inicio', 10, 3 );

?>
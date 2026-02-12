function retro_nexus_add_role_to_body_class( $classes ) {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        $user_roles = (array) $current_user->roles;

        if ( ! empty( $user_roles ) ) {
            $role = array_shift( $user_roles );
            $classes[] = 'role-' . $role;
        }
    }
    return $classes;
}
add_filter( 'body_class', 'retro_nexus_add_role_to_body_class' );
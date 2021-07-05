<?php

function activate_menu($menu)
{
    $ci = &get_instance();
    $classname = $ci->router->fetch_class();
    return $classname == $menu ? 'active' : '';
}

function menu_open($menu2)
{
    $ci = &get_instance();
    $classname = $ci->router->fetch_class();
    return $classname == $menu2 ? 'menu-open' : '';
}

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('email');
    if ($user_session) {
        redirect('beranda');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('email');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function approve_revisi($id_revisi)
{
    $ci = get_instance();

    $ci->db->where('id_revisi', $id_revisi);
    $ci->db->where('status', 1);
    $ci->db->where('penguji', $ci->session->userdata('id_dosen'));
    $result = $ci->db->get('revisi');

    if ($result->num_rows() > 0) {
        return "checked";
    }
}

<?php
// post_type: revista
function post_type_revista_criar() {
    $labels = array(
            "name" => _x("Revista", "post type general name"),
            "singular_name" => _x("Revista", "post type singular name"),
            "add_new" => _x("Adicionar Nova", "revista"),
            "add_new_item" => __("Adicionar Nova Revista"),
            "edit_item" => __("Editar Revista"),
            "new_item" => __("Novo Revista"),
            "all_items" => __("Todos as Revistas"),
            "view_item" => __("Ver Revista"),
            "search_items" => __("Buscar Revistas"),
            "not_found" => __("Nenhuma Revista Encontrada"),
            "not_found_in_trash" => __("Nenhuma Revista Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Revista ISSUU"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => true,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => null,
            "supports" => array("title")
    );

    register_post_type("revista", $args);
}

function meta_box_revista_adicionar() {
    add_meta_box(
            "meta_box_revista_id",
            "ISSUU",
            "meta_box_revista",
            "revista",
            "normal",
            "high"
    );
}

function meta_box_revista() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["iframe-issuu"]) ? esc_attr($campos["iframe-issuu"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='iframe-issuu'>iframe ISSUU: </label><br>
                <textarea style='width:100%;' rows='10' name='iframe-issuu' id='iframe-issuu'>$conteudo</textarea>
            </p>
    ";
}

function meta_box_revista_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    $tags_permitidas = array(
            "iframe" => array(
                    "width" => array(),
                    "height" => array(),
                    "src" => array(),
                    "frameborder" => array(),
                    "allowfullscreen" => array()
            )
    );

    if (isset($_POST['iframe-issuu'])) {
        update_post_meta(
                $post_id,
                'iframe-issuu',
                wp_kses(
                        $_POST['iframe-issuu'],
                        $tags_permitidas
                )
        );
    }
}

add_action("init", "post_type_revista_criar");
add_action("add_meta_boxes", "meta_box_revista_adicionar");
add_action("save_post", "meta_box_revista_salvar");

// post_type: jornal
function post_type_jornal_criar() {
    $labels = array(
            "name" => _x("Jornal", "post type general name"),
            "singular_name" => _x("Jornal", "post type singular name"),
            "add_new" => _x("Adicionar Novo", "jornal"),
            "add_new_item" => __("Adicionar Novo Jornal"),
            "edit_item" => __("Editar Jornal"),
            "new_item" => __("Novo Jornal"),
            "all_items" => __("Todos os Jornais"),
            "view_item" => __("Ver Jornal"),
            "search_items" => __("Buscar Jornais"),
            "not_found" => __("Nenhum Jornal Encontrado"),
            "not_found_in_trash" => __("Nenhum Jornal Encontrado na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Jornal ISSUU"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => true,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => null,
            "supports" => array("title")
    );

    register_post_type("jornal", $args);
}

function meta_box_jornal_adicionar() {
    add_meta_box(
            "meta_box_jornal_id",
            "ISSUU",
            "meta_box_jornal",
            "jornal",
            "normal",
            "high"
    );
}

function meta_box_jornal() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["iframe-issuu"]) ? esc_attr($campos["iframe-issuu"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='iframe-issuu'>iframe ISSUU: </label><br>
                <textarea style='width:100%;' rows='10' name='iframe-issuu' id='iframe-issuu'>$conteudo</textarea>
            </p>
    ";
}

function meta_box_jornal_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    $tags_permitidas = array(
            "iframe" => array(
                    "width" => array(),
                    "height" => array(),
                    "src" => array(),
                    "frameborder" => array(),
                    "allowfullscreen" => array()
            )
    );

    if (isset($_POST['iframe-issuu'])) {
        update_post_meta(
                $post_id,
                'iframe-issuu',
                wp_kses(
                        $_POST['iframe-issuu'],
                        $tags_permitidas
                )
        );
    }
}

add_action("init", "post_type_jornal_criar");
add_action("add_meta_boxes", "meta_box_jornal_adicionar");
add_action("save_post", "meta_box_jornal_salvar");

?>
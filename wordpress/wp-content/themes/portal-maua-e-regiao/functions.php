<?php
include "custom-post-type-com-rewrite.php";

// post_type: revista
function post_type_revista_criar() {
    $labels = array(
            "name" => _x("Revista", "post type general name"),
            "singular_name" => _x("Revista", "post type singular name"),
            "add_new" => _x("Adicionar Nova", "revista"),
            "add_new_item" => __("Adicionar Nova Revista"),
            "edit_item" => __("Editar Revista"),
            "new_item" => __("Nova Revista"),
            "all_items" => __("Todas as Revistas"),
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
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-book-alt",
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
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-id-alt",
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

// post_type: noticia_destaque_3_itens
function post_type_noticia_destaque_3_itens_criar() {
    $labels = array(
            "name" => _x("Notícia Destaque com 3", "post type general name"),
            "singular_name" => _x("Notícia Destaque com 3", "post type singular name"),
            "add_new" => _x("Adicionar Notícia Destaque", "jornal"),
            "add_new_item" => __("Adicionar Nova Notícia Destaque"),
            "edit_item" => __("Editar Notícia Destaque"),
            "new_item" => __("Nova Notícia Destaque"),
            "all_items" => __("Todas as Notícias Destaques"),
            "view_item" => __("Ver Notícia Destaque"),
            "search_items" => __("Buscar Notícias Destaques"),
            "not_found" => __("Nenhuma Notícia Destaque Encontrada"),
            "not_found_in_trash" => __("Nenhuma Notícia Destaque Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Notícia Destaque com 3"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%destaque_3_itens%'
    );

    register_post_type_com_rewrite_rules("destaque_3_itens", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_destaque_3_itens_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_3_itens_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_destaque_3_itens_expressao_chave",
            "destaque_3_itens",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_3_itens_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["expressao-chave"]) ? esc_attr($campos["expressao-chave"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='expressao-chave'>Expressão-chave (ficará posicionada acima do título): </label><br>
                <input style='width: 100%;' type='text' name='expressao-chave' id='expressao-chave' value='$conteudo'><br><br>
                Dê preferência a expressões únicas, como: 'Cultura na cidade', 'Novos horizontes', 'Mauá melhor' etc.
            </p>
    ";
}

function meta_box_noticia_destaque_3_itens_expressao_chave_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['expressao-chave'])) {
        update_post_meta(
                $post_id,
                'expressao-chave',
                $_POST['expressao-chave']
        );
    }
}

// Campo: Imagem
function meta_box_noticia_destaque_3_itens_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_3_itens_imagem_id",
            "Imagem",
            "meta_box_noticia_destaque_3_itens_imagem",
            "destaque_3_itens",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_3_itens_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 302 pixels<br>
                ALTURA: 180 pixels
            </p>
    ";
}

function meta_box_noticia_destaque_3_itens_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_noticia_destaque_3_itens_criar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_3_itens_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_destaque_3_itens_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_3_itens_imagem_adicionar");
add_action("save_post", "meta_box_noticia_destaque_3_itens_imagem_salvar");

// post_type: noticia_destaque_1_item
function post_type_noticia_destaque_1_item_criar() {
    $labels = array(
            "name" => _x("Notícia Destaque com 1", "post type general name"),
            "singular_name" => _x("Notícia Destaque com 1", "post type singular name"),
            "add_new" => _x("Adicionar Notícia Destaque", "jornal"),
            "add_new_item" => __("Adicionar Nova Notícia Destaque"),
            "edit_item" => __("Editar Notícia Destaque"),
            "new_item" => __("Nova Notícia Destaque"),
            "all_items" => __("Todas as Notícias Destaques"),
            "view_item" => __("Ver Notícia Destaque"),
            "search_items" => __("Buscar Notícias Destaques"),
            "not_found" => __("Nenhuma Notícia Destaque Encontrada"),
            "not_found_in_trash" => __("Nenhuma Notícia Destaque Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Notícia Destaque com 1"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%destaque_1_item%'
    );

    register_post_type_com_rewrite_rules("destaque_1_item", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_destaque_1_item_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_1_item_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_destaque_1_item_expressao_chave",
            "destaque_1_item",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_1_item_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["expressao-chave"]) ? esc_attr($campos["expressao-chave"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='expressao-chave'>Expressão-chave (ficará posicionada acima do título): </label><br>
                <input style='width: 100%;' type='text' name='expressao-chave' id='expressao-chave' value='$conteudo'><br><br>
                Dê preferência a expressões únicas, como: 'Cultura na cidade', 'Novos horizontes', 'Mauá melhor' etc.
            </p>
    ";
}

function meta_box_noticia_destaque_1_item_expressao_chave_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['expressao-chave'])) {
        update_post_meta(
                $post_id,
                'expressao-chave',
                $_POST['expressao-chave']
        );
    }
}

// Campo: Imagem
function meta_box_noticia_destaque_1_item_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_1_item_imagem_id",
            "Imagem",
            "meta_box_noticia_destaque_1_item_imagem",
            "destaque_1_item",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_1_item_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 302 pixels<br>
                ALTURA: 554 pixels
            </p>
    ";
}

function meta_box_noticia_destaque_1_item_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_noticia_destaque_1_item_criar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_1_item_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_destaque_1_item_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_1_item_imagem_adicionar");
add_action("save_post", "meta_box_noticia_destaque_1_item_imagem_salvar");

// post_type: noticia_destaque_2_itens
function post_type_noticia_destaque_2_itens_criar() {
    $labels = array(
            "name" => _x("Notícia Destaque [direita]", "post type general name"),
            "singular_name" => _x("Notícia Destaque [direita]", "post type singular name"),
            "add_new" => _x("Adicionar Notícia Destaque", "jornal"),
            "add_new_item" => __("Adicionar Nova Notícia Destaque"),
            "edit_item" => __("Editar Notícia Destaque"),
            "new_item" => __("Nova Notícia Destaque"),
            "all_items" => __("Todas as Notícias Destaques"),
            "view_item" => __("Ver Notícia Destaque"),
            "search_items" => __("Buscar Notícias Destaques"),
            "not_found" => __("Nenhuma Notícia Destaque Encontrada"),
            "not_found_in_trash" => __("Nenhuma Notícia Destaque Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Notícia Destaque [direita]"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%destaque_2_itens%'
    );

    register_post_type_com_rewrite_rules("destaque_2_itens", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_destaque_2_itens_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_2_itens_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_destaque_2_itens_expressao_chave",
            "destaque_2_itens",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_2_itens_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["expressao-chave"]) ? esc_attr($campos["expressao-chave"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='expressao-chave'>Expressão-chave (ficará posicionada acima do título): </label><br>
                <input style='width: 100%;' type='text' name='expressao-chave' id='expressao-chave' value='$conteudo'><br><br>
                Dê preferência a expressões únicas, como: 'Cultura na cidade', 'Novos horizontes', 'Mauá melhor' etc.
            </p>
    ";
}

function meta_box_noticia_destaque_2_itens_expressao_chave_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['expressao-chave'])) {
        update_post_meta(
                $post_id,
                'expressao-chave',
                $_POST['expressao-chave']
        );
    }
}

// Campo: Imagem
function meta_box_noticia_destaque_2_itens_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_2_itens_imagem_id",
            "Imagem",
            "meta_box_noticia_destaque_2_itens_imagem",
            "destaque_2_itens",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_2_itens_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem devem possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 302 pixels<br>
                ALTURA: 266 pixels
            </p>
    ";
}

function meta_box_noticia_destaque_2_itens_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_noticia_destaque_2_itens_criar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_2_itens_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_destaque_2_itens_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_2_itens_imagem_adicionar");
add_action("save_post", "meta_box_noticia_destaque_2_itens_imagem_salvar");

// post_type: outros_destaques
function post_type_outros_destaques_criar() {
    $labels = array(
            "name" => _x("Outros Destaques", "post type general name"),
            "singular_name" => _x("Outros Destaques", "post type singular name"),
            "add_new" => _x("Adicionar Destaque", "jornal"),
            "add_new_item" => __("Adicionar Novo Destaque"),
            "edit_item" => __("Editar Destaque"),
            "new_item" => __("Novo Destaque"),
            "all_items" => __("Todos os Destaques"),
            "view_item" => __("Ver Destaque"),
            "search_items" => __("Buscar Destaques"),
            "not_found" => __("Nenhum Destaque Encontrado"),
            "not_found_in_trash" => __("Nenhum Destaque Encontrado na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Outros Destaques"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%outros_destaques%'
    );

    register_post_type_com_rewrite_rules("outros_destaques", $args, $rewrite);
}

// Campo: Imagem
function meta_box_outros_destaques_imagem_adicionar() {
    add_meta_box(
            "meta_box_outros_destaques_imagem_id",
            "Imagem",
            "meta_box_outros_destaques_imagem",
            "outros_destaques",
            "normal",
            "high"
    );
}

function meta_box_outros_destaques_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 302 pixels<br>
                ALTURA: 266 pixels
            </p>
    ";
}

function meta_box_outros_destaques_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_outros_destaques_criar");
add_action("add_meta_boxes", "meta_box_outros_destaques_imagem_adicionar");
add_action("save_post", "meta_box_outros_destaques_imagem_salvar");

// post_type: noticia_destacada
function post_type_noticia_destacada_criar() {
    $labels = array(
            "name" => _x("Notícia Destacada (1ª)", "post type general name"),
            "singular_name" => _x("Notícia Destacada (1ª)", "post type singular name"),
            "add_new" => _x("Adicionar Notícia", "jornal"),
            "add_new_item" => __("Adicionar Nova Notícia"),
            "edit_item" => __("Editar Notícia"),
            "new_item" => __("Nova Notícia"),
            "all_items" => __("Todas as Notícias"),
            "view_item" => __("Ver Notícia"),
            "search_items" => __("Buscar Notícias"),
            "not_found" => __("Nenhuma Notícia Encontrada"),
            "not_found_in_trash" => __("Nenhuma Notícia Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Notícia Destacada (1ª)"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%noticia_destacada%'
    );

    register_post_type_com_rewrite_rules("noticia_destacada", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_destacada_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_destacada_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_destacada_expressao_chave",
            "noticia_destacada",
            "normal",
            "high"
    );
}

function meta_box_noticia_destacada_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["expressao-chave"]) ? esc_attr($campos["expressao-chave"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='expressao-chave'>Expressão-chave (ficará posicionada acima do título): </label><br>
                <input style='width: 100%;' type='text' name='expressao-chave' id='expressao-chave' value='$conteudo'><br><br>
                Dê preferência a expressões únicas, como: 'Cultura na cidade', 'Novos horizontes', 'Mauá melhor' etc.
            </p>
    ";
}

function meta_box_noticia_destacada_expressao_chave_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['expressao-chave'])) {
        update_post_meta(
                $post_id,
                'expressao-chave',
                $_POST['expressao-chave']
        );
    }
}

// Campo: Imagem
function meta_box_noticia_destacada_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_destacada_imagem_id",
            "Imagem",
            "meta_box_noticia_destacada_imagem",
            "noticia_destacada",
            "normal",
            "high"
    );
}

function meta_box_noticia_destacada_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 300 pixels<br>
                ALTURA: 350 pixels
            </p>
    ";
}

function meta_box_noticia_destacada_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_noticia_destacada_criar");
add_action("add_meta_boxes", "meta_box_noticia_destacada_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_destacada_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_destacada_imagem_adicionar");
add_action("save_post", "meta_box_noticia_destacada_imagem_salvar");

// post_type: noticia_dstq_2
function post_type_noticia_dstq_2_criar() {
    $labels = array(
            "name" => _x("Notícia Destacada (2ª)", "post type general name"),
            "singular_name" => _x("Notícia Destacada (2ª)", "post type singular name"),
            "add_new" => _x("Adicionar Notícia", "jornal"),
            "add_new_item" => __("Adicionar Nova Notícia"),
            "edit_item" => __("Editar Notícia"),
            "new_item" => __("Nova Notícia"),
            "all_items" => __("Todas as Notícias"),
            "view_item" => __("Ver Notícia"),
            "search_items" => __("Buscar Notícias"),
            "not_found" => __("Nenhuma Notícia Encontrada"),
            "not_found_in_trash" => __("Nenhuma Notícia Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Notícia Destacada (2ª)"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%noticia_dstq_2%'
    );

    register_post_type_com_rewrite_rules("noticia_dstq_2", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_dstq_2_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_dstq_2_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_dstq_2_expressao_chave",
            "noticia_dstq_2",
            "normal",
            "high"
    );
}

function meta_box_noticia_dstq_2_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["expressao-chave"]) ? esc_attr($campos["expressao-chave"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='expressao-chave'>Expressão-chave (ficará posicionada acima do título): </label><br>
                <input style='width: 100%;' type='text' name='expressao-chave' id='expressao-chave' value='$conteudo'><br><br>
                Dê preferência a expressões únicas, como: 'Cultura na cidade', 'Novos horizontes', 'Mauá melhor' etc.
            </p>
    ";
}

function meta_box_noticia_dstq_2_expressao_chave_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['expressao-chave'])) {
        update_post_meta(
                $post_id,
                'expressao-chave',
                $_POST['expressao-chave']
        );
    }
}

// Campo: Imagem
function meta_box_noticia_dstq_2_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_dstq_2_imagem_id",
            "Imagem",
            "meta_box_noticia_dstq_2_imagem",
            "noticia_dstq_2",
            "normal",
            "high"
    );
}

function meta_box_noticia_dstq_2_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 400 pixels<br>
                ALTURA: 140 pixels
            </p>
    ";
}

function meta_box_noticia_dstq_2_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_noticia_dstq_2_criar");
add_action("add_meta_boxes", "meta_box_noticia_dstq_2_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_dstq_2_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_dstq_2_imagem_adicionar");
add_action("save_post", "meta_box_noticia_dstq_2_imagem_salvar");

// post_type: noticia_dstq_3
function post_type_noticia_dstq_3_criar() {
    $labels = array(
            "name" => _x("Notícia Destacada (3ª)", "post type general name"),
            "singular_name" => _x("Notícia Destacada (3ª)", "post type singular name"),
            "add_new" => _x("Adicionar Notícia", "jornal"),
            "add_new_item" => __("Adicionar Nova Notícia"),
            "edit_item" => __("Editar Notícia"),
            "new_item" => __("Nova Notícia"),
            "all_items" => __("Todas as Notícias"),
            "view_item" => __("Ver Notícia"),
            "search_items" => __("Buscar Notícias"),
            "not_found" => __("Nenhuma Notícia Encontrada"),
            "not_found_in_trash" => __("Nenhuma Notícia Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Notícia Destacada (3ª)"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%noticia_dstq_3%'
    );

    register_post_type_com_rewrite_rules("noticia_dstq_3", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_dstq_3_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_dstq_3_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_dstq_3_expressao_chave",
            "noticia_dstq_3",
            "normal",
            "high"
    );
}

function meta_box_noticia_dstq_3_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["expressao-chave"]) ? esc_attr($campos["expressao-chave"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='expressao-chave'>Expressão-chave (ficará posicionada acima do título): </label><br>
                <input style='width: 100%;' type='text' name='expressao-chave' id='expressao-chave' value='$conteudo'><br><br>
                Dê preferência a expressões únicas, como: 'Cultura na cidade', 'Novos horizontes', 'Mauá melhor' etc.
            </p>
    ";
}

function meta_box_noticia_dstq_3_expressao_chave_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['expressao-chave'])) {
        update_post_meta(
                $post_id,
                'expressao-chave',
                $_POST['expressao-chave']
        );
    }
}

// Campo: Imagem
function meta_box_noticia_dstq_3_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_dstq_3_imagem_id",
            "Imagem",
            "meta_box_noticia_dstq_3_imagem",
            "noticia_dstq_3",
            "normal",
            "high"
    );
}

function meta_box_noticia_dstq_3_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 190 pixels<br>
                ALTURA: 193 pixels
            </p>
    ";
}

function meta_box_noticia_dstq_3_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_noticia_dstq_3_criar");
add_action("add_meta_boxes", "meta_box_noticia_dstq_3_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_dstq_3_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_dstq_3_imagem_adicionar");
add_action("save_post", "meta_box_noticia_dstq_3_imagem_salvar");

// post_type: noticia
function post_type_noticia_criar() {
    $labels = array(
            "name" => _x("Notícia Comum", "post type general name"),
            "singular_name" => _x("Notícia Comum", "post type singular name"),
            "add_new" => _x("Adicionar Notícia", "jornal"),
            "add_new_item" => __("Adicionar Nova Notícia"),
            "edit_item" => __("Editar Notícia"),
            "new_item" => __("Nova Notícia"),
            "all_items" => __("Todas as Notícias"),
            "view_item" => __("Ver Notícia"),
            "search_items" => __("Buscar Notícias"),
            "not_found" => __("Nenhuma Notícia Encontrada"),
            "not_found_in_trash" => __("Nenhuma Notícia Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Notícia Comum"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-text",
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    $rewrite = array(
            'front'=> 'noticia',
            'structure'=>'%year%/%monthnum%/%day%/%noticia%'
    );

    register_post_type_com_rewrite_rules("noticia", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_expressao_chave",
            "noticia",
            "normal",
            "high"
    );
}

function meta_box_noticia_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["expressao-chave"]) ? esc_attr($campos["expressao-chave"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='expressao-chave'>Expressão-chave (ficará posicionada acima do título): </label><br>
                <input style='width: 100%;' type='text' name='expressao-chave' id='expressao-chave' value='$conteudo'><br><br>
                Dê preferência a expressões únicas, como: 'Cultura na cidade', 'Novos horizontes', 'Mauá melhor' etc.
            </p>
    ";
}

function meta_box_noticia_expressao_chave_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['expressao-chave'])) {
        update_post_meta(
                $post_id,
                'expressao-chave',
                $_POST['expressao-chave']
        );
    }
}

// Campo: Imagem
function meta_box_noticia_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_imagem_id",
            "Imagem",
            "meta_box_noticia_imagem",
            "noticia",
            "normal",
            "high"
    );
}

function meta_box_noticia_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES APROXIMADAS:<br><br>
                LARGURA: 302 pixels<br>
                ALTURA: 266 pixels
            </p>
    ";
}

function meta_box_noticia_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

add_action("init", "post_type_noticia_criar");
add_action("add_meta_boxes", "meta_box_noticia_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_imagem_adicionar");
add_action("save_post", "meta_box_noticia_imagem_salvar");

// post_type: pub_302_x_285
function post_type_pub_302_x_285_criar() {
    $labels = array(
            "name" => _x("Publicidade 302 x 285", "post type general name"),
            "singular_name" => _x("Publicidade 302 x 285", "post type singular name"),
            "add_new" => _x("Adicionar Publicidade", "jornal"),
            "add_new_item" => __("Adicionar Nova Publicidade"),
            "edit_item" => __("Editar Publicidade"),
            "new_item" => __("Nova Publicidade"),
            "all_items" => __("Todas as Publicidades"),
            "view_item" => __("Ver Publicidade"),
            "search_items" => __("Buscar Publicidades"),
            "not_found" => __("Nenhuma Publicidade Encontrada"),
            "not_found_in_trash" => __("Nenhuma Publicidade Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Publicidade 302 x 285"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-megaphone",
            "supports" => array(
                "title",
                "editor"
            )
    );

    register_post_type("pub_302_x_285", $args);
}

// Campo: Link
function meta_box_pub_302_x_285_link_adicionar() {
    add_meta_box(
            "meta_box_pub_302_x_285_expressao_chave_id",
            "Website do cliente",
            "meta_box_pub_302_x_285_expressao_chave",
            "pub_302_x_285",
            "normal",
            "high"
    );
}

function meta_box_pub_302_x_285_expressao_chave() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["link"]) ? esc_attr($campos["link"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='link'>Link do website: </label><br>
                <input style='width: 100%;' type='text' name='link' id='link' value='$conteudo'>
            </p>
    ";
}

function meta_box_pub_302_x_285_link_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['link'])) {
        update_post_meta(
                $post_id,
                'link',
                $_POST['link']
        );
    }
}

// Campo: Imagem
function meta_box_pub_302_x_285_imagem_adicionar() {
    add_meta_box(
            "meta_box_pub_302_x_285_imagem_id",
            "Imagem",
            "meta_box_pub_302_x_285_imagem",
            "pub_302_x_285",
            "normal",
            "high"
    );
}

function meta_box_pub_302_x_285_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES:<br><br>
                LARGURA: 302 pixels<br>
                ALTURA: 285 pixels
            </p>
    ";
}

function meta_box_pub_302_x_285_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

// Campo: Object (swf)
function meta_box_pub_302_x_285_object_adicionar() {
    add_meta_box(
            "meta_box_pub_302_x_285_object_id",
            "Objeto Flash",
            "meta_box_pub_302_x_285_object",
            "pub_302_x_285",
            "normal",
            "high"
    );
}

function meta_box_pub_302_x_285_object() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["object"]) ? esc_attr($campos["object"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='object'>Link para arquivo .swf: </label><br>
                <input style='width: 100%;' type='text' name='object' id='object' value='$conteudo'><br><br>
                O arquivo deve possuir as DIMENSÕES:<br><br>
                LARGURA: 302 pixels<br>
                ALTURA: 285 pixels
            </p>
    ";
}

function meta_box_pub_302_x_285_object_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['object'])) {
        update_post_meta(
                $post_id,
                'object',
                $_POST['object']
        );
    }
}

add_action("init", "post_type_pub_302_x_285_criar");
add_action("add_meta_boxes", "meta_box_pub_302_x_285_link_adicionar");
add_action("save_post", "meta_box_pub_302_x_285_link_salvar");
add_action("add_meta_boxes", "meta_box_pub_302_x_285_imagem_adicionar");
add_action("save_post", "meta_box_pub_302_x_285_imagem_salvar");
add_action("add_meta_boxes", "meta_box_pub_302_x_285_object_adicionar");
add_action("save_post", "meta_box_pub_302_x_285_object_salvar");

// post_type: pub_350_x_200
function post_type_pub_350_x_200_criar() {
    $labels = array(
            "name" => _x("Publicidade 350 x 200", "post type general name"),
            "singular_name" => _x("Publicidade 350 x 200", "post type singular name"),
            "add_new" => _x("Adicionar Publicidade", "jornal"),
            "add_new_item" => __("Adicionar Nova Publicidade"),
            "edit_item" => __("Editar Publicidade"),
            "new_item" => __("Nova Publicidade"),
            "all_items" => __("Todas as Publicidades"),
            "view_item" => __("Ver Publicidade"),
            "search_items" => __("Buscar Publicidades"),
            "not_found" => __("Nenhuma Publicidade Encontrada"),
            "not_found_in_trash" => __("Nenhuma Publicidade Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Publicidade 350 x 200"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-megaphone",
            "supports" => array(
                "title",
                "editor"
            )
    );

    register_post_type("pub_350_x_200", $args);
}

// Campo: Link
function meta_box_pub_350_x_200_link_adicionar() {
    add_meta_box(
            "meta_box_pub_350_x_200_link_id",
            "Website do cliente",
            "meta_box_pub_350_x_200_link",
            "pub_350_x_200",
            "normal",
            "high"
    );
}

function meta_box_pub_350_x_200_link() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["link"]) ? esc_attr($campos["link"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='link'>Link do website: </label><br>
                <input style='width: 100%;' type='text' name='link' id='link' value='$conteudo'>
            </p>
    ";
}

function meta_box_pub_350_x_200_link_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['link'])) {
        update_post_meta(
                $post_id,
                'link',
                $_POST['link']
        );
    }
}

// Campo: Imagem
function meta_box_pub_350_x_200_imagem_adicionar() {
    add_meta_box(
            "meta_box_pub_350_x_200_imagem_id",
            "Imagem",
            "meta_box_pub_350_x_200_imagem",
            "pub_350_x_200",
            "normal",
            "high"
    );
}

function meta_box_pub_350_x_200_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES:<br><br>
                LARGURA: 350 pixels<br>
                ALTURA: 200 pixels
            </p>
    ";
}

function meta_box_pub_350_x_200_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

// Campo: Object (swf)
function meta_box_pub_350_x_200_object_adicionar() {
    add_meta_box(
            "meta_box_pub_350_x_200_object_id",
            "Objeto Flash",
            "meta_box_pub_350_x_200_object",
            "pub_350_x_200",
            "normal",
            "high"
    );
}

function meta_box_pub_350_x_200_object() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["object"]) ? esc_attr($campos["object"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='object'>Link para arquivo .swf: </label><br>
                <input style='width: 100%;' type='text' name='object' id='object' value='$conteudo'><br><br>
                O arquivo deve possuir as DIMENSÕES:<br><br>
                LARGURA: 350 pixels<br>
                ALTURA: 200 pixels
            </p>
    ";
}

function meta_box_pub_350_x_200_object_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['object'])) {
        update_post_meta(
                $post_id,
                'object',
                $_POST['object']
        );
    }
}

add_action("init", "post_type_pub_350_x_200_criar");
add_action("add_meta_boxes", "meta_box_pub_350_x_200_link_adicionar");
add_action("save_post", "meta_box_pub_350_x_200_link_salvar");
add_action("add_meta_boxes", "meta_box_pub_350_x_200_imagem_adicionar");
add_action("save_post", "meta_box_pub_350_x_200_imagem_salvar");
add_action("add_meta_boxes", "meta_box_pub_350_x_200_object_adicionar");
add_action("save_post", "meta_box_pub_350_x_200_object_salvar");

// post_type: pub_190_x_193
function post_type_pub_190_x_193_criar() {
    $labels = array(
            "name" => _x("Publicidade 190 x 193", "post type general name"),
            "singular_name" => _x("Publicidade 190 x 193", "post type singular name"),
            "add_new" => _x("Adicionar Publicidade", "jornal"),
            "add_new_item" => __("Adicionar Nova Publicidade"),
            "edit_item" => __("Editar Publicidade"),
            "new_item" => __("Nova Publicidade"),
            "all_items" => __("Todas as Publicidades"),
            "view_item" => __("Ver Publicidade"),
            "search_items" => __("Buscar Publicidades"),
            "not_found" => __("Nenhuma Publicidade Encontrada"),
            "not_found_in_trash" => __("Nenhuma Publicidade Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Publicidade 190 x 193"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-megaphone",
            "supports" => array(
                "title",
                "editor"
            )
    );

    register_post_type("pub_190_x_193", $args);
}

// Campo: Link
function meta_box_pub_190_x_193_link_adicionar() {
    add_meta_box(
            "meta_box_pub_190_x_193_link_id",
            "Website do cliente",
            "meta_box_pub_190_x_193_link",
            "pub_190_x_193",
            "normal",
            "high"
    );
}

function meta_box_pub_190_x_193_link() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["link"]) ? esc_attr($campos["link"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='link'>Link do website: </label><br>
                <input style='width: 100%;' type='text' name='link' id='link' value='$conteudo'>
            </p>
    ";
}

function meta_box_pub_190_x_193_link_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['link'])) {
        update_post_meta(
                $post_id,
                'link',
                $_POST['link']
        );
    }
}

// Campo: Imagem
function meta_box_pub_190_x_193_imagem_adicionar() {
    add_meta_box(
            "meta_box_pub_190_x_193_imagem_id",
            "Imagem",
            "meta_box_pub_190_x_193_imagem",
            "pub_190_x_193",
            "normal",
            "high"
    );
}

function meta_box_pub_190_x_193_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES:<br><br>
                LARGURA: 190 pixels<br>
                ALTURA: 193 pixels
            </p>
    ";
}

function meta_box_pub_190_x_193_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

// Campo: Object (swf)
function meta_box_pub_190_x_193_object_adicionar() {
    add_meta_box(
            "meta_box_pub_190_x_193_object_id",
            "Objeto Flash",
            "meta_box_pub_190_x_193_object",
            "pub_190_x_193",
            "normal",
            "high"
    );
}

function meta_box_pub_190_x_193_object() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["object"]) ? esc_attr($campos["object"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='object'>Link para arquivo .swf: </label><br>
                <input style='width: 100%;' type='text' name='object' id='object' value='$conteudo'><br><br>
                O arquivo deve possuir as DIMENSÕES:<br><br>
                LARGURA: 350 pixels<br>
                ALTURA: 200 pixels
            </p>
    ";
}

function meta_box_pub_190_x_193_object_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['object'])) {
        update_post_meta(
                $post_id,
                'object',
                $_POST['object']
        );
    }
}

add_action("init", "post_type_pub_190_x_193_criar");
add_action("add_meta_boxes", "meta_box_pub_190_x_193_link_adicionar");
add_action("save_post", "meta_box_pub_190_x_193_link_salvar");
add_action("add_meta_boxes", "meta_box_pub_190_x_193_imagem_adicionar");
add_action("save_post", "meta_box_pub_190_x_193_imagem_salvar");
add_action("add_meta_boxes", "meta_box_pub_190_x_193_object_adicionar");
add_action("save_post", "meta_box_pub_190_x_193_object_salvar");

// post_type: pub_210_x_130
function post_type_pub_210_x_130_criar() {
    $labels = array(
            "name" => _x("Publicidade 210 x 130", "post type general name"),
            "singular_name" => _x("Publicidade 210 x 130", "post type singular name"),
            "add_new" => _x("Adicionar Publicidade", "jornal"),
            "add_new_item" => __("Adicionar Nova Publicidade"),
            "edit_item" => __("Editar Publicidade"),
            "new_item" => __("Nova Publicidade"),
            "all_items" => __("Todas as Publicidades"),
            "view_item" => __("Ver Publicidade"),
            "search_items" => __("Buscar Publicidades"),
            "not_found" => __("Nenhuma Publicidade Encontrada"),
            "not_found_in_trash" => __("Nenhuma Publicidade Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Publicidade 210 x 130"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-megaphone",
            "supports" => array(
                "title",
                "editor"
            )
    );

    register_post_type("pub_210_x_130", $args);
}

// Campo: Link
function meta_box_pub_210_x_130_link_adicionar() {
    add_meta_box(
            "meta_box_pub_210_x_130_link_id",
            "Website do cliente",
            "meta_box_pub_210_x_130_link",
            "pub_210_x_130",
            "normal",
            "high"
    );
}

function meta_box_pub_210_x_130_link() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["link"]) ? esc_attr($campos["link"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='link'>Link do website: </label><br>
                <input style='width: 100%;' type='text' name='link' id='link' value='$conteudo'>
            </p>
    ";
}

function meta_box_pub_210_x_130_link_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['link'])) {
        update_post_meta(
                $post_id,
                'link',
                $_POST['link']
        );
    }
}

// Campo: Imagem
function meta_box_pub_210_x_130_imagem_adicionar() {
    add_meta_box(
            "meta_box_pub_210_x_130_imagem_id",
            "Imagem",
            "meta_box_pub_210_x_130_imagem",
            "pub_210_x_130",
            "normal",
            "high"
    );
}

function meta_box_pub_210_x_130_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES:<br><br>
                LARGURA: 210 pixels<br>
                ALTURA: 130 pixels
            </p>
    ";
}

function meta_box_pub_210_x_130_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

// Campo: Object (swf)
function meta_box_pub_210_x_130_object_adicionar() {
    add_meta_box(
            "meta_box_pub_210_x_130_object_id",
            "Objeto Flash",
            "meta_box_pub_210_x_130_object",
            "pub_210_x_130",
            "normal",
            "high"
    );
}

function meta_box_pub_210_x_130_object() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["object"]) ? esc_attr($campos["object"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='object'>Link para arquivo .swf: </label><br>
                <input style='width: 100%;' type='text' name='object' id='object' value='$conteudo'><br><br>
                O arquivo deve possuir as DIMENSÕES:<br><br>
                LARGURA: 210 pixels<br>
                ALTURA: 130 pixels
            </p>
    ";
}

function meta_box_pub_210_x_130_object_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['object'])) {
        update_post_meta(
                $post_id,
                'object',
                $_POST['object']
        );
    }
}

add_action("init", "post_type_pub_210_x_130_criar");
add_action("add_meta_boxes", "meta_box_pub_210_x_130_link_adicionar");
add_action("save_post", "meta_box_pub_210_x_130_link_salvar");
add_action("add_meta_boxes", "meta_box_pub_210_x_130_imagem_adicionar");
add_action("save_post", "meta_box_pub_210_x_130_imagem_salvar");
add_action("add_meta_boxes", "meta_box_pub_210_x_130_object_adicionar");
add_action("save_post", "meta_box_pub_210_x_130_object_salvar");

// post_type: pub_223_x_200
function post_type_pub_223_x_200_criar() {
    $labels = array(
            "name" => _x("Publicidade 223 x 200", "post type general name"),
            "singular_name" => _x("Publicidade 223 x 200", "post type singular name"),
            "add_new" => _x("Adicionar Publicidade", "jornal"),
            "add_new_item" => __("Adicionar Nova Publicidade"),
            "edit_item" => __("Editar Publicidade"),
            "new_item" => __("Nova Publicidade"),
            "all_items" => __("Todas as Publicidades"),
            "view_item" => __("Ver Publicidade"),
            "search_items" => __("Buscar Publicidades"),
            "not_found" => __("Nenhuma Publicidade Encontrada"),
            "not_found_in_trash" => __("Nenhuma Publicidade Encontrada na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Publicidade 223 x 200"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-megaphone",
            "supports" => array(
                "title",
                "editor"
            )
    );

    register_post_type("pub_223_x_200", $args);
}

// Campo: Link
function meta_box_pub_223_x_200_link_adicionar() {
    add_meta_box(
            "meta_box_pub_223_x_200_link_id",
            "Website do cliente",
            "meta_box_pub_223_x_200_link",
            "pub_223_x_200",
            "normal",
            "high"
    );
}

function meta_box_pub_223_x_200_link() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["link"]) ? esc_attr($campos["link"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='link'>Link do website: </label><br>
                <input style='width: 100%;' type='text' name='link' id='link' value='$conteudo'>
            </p>
    ";
}

function meta_box_pub_223_x_200_link_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['link'])) {
        update_post_meta(
                $post_id,
                'link',
                $_POST['link']
        );
    }
}

// Campo: Imagem
function meta_box_pub_223_x_200_imagem_adicionar() {
    add_meta_box(
            "meta_box_pub_223_x_200_imagem_id",
            "Imagem",
            "meta_box_pub_223_x_200_imagem",
            "pub_223_x_200",
            "normal",
            "high"
    );
}

function meta_box_pub_223_x_200_imagem() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["imagem"]) ? esc_attr($campos["imagem"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='imagem'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='imagem' id='imagem' value='$conteudo'><br><br>
                A imagem deve possuir as DIMENSÕES:<br><br>
                LARGURA: 223 pixels<br>
                ALTURA: 200 pixels
            </p>
    ";
}

function meta_box_pub_223_x_200_imagem_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['imagem'])) {
        update_post_meta(
                $post_id,
                'imagem',
                $_POST['imagem']
        );
    }
}

// Campo: Object (swf)
function meta_box_pub_223_x_200_object_adicionar() {
    add_meta_box(
            "meta_box_pub_223_x_200_object_id",
            "Objeto Flash",
            "meta_box_pub_223_x_200_object",
            "pub_223_x_200",
            "normal",
            "high"
    );
}

function meta_box_pub_223_x_200_object() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["object"]) ? esc_attr($campos["object"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='object'>Link para arquivo .swf: </label><br>
                <input style='width: 100%;' type='text' name='object' id='object' value='$conteudo'><br><br>
                O arquivo deve possuir as DIMENSÕES:<br><br>
                LARGURA: 223 pixels<br>
                ALTURA: 200 pixels
            </p>
    ";
}

function meta_box_pub_223_x_200_object_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['object'])) {
        update_post_meta(
                $post_id,
                'object',
                $_POST['object']
        );
    }
}

add_action("init", "post_type_pub_223_x_200_criar");
add_action("add_meta_boxes", "meta_box_pub_223_x_200_link_adicionar");
add_action("save_post", "meta_box_pub_223_x_200_link_salvar");
add_action("add_meta_boxes", "meta_box_pub_223_x_200_imagem_adicionar");
add_action("save_post", "meta_box_pub_223_x_200_imagem_salvar");
add_action("add_meta_boxes", "meta_box_pub_223_x_200_object_adicionar");
add_action("save_post", "meta_box_pub_223_x_200_object_salvar");

// post_type: fatos_e_fotos
function post_type_fatos_e_fotos_criar() {
    $labels = array(
            "name" => _x("Fatos e Fotos", "post type general name"),
            "singular_name" => _x("Fatos e Fotos", "post type singular name"),
            "add_new" => _x("Adicionar Evento", "jornal"),
            "add_new_item" => __("Adicionar Novo Evento"),
            "edit_item" => __("Editar Evento"),
            "new_item" => __("Novo Evento"),
            "all_items" => __("Todos os Eventos"),
            "view_item" => __("Ver Evento"),
            "search_items" => __("Buscar Evento"),
            "not_found" => __("Nenhum Evento Encontrado"),
            "not_found_in_trash" => __("Nenhum Evento Encontrado na Lixeira"),
            "parent_item_colon" => "",
            "menu_name" => "Fatos e Fotos"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => false,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 10,
            "menu_icon" => "dashicons-format-gallery",
            "supports" => array(
                "title",
                "editor"
            )
    );

    $rewrite = array(
            'front'=> 'evento',
            'structure'=>'%year%/%monthnum%/%day%/%fatos_e_fotos%'
    );

    register_post_type_com_rewrite_rules("fatos_e_fotos", $args, $rewrite);
}

// Campo: Capa (fundo, imagem maior)
function meta_box_fatos_e_fotos_imagem_maior_adicionar() {
    add_meta_box(
            "meta_box_fatos_e_fotos_imagem_maior_id",
            "Capa (IMAGEM MAIOR)",
            "meta_box_fatos_e_fotos_imagem_maior",
            "fatos_e_fotos",
            "normal",
            "high"
    );
}

function meta_box_fatos_e_fotos_imagem_maior() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["capa_fundo_imagem_maior"]) ? esc_attr($campos["capa_fundo_imagem_maior"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='capa_fundo_imagem_maior'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='capa_fundo_imagem_maior' id='capa_fundo_imagem_maior' value='$conteudo'><br>
            </p>
    ";
}

function meta_box_fatos_e_fotos_imagem_maior_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['capa_fundo_imagem_maior'])) {
        update_post_meta(
                $post_id,
                'capa_fundo_imagem_maior',
                $_POST['capa_fundo_imagem_maior']
        );
    }
}

// Campo: Capa (fundo, imagem menor)
function meta_box_fatos_e_fotos_imagem_menor_adicionar() {
    add_meta_box(
            "meta_box_fatos_e_fotos_imagem_menor_id",
            "Capa (IMAGEM MENOR)",
            "meta_box_fatos_e_fotos_imagem_menor",
            "fatos_e_fotos",
            "normal",
            "high"
    );
}

function meta_box_fatos_e_fotos_imagem_menor() {
    $campos = get_post_custom($post -> ID);
    $conteudo = isset($campos["capa_fundo_imagem_menor"]) ? esc_attr($campos["capa_fundo_imagem_menor"][0]) : "";

    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

    echo "
            <p>
                <label for='capa_fundo_imagem_menor'>Link para a imagem: </label><br>
                <input style='width: 100%;' type='text' name='capa_fundo_imagem_menor' id='capa_fundo_imagem_menor' value='$conteudo'><br>
            </p>
    ";
}

function meta_box_fatos_e_fotos_imagem_menor_salvar($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['capa_fundo_imagem_menor'])) {
        update_post_meta(
                $post_id,
                'capa_fundo_imagem_menor',
                $_POST['capa_fundo_imagem_menor']
        );
    }
}

add_action("init", "post_type_fatos_e_fotos_criar");
add_action("add_meta_boxes", "meta_box_fatos_e_fotos_imagem_maior_adicionar");
add_action("save_post", "meta_box_fatos_e_fotos_imagem_maior_salvar");
add_action("add_meta_boxes", "meta_box_fatos_e_fotos_imagem_menor_adicionar");
add_action("save_post", "meta_box_fatos_e_fotos_imagem_menor_salvar");

// Funções gerais
function categorias_sem_title($categoria) {
    $args = array(
            "orderby" => "name",
            "hide_empty" => 0,
            "echo" => 0,
            "title_li" => "",
            "child_of" => get_cat_ID($categoria)
    );
    $cats = wp_list_categories($args);
    $cats = preg_replace('/title=\"(.*?)\"/', "", $cats); // Remove atributo title
    return $cats;
}

function categoria_noticia() {
  $categorias = get_the_category();
  return $categorias[1] -> name;
}

function limitar_caracteres_titulos() {
  global $current_screen;
  $tipo_post = $current_screen -> post_type;
  $scripts = get_template_directory_uri() . "\/scripts\/scripts.js";
  $limites = array(
      0 => array("destaque_3_itens", 40),
      1 => array("destaque_1_item", 50),
      2 => array("destaque_2_itens", 40),
      3 => array("outros_destaques", 70),
      4 => array("noticia_destacada", 45),
      5 => array("noticia_dstq_2", 40),
      6 => array("noticia_dstq_3", 30),
      7 => array("noticia", 70),
      8 => array("fatos_e_fotos", 40)
  );

  echo "<script src='$scripts'></script>";

  for ($i = 0; $i <= count($limites); $i += 1) {
    if ($tipo_post == $limites[$i][0]) {
      echo "
        <script>
          window.onload = function () {
            Portal.apps.limitarCaracteresTitulos(" . $limites[$i][1] . ");
          };
        </script>";
    }
  }
}

add_action('admin_footer', 'limitar_caracteres_titulos');

?>

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

// post_type: noticia_destaque_esquerda
function post_type_noticia_destaque_esquerda_criar() {
    $labels = array(
            "name" => _x("Notícia Destaque [esquerda]", "post type general name"),
            "singular_name" => _x("Notícia Destaque [esquerda]", "post type singular name"),
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
            "menu_name" => "Notícia Destaque [esquerda]"
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
            'front'=> 'destaque',
            'structure'=>'%day%/%monthnum%/%year%/%destaque_esquerda%'
    );

    register_post_type_com_rewrite_rules("destaque_esquerda", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_destaque_esquerda_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_esquerda_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_destaque_esquerda_expressao_chave",
            "destaque_esquerda",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_esquerda_expressao_chave() {
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

function meta_box_noticia_destaque_esquerda_expressao_chave_salvar($post_id) {
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
function meta_box_noticia_destaque_esquerda_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_esquerda_imagem_id",
            "Imagem",
            "meta_box_noticia_destaque_esquerda_imagem",
            "destaque_esquerda",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_esquerda_imagem() {
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

function meta_box_noticia_destaque_esquerda_imagem_salvar($post_id) {
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

add_action("init", "post_type_noticia_destaque_esquerda_criar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_esquerda_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_destaque_esquerda_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_esquerda_imagem_adicionar");
add_action("save_post", "meta_box_noticia_destaque_esquerda_imagem_salvar");

// post_type: noticia_destaque_centro
function post_type_noticia_destaque_centro_criar() {
    $labels = array(
            "name" => _x("Notícia Destaque [centro]", "post type general name"),
            "singular_name" => _x("Notícia Destaque [centro]", "post type singular name"),
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
            "menu_name" => "Notícia Destaque [centro]"
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
            'front'=> 'destaque',
            'structure'=>'%day%/%monthnum%/%year%/%destaque_centro%'
    );

    register_post_type_com_rewrite_rules("destaque_centro", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_destaque_centro_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_centro_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_destaque_centro_expressao_chave",
            "destaque_centro",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_centro_expressao_chave() {
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

function meta_box_noticia_destaque_centro_expressao_chave_salvar($post_id) {
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
function meta_box_noticia_destaque_centro_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_centro_imagem_id",
            "Imagem",
            "meta_box_noticia_destaque_centro_imagem",
            "destaque_centro",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_centro_imagem() {
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

function meta_box_noticia_destaque_centro_imagem_salvar($post_id) {
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

add_action("init", "post_type_noticia_destaque_centro_criar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_centro_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_destaque_centro_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_centro_imagem_adicionar");
add_action("save_post", "meta_box_noticia_destaque_centro_imagem_salvar");

// post_type: noticia_destaque_direita
function post_type_noticia_destaque_direita_criar() {
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
            'front'=> 'destaque',
            'structure'=>'%day%/%monthnum%/%year%/%destaque_direita%'
    );

    register_post_type_com_rewrite_rules("destaque_direita", $args, $rewrite);
}

// Campo: Expressão-chave
function meta_box_noticia_destaque_direita_expressao_chave_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_direita_expressao_chave_id",
            "Expressão-chave",
            "meta_box_noticia_destaque_direita_expressao_chave",
            "destaque_direita",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_direita_expressao_chave() {
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

function meta_box_noticia_destaque_direita_expressao_chave_salvar($post_id) {
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
function meta_box_noticia_destaque_direita_imagem_adicionar() {
    add_meta_box(
            "meta_box_noticia_destaque_direita_imagem_id",
            "Imagem",
            "meta_box_noticia_destaque_direita_imagem",
            "destaque_direita",
            "normal",
            "high"
    );
}

function meta_box_noticia_destaque_direita_imagem() {
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

function meta_box_noticia_destaque_direita_imagem_salvar($post_id) {
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

add_action("init", "post_type_noticia_destaque_direita_criar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_direita_expressao_chave_adicionar");
add_action("save_post", "meta_box_noticia_destaque_direita_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_noticia_destaque_direita_imagem_adicionar");
add_action("save_post", "meta_box_noticia_destaque_direita_imagem_salvar");

// post_type: outros_destaques
function post_type_outros_destaques_criar() {
    $labels = array(
            "name" => _x("Notícia Destaque [outros]", "post type general name"),
            "singular_name" => _x("Notícia Destaque [outros]", "post type singular name"),
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
            "menu_name" => "Notícia Destaque [outros]"
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
            'front'=> 'outros-destaques',
            'structure'=>'%day%/%monthnum%/%year%/%outros_destaques%'
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
function meta_box_pub_302_x_285_expressao_chave_adicionar() {
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

function meta_box_pub_302_x_285_expressao_chave_salvar($post_id) {
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
add_action("add_meta_boxes", "meta_box_pub_302_x_285_expressao_chave_adicionar");
add_action("save_post", "meta_box_pub_302_x_285_expressao_chave_salvar");
add_action("add_meta_boxes", "meta_box_pub_302_x_285_imagem_adicionar");
add_action("save_post", "meta_box_pub_302_x_285_imagem_salvar");
add_action("add_meta_boxes", "meta_box_pub_302_x_285_object_adicionar");
add_action("save_post", "meta_box_pub_302_x_285_object_salvar");

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
?>

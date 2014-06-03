<?php
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
            "rewrite" => true,
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 5,
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
            "menu_position" => 5,
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
            "name" => _x("Notícias Destaques da Esquerda", "post type general name"),
            "singular_name" => _x("Notícia Destaque da Esquerda", "post type singular name"),
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
            "menu_name" => "Notícia Destaque da Esquerda"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => array(
                'slug' => '',
                'with_front' => false
            ),
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 5,
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    register_post_type("destaque_esquerda", $args);
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
                Imagens devem possuir as DIMENSÕES APROXIMADAS:<br><br>
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
            "name" => _x("Notícia Destaque do Centro", "post type general name"),
            "singular_name" => _x("Notícia Destaque do Centro", "post type singular name"),
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
            "menu_name" => "Notícia Destaque do Centro"
    );

    $args = array(
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "rewrite" => array(
                'slug' => '',
                'with_front' => false
            ),
            "capability_type" => "post",
            "has_archive" => true,
            "hierarchical" => false,
            "menu_position" => 5,
            "supports" => array(
                    "title",
                    "editor",
                    "author",
                    "excerpt"
            ),
            "taxonomies" => array('category')
    );

    register_post_type("destaque_centro", $args);
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
                Imagens devem possuir as DIMENSÕES APROXIMADAS:<br><br>
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
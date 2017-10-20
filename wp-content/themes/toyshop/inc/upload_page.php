<?php


/*
 * ------------------------------------------------------------------------------------------------------------------------
 * */
function demo_settings_page()
{
    add_settings_section("section", "Section", null, "import-panel");
    add_settings_section("start-section", "Section", null, "import-panel");
    add_settings_field("import-start", "Import File", "import_start", "start-section", "section");
    add_settings_field("import-file", "Import File", "demo_file_display", "import-panel", "section");
    register_setting("section", "import-file", "handle_file_upload");
}

function handle_file_upload($option)
{

    if (!empty($_FILES["import-file"]["tmp_name"])) {
        $urls = wp_handle_upload($_FILES["import-file"], array('test_form' => FALSE));

        $temp = $urls["file"];
        return $temp;
    }

    return $option;
}

function demo_file_display()
{
    ?>
    <input type="file" name="import-file"/>
    <?php echo get_option('import-file'); ?>
    <?php
}

add_action("admin_init", "demo_settings_page");


function import_start()
{
    echo get_option('import-file');
}

function theme_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Product Import</h1>

        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            settings_fields("section");

            do_settings_sections("import-panel");

            submit_button();
            ?>
        </form>

    </div>
    <?php
}

function menu_item()
{
    add_menu_page("Product Import", "Product Import", "manage_options", "import-panel", "theme_settings_page", null, 99);
    add_submenu_page("import-panel", "Start Import", "Start Import", "manage_options", "start-import", "sub_menu_page");


}

add_action("admin_menu", "menu_item");

function sub_menu_page()
{
    if (get_option('import-file') != ''):

        $myXMLData = get_option('import-file');

        if (file_exists($myXMLData)) {
            $xml = simplexml_load_file($myXMLData,null, LIBXML_NOCDATA);
            echo '<pre>';
            print_r($xml);
            echo '</pre>';
        } else {
            exit('Failed to open test.xml.');
        }

    else:
        echo 'Pleae select the import file first!';
    endif;
}

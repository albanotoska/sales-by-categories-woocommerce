<?php
/**
 * Plugin Name: Sales By Category
 * Description: Display total sales of each category on Woocommerce
 * Plugin URI: https://albanotoska.com/
 * Version: 1.0
 * Author: Albano Toska
 * Author URI: http://www.albanotoska.com
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/* ADMIN MENU */
add_action( 'admin_menu', 'sales_by_category_admin_menu' );  
function sales_by_category_admin_menu(){    
    $page_title = 'WordPress Sales by Category';   
    $menu_title = 'Sales by category';   
    $capability = 'manage_options';   
    $menu_slug  = 'sales-by-category';   
    $function   = 'display_total_sales_by_category';   
    $icon_url   = 'dashicons-products';   
    $position   = 4;    
    add_menu_page( $page_title,$menu_title,$capability,$menu_slug,$function,$icon_url,$position ); 
} 

/* DISPLAY FUNCTION */
function display_total_sales_by_category() {
echo count_orders_by_category_musicisti();
echo count_orders_by_category_cantanti();
echo count_orders_by_category_dj();
echo count_orders_by_category_club();
}

/* COUNT SALES BASED ON CATEGORY ID MUSICISTI */ 
function count_orders_by_category_musicisti() {

 ?>
<div class="container-title-button">
<h2 class="title_table">Category #1</h2>
<button id="export" class="button_download" data-export="export">Export</button></div>
<table id="order_by_categories">
    <tr>
        <th>
            Category
        </th>
        <th>
            Product
        </th>
        <th>
            Order Date
        </th> 
        <th>
            Cost
        </th>
    </tr>
  <?php
 $argso = array(
                'parent' => '',
            );
            $orders = wc_get_orders( $argso );
 $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       //Here goes parent ID
       'parent' => 176,
       'taxonomy' => 'product_cat'
    );
  $subcats = get_terms($args);
      foreach ($subcats as $sc) {

foreach ( $orders as $order ) {
   
$cat_in_order = false;
   
$items = $order->get_items();
foreach ( $items as $item ) {
    $product_id = $item['product_id']; 
    if ( has_term( $sc->name, 'product_cat', $product_id ) ) {
        $cat_in_order = true;
        ?>
        <tr>
        <td>
            <?php echo $sc->name; ?>
        </td>
        <td>
            <?php echo $item->get_name(); ?>
        </td>
        <td>
           <?php echo $order->get_date_created()->date('Y-m-d H:i:s'); ?>
        </td>
        <td>
           <?php echo $item->get_total().'€'; ?>
        </td>
         </tr> 
    <?php $totalcat = $totalcat + $item->get_total();
    }
}
} if($totalcat!=0) { ?> <tr class="total_sum">
        <td>
           <strong> Total</strong>
        </td>
        <td>
            
        </td>
        <td>
            
        </td>
        <td>
           <?php echo $totalcat.'€'; ?>
        </td>
         </tr> <?php }


$totalcat = 0;
} ?>
   </table>   <?php    
}

/* COUNT SALES BASED ON CATEGORY ID Category #2 */ 
function count_orders_by_category_cantanti() {

 ?>
 <div class="container-title-button">
<h2 class="title_table">Category #2</h2>
<button id="export_cantanti" class="button_download" data-export="export">Export</button></div>
<table id="order_by_categories" class="cantanti_table">
    <tr>
        <th>
            Category
        </th>
        <th>
            Product
        </th>
        <th>
            Order Date
        </th> 
        <th>
            Cost
        </th>
    </tr>
  <?php
 $argso = array(
                'parent' => '',
            );
            $orders = wc_get_orders( $argso );
 $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       //Here goes parent ID
       'parent' => 175,
       'taxonomy' => 'product_cat'
    );
  $subcats = get_terms($args);
      foreach ($subcats as $sc) {

foreach ( $orders as $order ) {
   
$cat_in_order = false;
   
$items = $order->get_items();
foreach ( $items as $item ) {      
    $product_id = $item['product_id']; 
    if ( has_term( $sc->name, 'product_cat', $product_id ) ) {
        $cat_in_order = true;
        ?>
        <tr>
        <td>
            <?php echo $sc->name; ?>
        </td>
        <td>
            <?php echo $item->get_name(); ?>
        </td>
        <td>
           <?php echo $order->get_date_created()->date('Y-m-d H:i:s'); ?>
        </td>
        <td>
           <?php echo $item->get_total().'€'; ?>
        </td>
         </tr> 
    <?php $totalcat = $totalcat + $item->get_total();
    }
}
} if($totalcat!=0) { ?> <tr class="total_sum">
        <td>
           <strong> Total</strong>
        </td>
        <td>
            
        </td>
        <td>
            
        </td>
        <td>
           <?php echo $totalcat.'€'; ?>
        </td>
         </tr> <?php }


$totalcat = 0;
} ?>
   </table>   <?php    
}

/* COUNT SALES BASED ON CATEGORY ID Category #3 */ 
function count_orders_by_category_dj() {

 ?>
 <div class="container-title-button">
<h2 class="title_table">Category #3</h2>
<button id="export_dj" class="button_download" data-export="export">Export</button></div>
<table id="order_by_categories" class="dj_table">
    <tr>
        <th>
            Category
        </th>
        <th>
            Product
        </th>
        <th>
            Order Date
        </th> 
        <th>
            Cost
        </th>
    </tr>
  <?php
 $argso = array(
                'parent' => '',
            );
            $orders = wc_get_orders( $argso );
 $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       //Here goes parent ID
       'parent' => 177,
       'taxonomy' => 'product_cat'
    );
  $subcats = get_terms($args);
      foreach ($subcats as $sc) {

foreach ( $orders as $order ) {
   
$cat_in_order = false;
   
$items = $order->get_items();
foreach ( $items as $item ) {      
    $product_id = $item['product_id']; 
    if ( has_term( $sc->name, 'product_cat', $product_id ) ) {
        $cat_in_order = true;
        ?>
        <tr>
        <td>
            <?php echo $sc->name; ?>
        </td>
        <td>
            <?php echo $item->get_name(); ?>
        </td>
        <td>
           <?php echo $order->get_date_created()->date('Y-m-d H:i:s'); ?>
        </td>
        <td>
           <?php echo $item->get_total().'€'; ?>
        </td>
         </tr> 
    <?php $totalcat = $totalcat + $item->get_total();
    }
}
} if($totalcat!=0) { ?> <tr class="total_sum">
        <td>
           <strong> Total</strong>
        </td>
        <td>
            
        </td>
        <td>
            
        </td>
        <td>
           <?php echo $totalcat.'€'; ?>
        </td>
         </tr> <?php }


$totalcat = 0;
} ?>
   </table>   <?php    
}

/* COUNT SALES BASED ON CATEGORY ID Category #4 */ 
function count_orders_by_category_club() {

 ?>
 <div class="container-title-button">
<h2 class="title_table">Category #4</h2>
<button id="export_club" class="button_download" data-export="export">Export</button></div>
<table id="order_by_categories"  class="club_table">
    <tr>
        <th>
            Category
        </th>
        <th>
            Product
        </th>
        <th>
            Order Date
        </th> 
        <th>
            Cost
        </th>
    </tr>
  <?php
 $argso = array(
                'parent' => '',
            );
            $orders = wc_get_orders( $argso );
 $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       //Here goes parent ID
       'parent' => 15,
       'taxonomy' => 'product_cat'
    );
  $subcats = get_terms($args);
      foreach ($subcats as $sc) {

foreach ( $orders as $order ) {

$cat_in_order = false;
   
$items = $order->get_items();
foreach ( $items as $item ) {      
    $product_id = $item['product_id']; 
    if ( has_term( $sc->name, 'product_cat', $product_id ) ) {
        $cat_in_order = true;
        ?>
        <tr>
        <td>
            <?php echo $sc->name; ?>
        </td>
        <td>
            <?php echo $item->get_name(); ?>
        </td>
        <td>
           <?php echo $order->get_date_created()->date('Y-m-d H:i:s'); ?>
        </td>
        <td>
           <?php echo $item->get_total().'€'; ?>
        </td>
         </tr> 
    <?php $totalcat = $totalcat + $item->get_total();
    }
}
} if($totalcat!=0) { ?> <tr class="total_sum">
        <td>
           <strong> Total</strong>
        </td>
        <td>
            
        </td>
        <td>
            
        </td>
        <td>
           <?php echo $totalcat.'€'; ?>
        </td>
         </tr> <?php }


$totalcat = 0;
} ?>
   </table>   <?php    
}


//ENQUE STYLES IN WP-ADMIN

function admin_style_sales_by_category() {
  wp_enqueue_style('admin-styles', plugin_dir_url( __FILE__ ).'style.css');
}
add_action('admin_enqueue_scripts', 'admin_style_sales_by_category');


//EUNQUE JQUERY FOR EXPORT FUNCTION
add_action('admin_enqueue_scripts', 'sort_by_category_styles');
function sort_by_category_styles() {
     wp_register_script( 'bs_sort_by_category_jquery_script', 'https://code.jquery.com/jquery.min.js');
    wp_enqueue_script('bs_sort_by_category_jquery_script');
    wp_register_script( 'bs_sort_by_category_table_script', plugins_url('js/table2csv.js',__FILE__ ));
    wp_enqueue_script('bs_sort_by_category_table_script');
    wp_register_script( 'bs_sort_by_category_jqueryxp_script', plugins_url('js/export.js',__FILE__ ));
    wp_enqueue_script('bs_sort_by_category_jqueryxp_script');
}
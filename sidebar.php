<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php
   // Get the post's categories
    $categories = get_the_category();
    $category_name = '';

    // Check if the post has any categories
    if (!empty($categories)) {
        // Get the first category's name (you can change this to adapt to your needs)
        $category_name = strtolower($categories[0]->name);
    }

	 // Display the appropriate sidebar based on the category name
    if ($category_name === 'particulier') {
        // Display the first sidebar
        if (is_active_sidebar('sidebar-particuliers')) {
            dynamic_sidebar('sidebar-particuliers');
        }
    } elseif ($category_name === 'professionnel') {
        // Display the second sidebar
        if (is_active_sidebar('sidebar-professionnels')) {
            dynamic_sidebar('sidebar-professionnels');
        }
    } else {
        // Default sidebar
        if (is_active_sidebar('sidebar-default')) {
            dynamic_sidebar('sidebar-default');
        }
    }
	?>

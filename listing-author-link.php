<?php

//Author Listing Archive
function custom_post_author_archive($query) {
    if ($query->is_author)
        $query->set( 'post_type', array('listing', 'post') );
    remove_action( 'pre_get_posts', 'custom_post_author_archive' );
}
add_action('pre_get_posts', 'custom_post_author_archive');

//Author Listing Archive

function listing_author_link( $content ) {
 
global $post;
 
// Detect if it is a single post with a post author
if ( is_singular( 'listing' ) && isset( $post->post_author ) ) {
 
// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );
 
// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
  
//if ( ! empty( $display_name ) )
 
$author_details = '<span><b>Productora u Organizador</b></span>';
 
// Author avatar and bio
$author_details .= '<p class="author_links"><a href="'. $user_posts .'">' . $display_name . '</a>'; 
 
// Pass all this info to post content  
$content = $content . '<footer class="property-details-col2 one-half" >' . $author_details . '</footer>';
}
return $content;
}
 
// Add our function to the post content filter 
add_action( 'the_content', 'listing_author_link' );
?>

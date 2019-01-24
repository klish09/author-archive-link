<?php

//Author Listing Archive

function listing_author_link( $content ) {
 
global $post;
 
// the code will be added only for listings
if ( is_singular( 'listing' ) && isset( $post->post_author ) ) {
 
// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );
 
// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );
 
// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
  
if ( ! empty( $display_name ) )
 
$author_details = '<span><b>Productora u Organizador</b></span>';
 
if ( ! empty( $user_description ) )
 
$author_details .= '<p class="author_details">' . nl2br( $user_description ). '</p>';
 
$author_details .= '<p class="author_links"><a href="'. $user_posts .'">' . $display_name . '</a>';    
 
// Pass all this info to post content  
$content = $content . '<footer class="property-details-col2 one-half" >' . $author_details . '</footer>';
}
return $content;
}
 
// Add our function to the post content filter 
add_action( 'the_content', 'listing_author_link' );
 
// Allow HTML in author bio section 
remove_filter('pre_user_description', 'wp_filter_kses');
?>

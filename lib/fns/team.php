<?php

function team_member_title(){
	global $post;
	$team_title = get_post_meta( $post->ID, 'team_title', true );
	if( $team_title )
		echo '<p class="team-title" style="margin-top: -1em;">' . $team_title . '</p>';
}
add_action( 'genesis_entry_header', 'team_member_title', 11 );
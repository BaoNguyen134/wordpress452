<?php
function parse_member_list($atts, $content){
	$ids = isset($atts['ids']) ? $atts['ids'] : '';
	$col = isset($atts['col']) ? $atts['col'] : '3';
	//display
	$ids = explode(",", $ids);
	$args = array(
		'post_type' => 'u_member',
		'post__in' => $ids,
		'posts_per_page' => '-1',
		'post_status' => 'publish',	
		'orderby' => 'post__in',	
		'ignore_sticky_posts' => 1,
	);
	$html = '
		<div class="row">
	';
	$item = 0;
	$the_query = new WP_Query( $args );
	if($the_query->have_posts()){
		while($the_query->have_posts()){ $the_query->the_post();
			$item++;
			$html .= '
				<div class="member-item col-md-'.$col.' ">
					<div class="member-item-inner">
						<div class="item-thumbnail">
							<a href="'.get_permalink( get_the_ID()).'" title="'.the_title_attribute('echo=0').'">';
								if(has_post_thumbnail(get_the_ID())){
									$html .= get_the_post_thumbnail( get_the_ID(), 'thumb_526x526' );
								}else{
									$thumbnail = u_get_default_image('blog-square'); 
									$html .= '
									<img src="'.$thumbnail[0].'" width="'.$thumbnail[1].'" height="'.$thumbnail[2].'" title="'.the_title_attribute('echo=0').'" alt="'.the_title_attribute('echo=0').'">';
								}
								$html .= '
							</a>
						</div>
						<div class="item-content">
							<h3 class="item-title"><a href="'.get_permalink(get_the_ID()).'" title="title" class="main-color-1-hover">'.the_title_attribute('echo=0').'</a></h3>
							<h4 class="small-text">'.get_post_meta( get_the_ID(),'u-member-pos', true ).'</h4>
							<p>'.get_the_excerpt().'</p>';
							$social_account = array(
								'facebook',
								'instagram',
								'envelope',
								'twitter',
								'linkedin',
								'tumblr',
								'google-plus',
								'pinterest',
								'youtube',
								'flickr',
								'github',
								'dribbble',
								'vk',
							);
							$html .= '
							<ul class="list-inline social-light">';
							foreach($social_account as $social){
							if($link = get_post_meta(get_the_ID(),'umb-'.$social, true )){
								if($social=='envelope'){
									$html .= '
									<li><a class="btn btn-default social-icon" href="mailto:'.$link .'"> <i class="fa fa-'.$social .'"></i></a></li>';
								} else{
									$html .= '
									<li><a class="btn btn-default social-icon" href="'.$link.'"><i class="fa fa-'.$social.'"></i></a></li>';
									  } 
								}
							} 
							$html .= '
							</ul>
						</div>
					</div>
				</div>
			';
			if($col==3 && $item%4==0){
				$html .= '
					</div>
					<div class="row">
				';
			}
			if($col==4 && $item%3==0){
				$html .= '
					</div>
					<div class="row">
				';
			}
		}
	}
	$html .= '
		</div>
	';
	
	
	wp_reset_postdata();
	return $html;

}
add_shortcode( 'member', 'parse_member_list' );
add_action( 'after_setup_theme', 'reg_member_list' );
function reg_member_list(){
	if(function_exists('wpb_map')){
		/* Register shortcode with Visual Composer */
		wpb_map( array(
		   "name" => __("Member",'cactusthemes'),
		   "base" => "member",
		   "class" => "",
		   "controls" => "full",
		   "category" => 'Content',
		   "icon" => "icon-member",
		   "params" => array(
			  array(
				 "type" => "textfield",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Ids", 'cactusthemes'),
				 "param_name" => "ids",
				 "value" =>"",
				 "description" => __("List of member Ids, separated by a comma", "cactusthemes"),
			  ),
			  array(
				 "type" => "dropdown",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Width", 'cactusthemes'),
				 "param_name" => "col",
				 "value" => array(
				 	__('3/12 width', 'cactusthemes') => 3,
					__('4/12 width', 'cactusthemes') => 4,
					__('Fullwidth', 'cactusthemes') => 12,
				 ),
				 "description" => __('Width of each member item box - select (default is 3)', "cactustheme")
			  ),

		   )
		) );
	}
}
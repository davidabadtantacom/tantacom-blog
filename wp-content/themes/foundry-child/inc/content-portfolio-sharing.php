<?php
	global $post;
	
	$url[] = '';
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
    
  
        
        <ul class="social-list list-inline">
            <li> 
                <h6 class="uppercase"><?php _e('Share The Love','foundry'); ?></h6>
            </li>
            <li>
                <a target="_blank" href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>" onClick="return ebor_facebook_<?php echo the_ID(); ?>()">
                    <i class="ti-facebook icon icon-xs"><span class="hidden">Facebook</span></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="https://twitter.com/share?original_referer=<?php the_permalink(); ?>&url=<?php echo wp_get_shortlink(); ?>&text=<?php echo get_the_title(); ?>&via=tantacom" onClick="return ebor_tweet_<?php echo the_ID(); ?>()">
                    <i class="ti-twitter-alt icon icon-xs"><span class="hidden">Twitter</span></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php echo get_the_title(); ?>&source=<?php echo get_site_url(); ?>" onClick="return ebor_linkedin_<?php echo the_ID(); ?>()">
                    <i class="ti-linkedin icon icon-xs"><span class="hidden">Linkedin</span></i>
                </a>
            </li>
            <li>
               <a href="mailto:somebody@example.com&subject=<?php echo get_the_title(); ?>&body=<?php the_permalink(); ?>" target="_blank">
                    <i class="ti-email icon icon-xs"><span class="hidden">Email</span></i>
                </a>
            </li>

        </ul>
        
    </div>
</div>

<script type="text/javascript">
    function ebor_facebook_<?php echo the_ID(); ?>() {
        window.open('https://facebook.com/sharer.php?u=<?php the_permalink(); ?>','sharer','toolbar=0,status=0,width=626,height=436');
        return false;
    }
	function ebor_tweet_<?php echo the_ID(); ?>() {
		window.open('https://twitter.com/share?original_referer=<?php the_permalink(); ?>&url=<?php echo wp_get_shortlink(); ?>&text=<?php echo get_the_title(); ?>&via=tantacom','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_linkedin_<?php echo the_ID(); ?>() {
		window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php echo get_the_title(); ?>&source=<?php echo get_site_url(); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
</script>





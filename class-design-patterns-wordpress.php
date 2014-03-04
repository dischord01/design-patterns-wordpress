<?php

/**
 *  @package 		DPWP
 *  @author         Brad Sollar <brad.sollar@arcwaveusa.com>
 *  @license		GPL-2.0+
 *  @link  			httl:arcwaveusa.com
 *  @copyright		2014 arcwaveusa
 */

/**
 *  @package        DPWP
 *	@author         Brad Sollar <brad.sollar@arcwaveusa.com>
 */

class Design_Patterns_Wordpress {

	private $twitter_handle;

	private static $instance;

	private function __construct() {
		$this->twitter_handle = 'tommcfarlin';
		add_filter( 'the_content', array( $this, 'display_twitter_follower_count'));

	}

	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

	    return self::$instance;
    }


	public function display_twitter_follower_count($content) {

		$follower_count = '';
		$follower_count = $this->get_twitter_follower_count();

		if ('' != $follower_count && -1 != $follower_count) {
			//display html
			$html = '<div class="twitter-follower-count">';
				$html .= '<span class="twitter-handle">' . $this->twitter_handle . '</span>';
				$html .= ' has ' . $follower_count . ' on Twitter. ';
			$html .= '</div>';
			
			$content .= $html;
		}

		return $content;
	}

	private function get_twitter_follower_count() {
		$follower_count = -1;
		// 1. Request the HTML from Twitter
		$response = file_get_contents('https://twitter.com' . $this->twitter_handle . '/' ); 
		// 2. Parse the markup to find the followers
		preg_match_all('#<strong\>(.+?)\<\/strong\>#', $response, $matches);
		$follower_count = $matches[1][2];
		// 3. Return the follower count, or -1 if isn't found
		return $follower_count;
	}
}




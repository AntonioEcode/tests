<?php

// Function to display RRSS in templates
function wpeb_get_rrss() {

	$linkedin_url  = get_option( 'ecode_linkedin_link' );
	$twitter_url   = get_option( 'ecode_twitter_link' );
	$facebook_url  = get_option( 'ecode_facebook_link' );
	$instagram_url = get_option( 'ecode_instagram_link' );
	$youtube_url   = get_option( 'ecode_youtube_link' );
	$pinterest_url = get_option( 'ecode_pinterest_link' );

	if( !empty( $linkedin_url ) || !empty( $twitter_url ) || !empty( $facebook_url ) || !empty( $instagram_url ) || !empty( $youtube_url ) || !empty( $pinterest_url ) ) {

?>
<div class="ecode_social">
	<?php

	if( !empty( $facebook_url ) && $facebook_url != '#' ) {

	?>
	<a href="<?php echo $facebook_url; ?>" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_facebook">
		<i>
			<svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#000000"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg>
		</i>
	</a>
	<?php

	}

	if( !empty( $twitter_url ) && $twitter_url != '#' ) {

	?>
	<a href="<?php echo $twitter_url; ?>" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_twitter">
		<i>
			<svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#000000"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg>
		</i>
	</a>
	<?php

	}

	if( !empty( $instagram_url ) && $instagram_url != '#' ) {

	?>
	<a href="<?php echo $instagram_url; ?>" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_instagram">
		<i>
			<svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#000000"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg>
		</i>
	</a>
	<?php

	}

	if( !empty( $linkedin_url ) && $linkedin_url != '#' ) {

	?>
	<a href="<?php echo $linkedin_url; ?>" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_linkedin">
		<i>
			<svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#000000"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg>
		</i>
	</a>
	<?php

	}

	if( !empty( $youtube_url ) && $youtube_url != '#' ) {

	?>
	<a href="<?php echo $youtube_url; ?>" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_youtube">
		<i>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 461.001 461.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" style="" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728  c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137  C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607  c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z" fill="#000000"></g></svg>
		</i>
	</a>
	<?php

	}

	if( !empty( $pinterest_url ) && $pinterest_url != '#' ) {

	?>
	<a href="<?php echo $pinterest_url; ?>" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_pinterest">
		<i>
			<svg width="14px" height="16px" viewBox="0 0 14 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-72.000000, -23.000000)" fill="#000000"><g transform="translate(72.000000, 23.000000)"><path d="M6.884,-5.92118946e-16 C2.498,0.000666666667 0.166666667,2.81066667 0.166666667,5.87466667 C0.166666667,7.29533333 0.960666667,9.068 2.232,9.63 C2.59466667,9.79333333 2.54666667,9.594 2.85866667,8.40066667 C2.88333333,8.30133333 2.87066667,8.21533333 2.79066667,8.12266667 C0.973333333,6.02066667 2.436,1.69933333 6.62466667,1.69933333 C12.6866667,1.69933333 11.554,10.0873333 7.67933333,10.0873333 C6.68066667,10.0873333 5.93666667,9.30333333 6.172,8.33333333 C6.45733333,7.178 7.016,5.936 7.016,5.10333333 C7.016,3.00466667 3.88933333,3.316 3.88933333,6.09666667 C3.88933333,6.956 4.19333333,7.536 4.19333333,7.536 C4.19333333,7.536 3.18733333,11.6 3.00066667,12.3593333 C2.68466667,13.6446667 3.04333333,15.7253333 3.07466667,15.9046667 C3.094,16.0033333 3.20466667,16.0346667 3.26666667,15.9533333 C3.366,15.8233333 4.582,14.0886667 4.92266667,12.8346667 C5.04666667,12.378 5.55533333,10.5246667 5.55533333,10.5246667 C5.89066667,11.13 6.85733333,11.6366667 7.88733333,11.6366667 C10.9513333,11.6366667 13.166,8.94333333 13.166,5.60133333 C13.1553333,2.39733333 10.4133333,-1.77635684e-15 6.884,-5.92118946e-16 Z"></path></g></g></g></svg>
		</i>
	</a>
	<?php

	}

	?>
</div>
<?php

	}

}

?>

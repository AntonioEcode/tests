<?php

add_filter( 'embed_oembed_html', 'oembed_iframe_overrides', 50, 4 );

function oembed_iframe_overrides( $html, $url, $attr, $post_id ) {

    if( strpos( $html, '<iframe' ) !== false ) {

        $check_url = preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $url_data );

        if( !empty( $check_url ) && !empty( $url_data ) ) {

            $display_video = '<div class="ecode_shortcode_video" data-id-video="' . $url_data[1] . '">';
                // $display_video .= '<i><svg width="100px" height="71px" viewBox="0 0 100 71" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-366.000000, -261.000000)" fill="#C4302B" fill-rule="nonzero"><g transform="translate(366.000000, 261.000000)"><path d="M79.2312815,0 L20.7687185,0 C9.29846139,0 0,9.29846139 0,20.7687185 L0,49.9938178 C0,61.4640749 9.29846139,70.7625363 20.7687185,70.7625363 L79.2312815,70.7625363 C90.7015386,70.7625363 100,61.4640749 100,49.9938178 L100,20.7687185 C100,9.29846139 90.7015386,0 79.2312815,0 Z M65.1855419,36.803174 L37.8406988,49.8450112 C37.112067,50.1925159 36.2704202,49.6612806 36.2704202,48.854124 L36.2704202,21.9552669 C36.2704202,21.1366136 37.1341928,20.6060291 37.864343,20.9760933 L65.2091861,34.8331132 C66.0221995,35.2450429 66.0080998,36.4109839 65.1855419,36.803174 Z"></path></g></g></g></svg></i>';
                $display_video .= '<i><svg width="100px" height="71px" viewBox="0 0 100 71" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-366.000000, -261.000000)" fill="#C4302B" fill-rule="nonzero"><g transform="translate(366.000000, 261.000000)"><path d="M79.2312815,0 L20.7687185,0 C9.29846139,0 0,9.29846139 0,20.7687185 L0,49.9938178 C0,61.4640749 9.29846139,70.7625363 20.7687185,70.7625363 L79.2312815,70.7625363 C90.7015386,70.7625363 100,61.4640749 100,49.9938178 L100,20.7687185 C100,9.29846139 90.7015386,0 79.2312815,0 Z M65.1855419,36.803174 L37.8406988,49.8450112 C37.112067,50.1925159 36.2704202,49.6612806 36.2704202,48.854124 L36.2704202,21.9552669 C36.2704202,21.1366136 37.1341928,20.6060291 37.864343,20.9760933 L65.2091861,34.8331132 C66.0221995,35.2450429 66.0080998,36.4109839 65.1855419,36.803174 Z"></path></g></g></g></svg></i><figure>';
                    $display_video .= '<img src="https://img.youtube.com/vi/' . $url_data[1] . '/hqdefault.jpg" alt="Video - ' . get_the_title( $post_id ) . '">';
                $display_video .= '</figure>';
            $display_video .= '</div>';

        }

        return $display_video;

    } else {

        return $html;

    }

}

?>

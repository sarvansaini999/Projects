<?php

	$parts_first = explode("/", $first_slide_image);
	$img_end_part_first = end($parts_first);
	$slide_img_title_first = basename($img_end_part_first,".jpg");
	
	if($first_slide_image_title != ""){ $slide_img_title_one = $first_slide_image_title; } else { $slide_img_title_one = $slide_img_title_first; }
	
	$parts_second = explode("/", $second_slide_image);
	$img_end_part_second = end($parts_second);
	$slide_img_title_second = basename($img_end_part_second,".jpg");
	
	if($second_slide_image_title != ""){ $slide_img_title_two = $second_slide_image_title; } else { $slide_img_title_two = $slide_img_title_second; }
	
	$parts_third = explode("/", $third_slide_image);
	$img_end_part_third = end($parts_third);
	$slide_img_title_third = basename($img_end_part_third,".jpg");
	
	if($third_slide_image_title != ""){ $slide_img_title_three = $third_slide_image_title; } else { $slide_img_title_three = $slide_img_title_third; }
	
	$parts_fourth = explode("/", $fourth_slide_image);
	$img_end_part_fourth = end($parts_fourth);
	$slide_img_title_fourth = basename($img_end_part_fourth,".jpg");
	
	if($fourth_slide_image_title != ""){ $slide_img_title_four = $fourth_slide_image_title; } else { $slide_img_title_four = $slide_img_title_fourth; }
	
	$parts_fifth = explode("/", $fifth_slide_image);
	$img_end_part_fifth = end($parts_fifth);
	$slide_img_title_fifth = basename($img_end_part_fifth,".jpg");
	
	if($fifth_slide_image_title != ""){ $slide_img_title_five = $fifth_slide_image_title; } else { $slide_img_title_five = $slide_img_title_fifth; }
	
	$parts_sixth = explode("/", $sixth_slide_image);
	$img_end_part_sixth = end($parts_sixth);
	$slide_img_title_sixth = basename($img_end_part_sixth,".jpg");
	
	if($sixth_slide_image_title != ""){ $slide_img_title_six = $sixth_slide_image_title; } else { $slide_img_title_six = $slide_img_title_sixth; }
	
	$parts_seventh = explode("/", $seventh_slide_image);
	$img_end_part_seventh = end($parts_seventh);
	$slide_img_title_seventh = basename($img_end_part_seventh,".jpg");
	
	if($seventh_slide_image_title != ""){ $slide_img_title_seven = $seventh_slide_image_title; } else { $slide_img_title_seven = $slide_img_title_seventh; }
	
	$parts_eighth = explode("/", $eighth_slide_image);
	$img_end_part_eighth = end($parts_eighth);
	$slide_img_title_eighth = basename($img_end_part_eighth,".jpg");
	
	if($eighth_slide_image_title != ""){ $slide_img_title_eight = $eighth_slide_image_title; } else { $slide_img_title_eight = $slide_img_title_eighth; }
	
	
	/*
	*  Thumb title
	*/
	
	$gallery_first_img = explode("/", $first_gallery_img);
	$thumb_end_part_first = end($gallery_first_img);
	$thumb_title_first = basename($thumb_end_part_first,".jpg");
	
	if($first_thumb_title != ""){ $thumb_title_one = $first_thumb_title; } else { $thumb_title_one = $thumb_title_first; }  
	
	$gallery_second_img = explode("/", $second_gallery_img);
	$thumb_end_part_second = end($gallery_second_img);
	$thumb_title_second = basename($thumb_end_part_second,".jpg");
	
	if($second_thumb_title != ""){ $thumb_title_two = $second_thumb_title; } else { $thumb_title_two = $thumb_title_second; }
	
	$gallery_third_img = explode("/", $third_gallery_img);
	$thumb_end_part_third = end($gallery_third_img);
	$thumb_title_third = basename($thumb_end_part_third,".jpg");
	
	if($third_thumb_title != ""){ $thumb_title_three = $third_thumb_title; } else { $thumb_title_three = $thumb_title_third; }
	
	$gallery_fourth_img = explode("/", $fourth_gallery_img);
	$thumb_end_part_fourth = end($gallery_fourth_img);
	$thumb_title_fourth = basename($thumb_end_part_fourth,".jpg");
	
	if($fourth_thumb_title != ""){ $thumb_title_four = $fourth_thumb_title; } else { $thumb_title_four = $thumb_title_fourth; }
	
	$gallery_fifth_img = explode("/", $fifth_gallery_img);
	$thumb_end_part_fifth = end($gallery_fifth_img);
	$thumb_title_fifth = basename($thumb_end_part_fifth,".jpg");
	
	if($fifth_thumb_title != ""){ $thumb_title_five = $fifth_thumb_title; } else { $thumb_title_five = $thumb_title_fifth; }
	
	$gallery_sixth_img = explode("/", $six_gallery_imgs);
	$thumb_end_part_sixth = end($gallery_sixth_img);
	$thumb_title_sixth = basename($thumb_end_part_sixth,".jpg");
	
	if($sixth_thumb_title != ""){ $thumb_title_six = $sixth_thumb_title; } else { $thumb_title_six = $thumb_title_sixth; }
	
	$gallery_seventh_img = explode("/", $seven_gallery_img);
	$thumb_end_part_seventh = end($gallery_seventh_img);
	$thumb_title_seventh = basename($thumb_end_part_seventh,".jpg");
	
	if($seventh_thumb_title != ""){ $thumb_title_seven = $seventh_thumb_title; } else { $thumb_title_seven = $thumb_title_seventh; }
	
	$gallery_eighth_img = explode("/", $eight_gallery_img);
	$thumb_end_part_eighth = end($gallery_eighth_img);
	$thumb_title_eighth = basename($thumb_end_part_eighth,".jpg");
	
	if($eighth_thumb_title != ""){ $thumb_title_eight = $eighth_thumb_title; } else { $thumb_title_eight = $thumb_title_eighth; }
	
	$gallery_ninth_img = explode("/", $nine_gallery_img);
	$thumb_end_part_ninth = end($gallery_ninth_img);
	$thumb_title_ninth = basename($thumb_end_part_ninth,".jpg");
	
	if($ninth_thumb_title != ""){ $thumb_title_nine = $ninth_thumb_title; } else { $thumb_title_nine = $thumb_title_ninth; }

?>
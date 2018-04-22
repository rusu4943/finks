<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class UploadTest extends TestCase
{
    public function testUploadImage(): void
    {
    	$img = "test_img.jpg";
    	$u = upload;
    	u->upload([$img]);
    	$this->assertEqual(
    		u->get_extention(),
    		"jpg"
    	);
    }

    public function testUploadNonImage(): void
    {
        $img = "test_txt.txt";
    	$u = upload;
    	u->upload([$img]);
    	$this->assertEqual(
    		u->get_extention(),
    		"txt"
    	);
    }
}
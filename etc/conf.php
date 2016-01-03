<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 13.07.2015
 * Time: 19:14
 */



class Constans {

    const FILE_TYPES        = 'jpg,JPG,jpeg,JPEG';
    const PATH_LOGO_LEFT    = '';
    const PATH_LOGO_RIGHT   = '';
    const PAGE_TITLE        = 'Fotobox';
    const IMAGE_HIGHT       = '840px';
    const UNIQUE_CODE_LNG   = '8';
    const PATH_UNIQUE_INF   = 'C:\bind\websrv\htdocs\fotokiste\modules\uniqueID\uniqueId.ini';
	const SERVER_DOC_ROOT   = 'C:\bind\websrv\htdocs\fotokiste';
	const UNIQUE_IMG_DIR    = 'C:/bind/websrv/htdocs/fotokiste/images/original/';
	
	
	
	public static function getDocRoot() {
		
		
		return self::SERVER_DOC_ROOT;
	}

    public static function getFileTypes() {

        return self::FILE_TYPES;

    }

    public static function getUniqueConfFile() {

        return self::PATH_UNIQUE_INF;

    }

    public static function getTitle() {

        return self::PAGE_TITLE;

    }

    public static function getImageHight() {

        return self::IMAGE_HIGHT;

    }
  public static function getUniqueCnt() {

	return self::UNIQUE_CODE_LNG;

    }
	
	public static function getUniqueImgDir() {
		return self::UNIQUE_IMG_DIR;
	}






}
<?php

/*
  *
  * Freeware PHP / JS Gallery for Photobooth - Systems. Version 1.0
  *
  * This program comes with ABSOLUTELY NO WARRANTY;
  *
Copyright (C) 2016  Lenny Linux

        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program.  If not, see <http://www.gnu.org/licenses/>.


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
<?php
function image_file_type_from_binary($binary) {
  if (
    !preg_match(
        '/\A(?:(\xff\xd8\xff)|(GIF8[79]a)|(\x89PNG\x0d\x0a)|(BM)|(\x49\x49(?:\x2a\x00|\x00\x4a))|(FORM.{4}ILBM))/',
        $binary, $hits
    )
  ) {
    return 'application/octet-stream';
  }
  $type = array (
    1 => 'image/jpeg',
    2 => 'image/gif',
    3 => 'image/png',
    4 => 'image/x-windows-bmp',
    5 => 'image/tiff',
    6 => 'image/x-ilbm',
  );
  return $type[count($hits) - 1];
}
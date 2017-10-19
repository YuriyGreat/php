<?php
declare(strict_types=1);

function createWrap():string {
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        return "<br>";
    }
    else{
        return "\n\r";  
    }
}

function printFolder(string $folder,string  $wrap):void {
    $files=scandir($folder);
    foreach($files as $file) {
        if (($file!="..") && ($file!=".")){
		$filePath=$folder.'/'.$file;
		if (is_dir($filePath)){
		    printFolder($filePath,$wrap);
		    
		}
		else{
		    echo $filePath.$wrap;
		}
	}
    }
}

$wrap= createWrap();
printFolder(__DIR__,$wrap);
 

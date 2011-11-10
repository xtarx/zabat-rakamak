<?php

if (isset($_GET["q"])) {
    readDirectory($_GET["q"]);
    unset($_GET["q"]);
}

//end of json call
function extract_numbers($string) {
    preg_match_all('/([\d]+)/', $string, $match);
    return $match[0];
}

function updateMobileNumber($mobilenumber) {
    $mobilenumber = str_replace('-', '', $mobilenumber);
    $mobilenumber = trim($mobilenumber);
//    echo 'moible # ' . $mobilenumber;
    if (strlen($mobilenumber) < 10 || strlen($mobilenumber) > 14)
        return $mobilenumber;
//  echo '</br> mobile is ' . $toCompare;
    $toCompare = substr($mobilenumber, 0, 3);
    $startsWith002 = false; //if mobile starts with 002
    $startsWithPlus2 = false; //if mobile starts with +2
    $startsWith2 = false; //if mobile starts with 2
    $wierdCharctersatBeginning = false; //if the numbers starts with 2 ,+2,002 so the $restofNumber is manually done

    if (strlen($mobilenumber) >= 11) {
//2cases 1.002 or +2 @ beging

        $wierdCharctersatBeginning = true;
        if ($toCompare == '002') {
//    echo 'i start with 002 ';
            $startsWith002 = true;
            $toCompare = substr($mobilenumber, 3, 3);
//   echo 'i will COMAPRE WITH ' . $toCompare;
            $restofNumber = substr($mobilenumber, 6);
//    echo 'REST OF # ' . $restofNumber;

            if (strlen($restofNumber) > 8) {//false number
                return $mobilenumber;
            }
        } elseif (substr($mobilenumber, 0, 2) == '+2') {
            $startsWithPlus2 = true;
            $toCompare = substr($mobilenumber, 2, 3);
            $restofNumber = substr($mobilenumber, 5);
            if (strlen($restofNumber) > 8) {//false number
                return $mobilenumber;
            }
        } elseif (substr($mobilenumber, 0, 1) == '2') {
            $startsWith2 = true;
            $toCompare = substr($mobilenumber, 1, 3);
            $restofNumber = substr($mobilenumber, 4);
            if (strlen($restofNumber) > 8) {//false number
                return $mobilenumber;
            }
        }
    }
//  echo 'am comparing woth  ' . $toCompare;
    if ($toCompare == '015') {//already 11 numbers
        if (!$startsWith002 || !$startsWithPlus2 || !$startsWith2) {
            $toCompare = substr($mobilenumber, 0, 4);
            $restofNumber = substr($mobilenumber, 4);
        }
        if ($startsWith002) {
            $toCompare = substr($mobilenumber, 3, 4);
            $restofNumber = substr($mobilenumber, 7);
        }
        if ($startsWithPlus2) {
            $toCompare = substr($mobilenumber, 2, 4);
            $restofNumber = substr($mobilenumber, 6);
        }

        if ($startsWith2) {
            $toCompare = substr($mobilenumber, 1, 4);
            $restofNumber = substr($mobilenumber, 5);
        }
    } else {
        if (!$wierdCharctersatBeginning) {
            $restofNumber = substr($mobilenumber, 3);
        }
    }
    $finalNumber = $mobilenumber;
// echo $toCompare;
    switch ($toCompare) {
//start of mobinil numbers
        case "012":
            $finalNumber = '0122' . $restofNumber;
            break;
        case "017":
            $finalNumber = '0127' . $restofNumber;
            break;
        case "018":
            $finalNumber = '0128' . $restofNumber;
            break;

        case "0150":
            $finalNumber = '0120' . $restofNumber;
            break;
//end of mibinil numbers
//start of etisalat numbers
        case "011":
            $finalNumber = $toCompare . '1' . $restofNumber;
            break;
        case "014":
            $finalNumber = '0114' . $restofNumber;
            break;
        case "0152":
            $finalNumber = '0112' . $restofNumber;
            break;
        case "0155":
            $finalNumber = '0115' . $restofNumber;
            break;

//end of etisalat numbers
//start of vodafone numbers
        case "010":
            $finalNumber = $toCompare . '0' . $restofNumber;
            break;
        case "016":
            $finalNumber = '0106' . $restofNumber;
            break;
        case "019":
            $finalNumber = '0109' . $restofNumber;
            break;

        case "0151":
            $finalNumber = '0101' . $restofNumber;
            break;
//end of vodafone numbers
    }
    if ($startsWith002) {
        $finalNumber = '002' . $finalNumber;
    } else {
        if ($startsWithPlus2) {
            $finalNumber = '+2' . $finalNumber;
        } else {
            if ($startsWith2) {
                $finalNumber = '2' . $finalNumber;
            }
        }
    }
    return $finalNumber;
}

//reading VCF using File Reader
function readVCFfile($fileName) {
    $myFile = $fileName;
    $fh = fopen($myFile, 'r');
//   print("<br>");
    $string = fread($fh, filesize($myFile));
    $str_array = preg_split('/\r\n|\r|\n/', $string);

    foreach ($str_array as $element) {
//   echo $element.'</br>';
        if (strripos($element, 'TEL;') !== false) {//make sure that it contains a number not other vcf deltails
//    echo 'true';
            $numbers_array = extract_numbers($element);
// print_r($numbers_array);
            $theNumber = "";
            foreach ($numbers_array as $number) {
                $theNumber.=$number;
            }
            echo'2-extracted # from   :</br> ' . $fileName . '# is ' . $theNumber . '</br>';
            $string = str_replace($theNumber, updateMobileNumber($theNumber), $string);
            $fp = fopen($myFile, "w");
            fwrite($fp, $string, strlen($string));
            fclose($fp);

            //  rename($file, "pictures");
            echo'3-wrote new  # to   :</br> ' . $fileName . '</br>';
        }
    }
}

/**
 *
 * @param type $dir zip
 */
function zipFiles($dir, $files) {
    $zip = new ZipArchive();
    $filename = $dir . "contacts.zip";
    if ($zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE) {
        exit("cannot open <$filename>\n");
    }
//echo'passed the condioton';
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo'4 -added to zip :</br> ' . $dir . $file . '</br>';
            //rename($file, 'example2.vcf') or die('Error renaming file.');
            $newName = iconv("windows-1256", "UTF-8", $file);
          //  $newName = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $file); 

            $zip->addFile($dir . $file, $newName);
        }
    }
    $zip->close();
    echo 'finished zipping';
}

function readDirectory($dir) {
// readVCFfile('contacts/Abd.albaset.vcf');
    if ($handle = opendir($dir)) {
//echo "Directory handle: $handle\n";
// echo "Files:\n";
        $files = array();
        $c = 0;
        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
            //  $file = mb_substr($file, mb_strrpos($file, '/') + 1);
//    echo $c . "$file" . '</br>';
            //   if ($c > 1) {
            //       echo 'am inised before STEP 1 ';
            if ($file !== '.' && $file !== '..') {
                $ext = substr($file, -3);
                if ($ext) {
                    $files[] = trim($file);
                    if (strcasecmp($ext, 'vcf') == 0) {
                        echo'1-Read  :' . $file . '</br>';
                        $file = 'new';
                        readVCFfile($dir . trim($file));
                    }
                }
            }
            //  }
            $c++;
        }
// echo 'tamam kda';
        closedir($handle);
        zipFiles($dir, $files);
    }
}

function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while ($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname . "/" . $file))
                unlink($dirname . "/" . $file);
            else
                delete_directory($dirname . '/' . $file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}

?>
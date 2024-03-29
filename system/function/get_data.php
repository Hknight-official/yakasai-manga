<?php
    // bảo vệ input
	function escape_input($input){
		global $conn;
		return mysqli_real_escape_string($conn, strip_tags(addslashes($input)));
	}
	// tạo csrf key
	function csrf(){
		return bin2hex(openssl_random_pseudo_bytes(32));
	}
	
	function client($id = ""){
		global $_SESSION, $conn;
        if (empty($id)){
            if (!empty($_SESSION['login'])){
                return $conn->query("SELECT * FROM `users` WHERE `id` = '".$_SESSION['login']."'")->fetch_assoc();
            } else {
                return false;
            }
        } else {
            return $conn->query("SELECT * FROM `users` WHERE `id` = ".$id)->fetch_assoc();
        }
		
	}
	
	function is_client($id = "") {
		global $conn;
		return $conn->query("SELECT * FROM `users` WHERE `name` = '{$id}' LIMIT 1")->num_rows > 0;
	}
	function view_comic($id = "", $date) {
		global $conn;
		$date = strtotime($date);
		$sql = "SELECT * FROM `comics_views` WHERE comic = '{$id}' AND day = ".(date("d", $date)+0)." AND month = ".(date("m", $date)+0)." AND week = ".(date("W", $date)+0)." AND year = ".date("Y", $date)." LIMIT 1";
		$query = $conn->query($sql);
		if ($query->num_rows > 0){
			return $query->fetch_assoc()['views'];
		} else {
			return 0;
		}

	}
	function comic($id = "") {
		global $conn;
		return $conn->query("SELECT * FROM `comics` WHERE id = '{$id}' LIMIT 1")->fetch_assoc();
	}

	function comic_chapters($comic_id="") {
	    global $conn;
	    $result = $conn->query("SELECT * FROM `comics_chapters` WHERE comic_id = '{$comic_id}'");
	    $chapters = [];
	    while ($row = $result->fetch_assoc()) {
	        $chapters[$row['chapter']] = $row;
        }
	    return $chapters;
    }

    function comic_chapter($comic_id="", $chapter=0) {
        global $conn;
        return $conn->query("SELECT * FROM `comics_chapters` WHERE comic_id = '{$comic_id}' AND chapter = '{$chapter}'")->fetch_assoc();
    }

	
	function translate_group($id = "") {
		global $conn;
		$sql = "SELECT * FROM `comics_group` WHERE id = '{$id}' LIMIT 1";
		return $conn->query($sql)->fetch_assoc();
	}

	function check_data_method($method, $array_key = []){
		foreach ($array_key as $key){
			if (empty($method[$key])){
				return false;
			}
		}
		return true;
	}
	function exit_data_method($method, $array_key = []){
		foreach ($array_key as $key){
			if (!isset($method[$key])){
				return false;
			}
		}
		return true;
	}
	function avatar($fbId = '', $token = ''){
		if (empty($fbId) || empty($token)){
			$fbId = client()['fid'];
			$token = client()['token'];
		}
        $json = file_get_contents('https://graph.facebook.com/v2.5/'.$fbId.'/picture?type=large&redirect=false&access_token='.$token);
        $picture = json_decode($json, true);
        return $picture['data']['url'];
	}

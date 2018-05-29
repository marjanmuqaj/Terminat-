<?php


	if (isset($_POST['key'])) {

		$conn = new mysqli('localhost', 'root', 'root', 'app');

		if ($_POST['key'] == 'getRowData') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT fullname,numri,data,ora,kapari,borgji FROM terminat WHERE id='$rowID'");
            $data = $sql->fetch_array();

			$jsonArray = array(
				'fullname' => $data['fullname'],
				'numri' => $data['numri'],
				'data' => $data['data'],
				'ora' => $data['ora'],
				'kapari' => $data['kapari'],
				'borgji' => $data['borgji'],


			);
			exit(json_encode($jsonArray));
 		}
 		if($_POST['key']=='blacklist'){
            $rowID = $conn->real_escape_string($_POST['rowID']);
            $arsyea=$conn->real_escape_string($_POST['arsyea']);
            if($sql = $conn->query("INSERT INTO blacklisttable(fullname,numri,data,ora,kapari,borgji,arsyea) 
            SELECT fullname,numri,data,ora,kapari,borgji,'$arsyea' FROM terminat WHERE id='$rowID'"))
            {
                $conn->query("DELETE FROM terminat WHERE id='$rowID'");
            }
            exit("Termini kaloi ne Listen e Zez");
        }

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT id, fullname, numri,data,ora,kapari,borgji FROM terminat LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) {
					$response .= '
						<tr>
							<td  style="text-align: center; vertical-align: middle;" >'.$data["id"].'</td>
							<td style="text-align: center; vertical-align: middle;" id="terminat_'.$data["id"].'">'.$data["fullname"].'</td>
							<td style="text-align: center; vertical-align: middle;" id="terminat_'.$data["id"].'">'.$data['ora'].'</td>
							<td style="text-align: center; vertical-align: middle;" id="terminat_'.$data["id"].'">'.$data["data"].'</td>
							<td style="text-align: center; vertical-align: middle;" id="terminat_'.$data["id"].'">'.$data["borgji"].'</td>
							<td style="text-align: center; vertical-align: middle;" id="terminat_'.$data["id"].'">'.$data["numri"].'</td>
							<td style="text-align: center; vertical-align: middle;" id="terminat_'.$data["id"].'">'.$data["kapari"].'€</td>
							<td>
							    <input type="button" onclick="viewORedit('.$data["id"].', \'edit\')" value="E" class="btn btn-primary btn-sm">
								<input type="button" onclick="blackList('.$data["id"].')" value="B" class="btn btn-warning btn-sm">
								<input type="button" onclick="deleteRow('.$data["id"].')" value="X" class="btn btn-danger btn-sm">
							</td>
						</tr>
					';
				}
				exit($response);
			} else
				exit('reachedMax');
		}
		//--------------------------------------------------------------------------------------------------------------------------------------------------------



        $rowID = $conn->real_escape_string($_POST['rowID']);

		if ($_POST['key'] == 'deleteRow') {
			$conn->query("DELETE FROM terminat WHERE id='$rowID'");
			exit('Termini u fshir me Sukeses!');
		}
		$name = $conn->real_escape_string($_POST['name']);
		$numri=$conn->real_escape_string($_POST['numri']);
        //$data=$conn->real_escape_string($_POST['data']);
        $data = strtotime($_POST["data"]);
        $data = date("d/m/Y",$data);

        $ora=$conn->real_escape_string($_POST['ora']);
		$kapari=$conn->real_escape_string($_POST['kapari']);
		//$borgji=$conn->real_escape_string($_POST['borgji']);
		$kategoria=$conn->real_escape_string($_POST['kategoria']);

		if ($_POST['key'] == 'updateRow') {
			if ($black = $conn->query("SELECT id FROM blacklisttable WHERE fullname = '$name' OR numri='$numri'"))
            {
                if ($black->num_rows > 0)
                    exit("Ky Termin eshte ne listen e zez!");
                else
                    $conn->query("UPDATE terminat SET fullname='$name', numri='$numri', data='$data', ora='$ora', kapari='$kapari',borgji='$kategoria' WHERE id='$rowID'");
                exit('success');
            }
		}
		if ($_POST['key'] == 'addNew') {
            $black = $conn->query("SELECT id FROM blacklisttable WHERE fullname = '$name' OR numri='$numri'");
            if($black->num_rows > 0)
            {
                exit("Ky Termin eshte ne listen e zez!");
            }
		    //$sql = $conn->query("SELECT id FROM terminat WHERE fullname = '$name'");
			//if ($sql->num_rows > 0)
            //{
              //  exit("Ekziston nje Termin me kete Emer!");
            //}
            else {

                    $created = date("Y-m-d H:i:s", time());
                    require 'functions.php';
                    session_start();
                    $user=$_SESSION['username'];


                    $conn->query("INSERT INTO terminat (fullname,numri,data,ora,kapari,borgji,created,users_of_created)
							VALUES ('$name','$numri','$data','$ora','$kapari','$kategoria','$created','$user')");

                    $conn->query("INSERT INTO created(fullname,numri,data,ora,kapari,borgji,created,userrr) 
							VALUES ('$name','$numri','$data','$ora','$kapari','$kategoria','$created','$user')");
                    exit('Termini u Shtua me Sukses!');

			}
		}
	}
?>
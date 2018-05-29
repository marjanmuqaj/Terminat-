<?php
if (isset($_POST['key'])) {

    $conn = new mysqli('localhost', 'root', 'root', 'app');

    if ($_POST['key'] == 'getRowData') {
        $rowID = $conn->real_escape_string($_POST['rowID']);
        $sql = $conn->query("SELECT fullname, numri,data,ora,kapari,borgji,arsyea FROM blacklisttable WHERE id='$rowID'");
        $data = $sql->fetch_array();
        $jsonArray = array(
            'fullname' => $data['fullname'],
            'numri' => $data['numri'],
            'data' => $data['data'],
            'ora' => $data['ora'],
            'kapari' => $data['kapari'],
            'borgji' => $data['borgji'],
            'arsyea'=>$data['arsyea'],


        );
        exit(json_encode($jsonArray));
    }


    if ($_POST['key'] == 'getExistingDataOfBlackList') {
        $start = $conn->real_escape_string($_POST['start']);
        $limit = $conn->real_escape_string($_POST['limit']);

        $sql = $conn->query("SELECT id, fullname, numri,data,ora,kapari,borgji,arsyea FROM blacklisttable LIMIT $start, $limit");
        if ($sql->num_rows > 0) {
            $response = "";
            while ($data = $sql->fetch_array()) {
                $response .= '
						<tr>
							<td  style="text-align: center; vertical-align: middle;" >' . $data["id"] . '</td>
							<td style="text-align: center; vertical-align: middle;" id="blacklisttable_' . $data["id"] . '">' . $data["fullname"] . '</td>
							<td style="text-align: center; vertical-align: middle;" id="blacklisttable_' . $data["id"] . '">' . $data["numri"] . '</td>
							<td style="text-align: center; vertical-align: middle;" id="blacklisttable_' . $data["id"] . '">' . $data["data"] . '</td>
							<td style="text-align: center; vertical-align: middle;" id="blacklisttable_' . $data["id"] . '">' . $data["arsyea"] . '</td>
							<td>
							    <input type="button" onclick="viewORedit(' . $data["id"] . ', \'edit\')" value="Edito T" class="btn btn-primary btn-sm">
								<input type="button" onclick="deleteRowOfBlackList(' . $data["id"] . ')" value="X" class="btn btn-danger btn-sm">
							</td>
						</tr>
					';
            }
            exit($response);
        } else
            exit('reachedMax');
    }
    if ($_POST['key'] == 'deleteblacklist') {
        $rowID = $conn->real_escape_string($_POST['rowID']);
        $conn->query("DELETE FROM blacklisttable WHERE id='$rowID'");
        exit('Termini ne Listen e Zez fshir me Sukeses!');
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
    $arsyea=$conn->real_escape_string($_POST['arsyea']);


    if ($_POST['key'] == 'updateRowIdOfBlackList') {
        $rowID = $conn->real_escape_string($_POST['rowID']);
        if ($sql = $conn->query("SELECT id FROM blacklisttable WHERE fullname = '$name'AND numri='$numri'"))
        {
            if ($sql->num_rows > 0)
                exit("Ekziston ky Termin ne Listen e zez !");
            else
                $conn->query("UPDATE blacklisttable SET fullname='$name', numri='$numri', data='$data', ora='$ora', kapari='$kapari',borgji='$kategoria',arsyea='$arsyea' 
                WHERE id='$rowID'");
            exit('success');
        }
    }
}
?>
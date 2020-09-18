<?php

$err_msg = "";
$row_array_file ="";

if(isset($_POST['search'])){
    require "conn.php";
    $company_name = $_POST["company_name"];
    $user_name = $_POST["user_name"];
    
    $pre_mysql_qry = "select * from companies_information_1 where companies_name like '$company_name';";
    $pre_result = mysqli_query($conn, $pre_mysql_qry);
    if(mysqli_num_rows($pre_result) > 0){
        $row_array_file = array();
            $i = 0;
            while ($row = mysqli_fetch_assoc ($pre_result)) {
            $row_array_file[$i] = $row;
            $i++;
            }
            print_r ($row_array_file);
	    //$mysql_qry = "select * from users_information_1 where users_id like '$user_name' and password like '$user_pass';";
	    //$result = mysqli_query($conn, $mysql_qry);
	    //if(mysqli_num_rows($result) > 0){
            /*$row_array_file = array();
            $i = 0;
            while ($row = mysqli_fetch_assoc ($result)) {
            $row_array_file[$i] = $row;
            $i++;
            }
            
            print_r ($row_array_file);
	        header('Location: http://10.20.170.52/web/mypage.php');
	        exit;
	    //echo "login success!";
	    }
	    else{
	        $err_msg = "企業ID、ユーザ名またはパスワードが間違っています";
	    //echo "login not success";
	    }*/
	}else{
	$err_msg = "検索結果なし";
	}
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ユーザ登録</title>
    </head>
    <body>

    <h2>ユーザを選択して登録してください。</h2>
    <h4>ユーザ検索欄</h4>
    <form name ="user" method = "post" autcomplete="off" action = "p_entry_user.php">
    <?php if($row_array_file !== null && $row_array_file !== ''){
            print_r ($row_array_file);
            echo '<br />';
            }else{
                echo "何もなし";
            } ?>    
    <table class = "boxall" id = "tableCondition" style="DISPLAY: block">
            <tbody>
                <tr>
                    <td width="30%" class="companyName" noWrap="nowrap" rowSpan="1">会社名</td>
                    <td width="70%" class="bottom" rowSpan="1" colSpan="1">
                        <input name ="company_name" class="default" type="text" size="60" maxLength="60"/>
                </tr>
                <tr>
                    <td width="30%" class="userName" noWrap="nowrap" rowSpan="1">ユーザ名</td>
                    <td width="70%" class="bottom" rowSpan="1" colSpan="1">
                        <input name ="user_name" class="default" type="text" size="60" maxLength="60"/>
                </tr>
                <tr>
                    <td align="right" rowSpan="1" colSpan="3">
                        <input name="search" class="button60" type="submit" value="検索"/>
                        <input name="clear" class="button60" onClick="return clearData();" type="submit" value="クリア"/>
                    </td>
                </tr>
            </tbody>
        </table>
<br />
<div align ="left" style="MARGIN-LEFT: 95px">
<table class ="list_border_bg">
    <tbody>
        <tr>
            <td align="center" class="list_title_bg" noWrap="nowrap" style="WIDTH: 30px" rowSpan="1" colSpan="1">No</td>
            <td align="center" class="list_title_bg" noWrap="nowrap" style="WIDTH: 100px" rowSpan="1" colSpan="1">会社名</td>
            <td align="center" class="list_title_bg" noWrap="nowrap" style="WIDTH: 150px" rowSpan="1" colSpan="1">ユーザ名</td>
            <td align="center" class="list_title_bg" noWrap="nowrap" style="WIDTH: 30px" rowSpan="1" colSpan="1">
            <input name="checkAll" class="default" onclick="checkAll();" type="checkbox" value="on"/>
            </td>
        </tr>
    </tbody>
</table>
</div>
    </form> 
    </body>
</html>
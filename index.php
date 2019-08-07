<?php
require('ET_Client.php');

$uid_hush = null;
$btn_type = 0;
if (isset($_REQUEST['crt']) && $_REQUEST['crt']) {
    $btn = 1;
} elseif (isset($_REQUEST['upd']) && $_REQUEST['upd']) {
    $btn = 2;
} elseif (isset($_REQUEST['del']) && $_REQUEST['del']) {
    $btn = 3;
}
if (isset($_REQUEST['uid_hush']) && $_REQUEST['uid_hush']) {
    $uid_hush = $_REQUEST['uid_hush'];
}

try {
    $myclient = new ET_Client();
    $dataExtensionExternalKey01 = getenv('PUSH_REGISTRATION_DE_EXTERNAL_KEY_01');
    $dataExtensionName01 = getenv('PUSH_REGISTRATION_DE_NAME_01');
    $dataExtensionExternalKey02 = getenv('PUSH_REGISTRATION_DE_EXTERNAL_KEY_02');
    $dataExtensionName02 = getenv('PUSH_REGISTRATION_DE_NAME_02');

    
    if ($btn == 1) {
        // 登録処理
        $dataextensionrow = new ET_DataExtension_Row();
        $dataextensionrow->authStub = $myclient;
        $dataextensionrow->Name = $dataExtensionName01;
        $dataextensionrow->props = array(
                            'TYPE'                  => $_REQUEST['TYPE'],
                            'NAME'                  => $_REQUEST['NAME'],
                            'KANA'                  => $_REQUEST['KANA'],
                            'MAIL'                  => $_REQUEST['MAIL'],
                            'TEL1'                  => $_REQUEST['TEL1'],
                            'TEL2'                  => $_REQUEST['TEL2'],
                            'POSTCODE'              => $_REQUEST['POSTCODE'],
                            'CITY'                  => $_REQUEST['CITY'],
                            'ADDRESS'               => $_REQUEST['ADDRESS'],
                            'ADDRESS_NUMBER'        => $_REQUEST['ADDRESS_NUMBER'],
                            'NEW_POSTCODE'          => $_REQUEST['NEW_POSTCODE'],
                            'NEW_CITY'              => $_REQUEST['NEW_CITY'],
                            'NEW_ADDRESS'           => $_REQUEST['NEW_ADDRESS'],
                            'NEW_ADDRESS_NUMBER'    => $_REQUEST['NEW_ADDRESS_NUMBER'],
                            'ESTIMATE_DATE'         => $_REQUEST['ESTIMATE_DATE'],
                            'MOVING_DATE1'          => $_REQUEST['MOVING_DATE1'],
                            'MOVING_DATE2'          => $_REQUEST['MOVING_DATE2'],
                            'MOVING_DATE3'          => $_REQUEST['MOVING_DATE3'],
                            'REQUEST'               => $_REQUEST['REQUEST'],
                            'FREE_DIAL'             => $_REQUEST['FREE_DIAL'],
                            'SMC_NUMBER'            => $_REQUEST['SMC_NUMBER'],
                            'UID_HUSH'              => $_REQUEST['UID_HUSH'],
                            'REG_DATE'              => $_REQUEST['REG_DATE'],
                        );
        $dataextensionrow->post();

    } elseif ($btn == 2) {
        if (!$uid_hush) {
            print('<p style="color: red; font-size: 20pt; padding: 20px;">不正なアクセスです。</p>');
        }
        // 更新処理
        $dataextensionrow = new ET_DataExtension_Row();
        $dataextensionrow->authStub = $myclient;
        $dataextensionrow->Name = $dataExtensionName01;
        $dataextensionrow->props = array(
"NameOfKeyField" => "151515151",
"ExampleField" => "SDK Example,
now Updated!"
        );
$results = $dataextensionrow->patch();
print_r($results);





    } elseif ($btn == 3) {
        if (!$uid_hush) {
            print('<p style="color: red; font-size: 20pt; padding: 20px;">不正なアクセスです。</p>');
        }
        // 削除処理
        $dataextensionrow = new ET_DataExtension_Row();
        $dataextensionrow->authStub = $myclient;
        $dataextensionrow->Name = $dataExtensionName01;
        $dataextensionrow->props = array('UID_HUSH' => $uid_hush);
        $results = $dataextensionrow->delete();
    }









?>
<html lang="ja">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Push Messaging &amp; Notifications</title>

    <link rel="icon" href="../images/favicon.ico">
    <link rel="manifest" href="manifest.json.php">
<style>
table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}
table td{
    padding: 10px 5px;
    white-space: nowrap;
}
table tr:nth-child(odd){
    background-color: #f7f7f7;
}
table th {
    padding: 10px;
    text-align: left;
    background-color: #eee;
    color: #777;
    white-space: nowrap;
}
.content_area {
    padding: 20px;
}
.list_area {
    padding: 20px;
}
.list_title {
    font-weight: bold;
    font-size: 16pt;
}
</style>

  </head>

  <body>
    <div class="content_area">
        <h1>1MCデータエクステンションの操作テスト</h1>

        <div class="list_area">
            <div class="list_title">[データエクステンション]：STIMATE_REQUEST_de</div>
            <table>
                <tr>
                    <th>更新</th>
                    <th>削除</th>
                    <th>TYPE</th>
                    <th>NAME</th>
                    <th>KANA</th>
                    <th>MAIL</th>
                    <th>TEL1</th>
                    <th>TEL2</th>
                    <th>POSTCODE</th>
                    <th>CITY</th>
                    <th>ADDRESS</th>
                    <th>ADDRESS_NUMBER</th>
                    <th>NEW_POSTCODE</th>
                    <th>NEW_CITY</th>
                    <th>NEW_ADDRESS</th>
                    <th>NEW_ADDRESS_NUMBER</th>
                    <th>ESTIMATE_DATE</th>
                    <th>MOVING_DATE1</th>
                    <th>MOVING_DATE2</th>
                    <th>MOVING_DATE3</th>
                    <th>REQUEST</th>
                    <th>FREE_DIAL</th>
                    <th>SMC_NUMBER</th>
                    <th>UID_HUSH</th>
                    <th>REG_DATE</th>
                </tr>
<?php
        $dataextensionrow = new ET_DataExtension_Row();
        $dataextensionrow->authStub = $myclient;
        $dataextensionrow->Name = $dataExtensionName01;

        $dataextensionrow->props = array(
                                        'TYPE',
                                        'NAME',
                                        'KANA',
                                        'MAIL',
                                        'TEL1',
                                        'TEL2',
                                        'POSTCODE',
                                        'CITY',
                                        'ADDRESS',
                                        'ADDRESS_NUMBER',
                                        'NEW_POSTCODE',
                                        'NEW_CITY',
                                        'NEW_ADDRESS',
                                        'NEW_ADDRESS_NUMBER',
                                        'ESTIMATE_DATE',
                                        'MOVING_DATE1',
                                        'MOVING_DATE2',
                                        'MOVING_DATE3',
                                        'REQUEST',
                                        'FREE_DIAL',
                                        'SMC_NUMBER',
                                        'UID_HUSH',
                                        'REG_DATE',
                                    );
        $response_01 = $dataextensionrow->get();

        if ($response_01->status && count($response_01->results)) {
            foreach ($response_01->results as $row) {
                print('<tr>');
                print('<form action="./">');
                print('<td><input type="submit" name="upd" value="○"></td>');
                print('<td><input type="submit" name="del" value="×"></td>');
                foreach ($row->Properties->Property as $param) {
                    if ($param->Name == 'UID_HUSH') {
                        print('<input type="hidden" name="uid_hush" value="' . $param->Value . '">');
                        print('<td>' . $param->Value . '</td>');
                    } else {
                        print('<td><input type="text" name="' . $param->Name . '" value="' . $param->Value . '" ></td>');
                    }
                }
                print('</form>');
                print('</tr>');
            }
        }

?>
                <tr>
                <form action="./">
                    <th colspan="2"><input type="submit" name="crt" value="新規登録"></th>
                    <th><input type="text" name="TYPE" value=""></th>
                    <th><input type="text" name="NAME" value=""></th>
                    <th><input type="text" name="KANA" value=""></th>
                    <th><input type="text" name="MAIL" value=""></th>
                    <th><input type="text" name="TEL1" value=""></th>
                    <th><input type="text" name="TEL2" value=""></th>
                    <th><input type="text" name="POSTCODE" value=""></th>
                    <th><input type="text" name="CITY" value=""></th>
                    <th><input type="text" name="ADDRESS" value=""></th>
                    <th><input type="text" name="ADDRESS_NUMBER" value=""></th>
                    <th><input type="text" name="NEW_POSTCODE" value=""></th>
                    <th><input type="text" name="NEW_CITY" value=""></th>
                    <th><input type="text" name="NEW_ADDRESS" value=""></th>
                    <th><input type="text" name="NEW_ADDRESS_NUMBER" value=""></th>
                    <th><input type="text" name="ESTIMATE_DATE" value=""></th>
                    <th><input type="text" name="MOVING_DATE1" value=""></th>
                    <th><input type="text" name="MOVING_DATE2" value=""></th>
                    <th><input type="text" name="MOVING_DATE3" value=""></th>
                    <th><input type="text" name="REQUEST" value=""></th>
                    <th><input type="text" name="FREE_DIAL" value=""></th>
                    <th><input type="text" name="SMC_NUMBER" value=""></th>
                    <th><input type="text" name="UID_HUSH" value=""></th>
                    <th><input type="text" name="REG_DATE" value=""></th>
                </form>
                </tr>
            </table>
        </div>

        <div class="list_area">
            <div class="list_title">[データエクステンション]：LINE_ID_de</div>
            <table>
                <tr>
                    <th>UID_HUSH</th>
                    <th>SMC_NUMBER</th>
                    <th>DATE_OF_ISSUE</th>
                </tr>
<?php
        $dataextensionrow = new ET_DataExtension_Row();
        $dataextensionrow->authStub = $myclient;
        $dataextensionrow->Name = $dataExtensionName02;

        $dataextensionrow->props = array(
                                        'UID_HUSH',
                                        'SMC_NUMBER',
                                        'DATE_OF_ISSUE',
                                    );
        $response_02 = $dataextensionrow->get();

        if ($response_02->status && count($response_02->results)) {
            foreach ($response_02->results as $row) {
                print('<tr>');
                foreach ($row->Properties->Property as $param) {
                    print('<td>' . $param->Value . '</td>');
                }
                print('</tr>');
            }
        }

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
?>
            </table>
        </div>
<!--
        <table>
            <tr>
                <td>Email</td>
                <td><input id="userEmail" type="text" /></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input id="userFirstName" type="text" /></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input id="userLastName" type="text" /></td>
            </tr>
        </table>
        
        <p>
            <button class="js-push-button" disabled>
              Register for Push Notifications
            </button>
        </p>
-->
        <br />
        <br />
    </div>

    <div class="js-curl-command"></div>

    <script src="config.js.php"></script>
    <script src="demo.js"></script>
    <script src="main.js"></script>
  </body>
</html>

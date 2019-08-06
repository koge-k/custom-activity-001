<?php
/*
if (file_exists ( ABSPATH . 'manifest.json' )) {
  $oldManifestJson = file_get_contents ( ABSPATH . 'manifest.json' );
} else {
  $oldManifestJson = '{}';
}
$data = json_decode ( $oldManifestJson, true );

$data ['gcm_sender_id'] = $settings ['gcm_sender_id'];
$data ['gcm_user_visible_only'] = true;
$newManifestJson = json_encode ( $data );
if ( is_writable ( ABSPATH . 'manifest.json' ) || !file_exists ( ABSPATH . 'manifest.json' ) && is_writable ( ABSPATH ) ) {
  file_put_contents ( ABSPATH . 'manifest.json', $newManifestJson );
} else {
  // display an error
}
*/

require('ET_Client.php');
try {
        $myclient = new ET_Client();
        $dataExtensionExternalKey01 = getenv('PUSH_REGISTRATION_DE_EXTERNAL_KEY_01');
        $dataExtensionName01 = getenv('PUSH_REGISTRATION_DE_NAME_01');
        $dataExtensionExternalKey02 = getenv('PUSH_REGISTRATION_DE_EXTERNAL_KEY_02');
        $dataExtensionName02 = getenv('PUSH_REGISTRATION_DE_NAME_02');

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
    word-break: keep-all;
}
table tr:nth-child(odd){
    background-color: #f7f7f7;
}
table th {
    padding: 10px;
    text-align: left;
    background-color: #eee;
    color: #777;
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
                foreach ($row->Properties->Property as $param) {
                    print('<td>' . $param->Value . '</td>');
                }
                print('</tr>');
            }
        }

?>
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

        <br />
        <br />
    </div>



    <div class="js-curl-command"></div>

    <script src="config.js.php"></script>
    <script src="demo.js"></script>
    <script src="main.js"></script>
  </body>
</html>

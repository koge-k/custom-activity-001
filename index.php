<?php
require('ET_Client.php');

$uid_hush = null;
$btn = 0;
if (isset($_REQUEST['crt']) && $_REQUEST['crt']) {
    $btn = 1;
} elseif (isset($_REQUEST['upd']) && $_REQUEST['upd']) {
    $btn = 2;
} elseif (isset($_REQUEST['del']) && $_REQUEST['del']) {
    $btn = 3;
} elseif (isset($_REQUEST['crt_02']) && $_REQUEST['crt_02']) {
    $btn = 4;
} elseif (isset($_REQUEST['del_02']) && $_REQUEST['del_02']) {
    $btn = 5;
}
if (isset($_REQUEST['UID_HUSH']) && $_REQUEST['UID_HUSH']) {
    $uid_hush = $_REQUEST['UID_HUSH'];
}

try {
    $myclient = new ET_Client();
    $dataExtensionExternalKey01 = getenv('PUSH_REGISTRATION_DE_EXTERNAL_KEY_01');
    $dataExtensionName01 = getenv('PUSH_REGISTRATION_DE_NAME_01');
    $dataExtensionExternalKey02 = getenv('PUSH_REGISTRATION_DE_EXTERNAL_KEY_02');
    $dataExtensionName02 = getenv('PUSH_REGISTRATION_DE_NAME_02');

    // カラム取得
    $aColumnArray = array();
    $dColumn = new ET_DataExtension_Column();
    $dColumn->authStub = $myclient;
    $dColumn->props = array('Name', 'CustomerKey');
    $dColumn->filter = array(
                            'Property' => 'CustomerKey',
                            'SimpleOperator' => 'equals',
                            'Value' => $dataExtensionExternalKey01
    );
    $odColumns = $dColumn->get();
    foreach ($odColumns->results as $aColumn) {
var_dump($aColumn);


        $aColumnArray[] = $aColumn->Name;
    }

    // 登録時バリデート
    if ($btn == 1) {
        if (!isset($_REQUEST['UID_HUSH']) || !$_REQUEST['UID_HUSH']) {
            print('<p style="color: red; font-size: 20pt; padding: 20px;">UID_HUSHは必須です。</p>');
        } elseif (isset($_REQUEST['MAIL']) && $_REQUEST['MAIL'] != '' && !preg_match('/^[!-~]+@[!-~]+$/', $_REQUEST['MAIL'])) {
            // メール形式エラー
            print('<p style="color: red; font-size: 20pt; padding: 20px;">MAILの形式が不正です。</p>');
        } elseif (isset($_REQUEST['REG_DATE']) 
                    && $_REQUEST['REG_DATE'] != '' 
                    && !preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_REQUEST['REG_DATE'])
                    && !preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}/', $_REQUEST['REG_DATE'])
        ) {
            // 日付形式エラー
            print('<p style="color: red; font-size: 20pt; padding: 20px;">日付の形式が不正です。</p>');
        } else {
            // 登録処理
            $dataextensionrow = new ET_DataExtension_Row();
            $dataextensionrow->authStub = $myclient;
            $dataextensionrow->Name = $dataExtensionName01;

            $aProps = array();
            foreach ($aColumnArray as $sName) {
                $aProps[$sName] = $_REQUEST[$sName];
            }
            $dataextensionrow->props = $aProps;
            $dataextensionrow->post();
        }

    } elseif ($btn == 2) {
        if (!$uid_hush) {
            print('<p style="color: red; font-size: 20pt; padding: 20px;">不正なアクセスです。</p>');
        } elseif (isset($_REQUEST['MAIL']) && $_REQUEST['MAIL'] != '' && !preg_match('/^[!-~]+@[!-~]+$/', $_REQUEST['MAIL'])) {
            // メール形式エラー
            print('<p style="color: red; font-size: 20pt; padding: 20px;">MAILの形式が不正です。</p>');
        } elseif (isset($_REQUEST['REG_DATE']) 
                    && $_REQUEST['REG_DATE'] != '' 
                    && !preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_REQUEST['REG_DATE'])
                    && !preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}/', $_REQUEST['REG_DATE'])
        ) {
            // 日付形式エラー
            print('<p style="color: red; font-size: 20pt; padding: 20px;">日付の形式が不正です。</p>');
        } else {
            $dataextensionrow = new ET_DataExtension_Row();
            $dataextensionrow->authStub = $myclient;
            $dataextensionrow->Name = $dataExtensionName01;
            $aProps = array();
            foreach ($aColumnArray as $sName) {
                $aProps[$sName] = $_REQUEST[$sName];
            }

            $dataextensionrow->props = $aProps;
            $dataextensionrow->patch();
        }

    } elseif ($btn == 3) {
        if (!$uid_hush) {
            print('<p style="color: red; font-size: 20pt; padding: 20px;">不正なアクセスです。</p>');
        } else {
            // 削除処理
            $dataextensionrow = new ET_DataExtension_Row();
            $dataextensionrow->authStub = $myclient;
            $dataextensionrow->Name = $dataExtensionName01;
            $dataextensionrow->props = array('UID_HUSH' => $uid_hush);
            $results = $dataextensionrow->delete();
        }

    } elseif ($btn == 4) {
        if (!isset($_REQUEST['UID_HUSH']) || !$_REQUEST['UID_HUSH']) {
            print('<p style="color: red; font-size: 20pt; padding: 20px;">UID_HUSHは必須です。</p>');
        } elseif (isset($_REQUEST['DATE_OF_ISSUE']) 
                    && $_REQUEST['DATE_OF_ISSUE'] != '' 
                    && !preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_REQUEST['DATE_OF_ISSUE'])
                    && !preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}/', $_REQUEST['DATE_OF_ISSUE'])
        ) {
            // 日付形式エラー
            print('<p style="color: red; font-size: 20pt; padding: 20px;">日付の形式が不正です。</p>');
        } else {
            // 登録処理
            $dataextensionrow = new ET_DataExtension_Row();
            $dataextensionrow->authStub = $myclient;
            $dataextensionrow->Name = $dataExtensionName02;
            $dataextensionrow->props = array(
                                            'UID_HUSH'              => $_REQUEST['UID_HUSH'],
                                            'SMC_NUMBER'            => $_REQUEST['SMC_NUMBER'],
                                            'DATE_OF_ISSUE'         => $_REQUEST['DATE_OF_ISSUE'],
                                        );
            $dataextensionrow->post();
        }

    } elseif ($btn == 5) {
        if (!$uid_hush) {
            print('<p style="color: red; font-size: 20pt; padding: 20px;">不正なアクセスです。</p>');
        } else {
            // 削除処理
            $dataextensionrow = new ET_DataExtension_Row();
            $dataextensionrow->authStub = $myclient;
            $dataextensionrow->Name = $dataExtensionName02;
            $dataextensionrow->props = array('UID_HUSH' => $uid_hush);
            $results = $dataextensionrow->delete();
        }

    }

?>
<html lang="ja">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Push Messaging &amp; Notifications</title>

    <link rel="icon" href="../images/favicon.ico">
    <link rel="manifest" href="manifest.json.php">
<style>
input[type="submit"] {
    padding: 5px: 10px;
}
input[type="text"] {
    padding: 5px;
}
table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}
table td{
    padding: 10px;
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
        <h1>MCデータエクステンションの操作テスト</h1>

        <div class="list_area">
            <div class="list_title">[データエクステンション]：STIMATE_REQUEST_de</div>
            <table>
<?php
        $dataextensionrow = new ET_DataExtension_Row();
        $dataextensionrow->authStub = $myclient;
        $dataextensionrow->Name = $dataExtensionName01;

        $dataextensionrow->props = $aColumnArray;
        $response_01 = $dataextensionrow->get();


        if ($response_01->status && count($response_01->results)) {
            print('<tr><th>更新</th><th>削除</th>');
            foreach ($response_01->results[0]->Properties->Property as $param) {
                print('<th>' . $param->Name . '</th>');
            }
            print('</tr>');

            foreach ($response_01->results as $row) {
                print('<tr>');
                print('<form action="./">');
                print('<td><input type="submit" name="upd" value="○"></td>');
                print('<td><input type="submit" name="del" value="×"></td>');
                foreach ($row->Properties->Property as $param) {
                    if ($param->Name == 'UID_HUSH') {
                        print('<input type="hidden" name="UID_HUSH" value="' . $param->Value . '">');
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
<?php
        foreach ($aColumnArray as $sName) {
            print('<th><input type="text" name="' . $sName . '" value=""></th>');
        }

?>

                </form>
                </tr>
            </table>
        </div>

        <div class="list_area">
            <div class="list_title">[データエクステンション]：LINE_ID_de</div>
            <table>
                <tr>
                    <th>削除</th>
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
                print('<form action="./">');
                print('<td><input type="submit" name="del_02" value="×"></td>');
                foreach ($row->Properties->Property as $param) {
                    if ($param->Name == 'UID_HUSH') {
                        print('<input type="hidden" name="UID_HUSH" value="' . $param->Value . '">');
                    }
                    print('<td>' . $param->Value . '</td>');
                }
                print('</form>');
                print('</tr>');
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
?>
                <tr>
                <form action="./">
                    <th><input type="submit" name="crt_02" value="新規登録"></th>
                    <th><input type="text" name="UID_HUSH" value=""></th>
                    <th><input type="text" name="SMC_NUMBER" value=""></th>
                    <th><input type="text" name="DATE_OF_ISSUE" value=""></th>
                </form>
                </tr>
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

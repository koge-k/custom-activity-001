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
            print_r('<br><br>');
            foreach ($response_01->results as $row) {
                print_r('<br>');
                foreach ($row->Properties->Property as $param) {
                    print_r($param->Value);
                }
            }
        }


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
            print_r('<br><br>');
            foreach ($response_02->results as $row) {
                print_r('<br>');
                foreach ($row->Properties->Property as $param) {
                    print_r($param->Value);
                }
            }
        }

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
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
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
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
                <tr>
                    <td>c4ca4238a0b923820dcc509a6f75849b</td>
                    <td>c81e728d9d4c2f636f067f89cc14862c</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>eccbc87e4b5ce2fe28308fd9f2a7baf3</td>
                    <td>a87ff679a2f3e71d9181a67b7542122c</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>e4da3b7fbbce2345d7772b0674a318d5</td>
                    <td>8f14e45fceea167a5a36dedd4bea2543</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>c9f0f895fb98ab9159f51fd0297e236d</td>
                    <td>45c48cce2e2d7fbdea1afc51c7c6ad26</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>d3d9446802a44259755d38e6d163e820</td>
                    <td>6512bd43d9caa6e02c990b0a82652dca</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>c20ad4d76fe97759aa27a0c99bff6710</td>
                    <td>c51ce410c124a10e0db5e4b97fc2af39</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>aab3238922bcc25a6f606eb525ffdc56</td>
                    <td>9bf31c7ff062936a96d3c8bd1f8f2ff3</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>c74d97b01eae257e44aa9d5bade97baf</td>
                    <td>70efdf2ec9b086079795c442636b55fb</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
                <tr>
                    <td>6f4922f45568161a8cdf4ad2299f6d23</td>
                    <td>1f0e3dad99908345f7439f8ffabdffc4</td>
                    <td>2019年7月30日 0:00</td>
                </tr>
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

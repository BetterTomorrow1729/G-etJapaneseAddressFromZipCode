<?php
    $ZipCode = $_POST[’ZipCode’];
    echo $_ZipCode;

    $ch = curl_init();

    $url = ’https://tahprpe7ixyrlnde7kccfiewj40afjyi.lambda-url.ap-northeast-3.on.aws?ZipCode=’ . ZipCode;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    switch (curl_getinfo($ch, CURLINFO_HTTP_CODE))
    {
        case 200: {
            $decodedResult = json_decode($result, true);

            echo $decodedResult;        
        }
        default: {
            echo $result;        
        }
    };

    curl_close($ch);
?>

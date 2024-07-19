# GetJapaneseAddressFromZipCode
日本の郵便番号から住所・大口事業所住所を求めるプログラム群

各ファイルの説明

郵政省郵便番号データファイルからAWS Lambda関数で使用するjsonファイルを作成するツール

# C#版

MainWindow.xaml.cs
全国一括の郵便番号データファイル(https://www.post.japanpost.jp/zipcode/dl/oogaki/zip/ken_all.zip)
大口事業所郵便番号データファイル(https://www.post.japanpost.jp/zipcode/dl/jigyosyo/zip/jigyosyo.zip)を
ダウンロードし、解凍して出てきた二つのCSVファイルが実行ファイルと同じフォルダにある前提のもとで動作し、

# Rust版

C#版と異なり郵政省ダウンロードページより直接ダウンロード・解凍を行ったあとはC#版と同様な動作を行う。

main.rs
起動パラメータ(jsonファイル保存パス)を処理し、郵便番号データファイルをダウンロード・解凍・エンコーディング変換・jsonファイルへの処理を行う。

encording_util.rs
シフトjis→utf-8へファイルのエンコード変換を行うモジュール。

network_util.rs
URLと保存パス・ファイル名を指定し、ダウンロードを行うモジュール。

zip_util.rs
圧縮ファイル名と保存パス・ファイル名を指定し、解凍を行うモジュール。

GenericError.rs
関数が複数の型のエラーを返しうる場合にそれらを総称エラー型として扱うための型定義。

# AWSLambda関数の本体

Zip2Address.py
APIゲートウェイを介して郵便番号を受け取り、上3桁に対応するjsonファイルを読み込んで下４桁でレコードを特定し住所データを返す。

# 郵便番号→住所の動作を確認するためのデモ画面

ZipDemo.html
郵便番号を入力してphpを呼び出す。

ZipDemo.php
渡された郵便番号でラムダ関数を呼び出し、帰ってきた住所データを表示する。

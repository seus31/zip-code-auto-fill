# Read Me

## 概要
このパッケージはJavascriptでよくある郵便番号を入力したら自動で住所を入力する機能をLaravelのLivewireを使って実装するものです。

## 環境
* PHP >= 8.1
* Laravel 10.x / 11.x / 12.x
* Livewire 3.x

## 使い方

### インストール
パッケージのインストールをする。
```shell
composer require seus31/zip-code-auto-fill
```

## パッケージ開発

このリポジトリ自体を開発する場合、PHP/Composerはホストに一切インストールせず、Dockerコンテナ内のみで作業します。
`vendor` などComposerが生成するファイルもホストの実ファイルシステムには置かれず、Dockerの名前付きボリューム内にのみ保持されます。

### 事前準備
Docker / Docker Composeが使えること。ホスト側にPHPやComposerを用意する必要はありません。

### イメージのビルド
```shell
make build
```

### 依存関係のインストール
```shell
make install
```

### テストの実行
```shell
make test
```

### コンテナ内シェルに入る
```shell
make shell
```

その他のコマンドを実行したい場合も、必ず `docker compose run --rm app <コマンド>` の形でコンテナ内から実行してください。

### 各種コマンドの実行
郵便番号データの作成
```shell
php artisan zip-code-auto-fill:db:init
```

Livewireコンポーネントの作成
```shell
php artisan zip-code-auto-fill:file:create
```

郵便番号検索機能を設置する対象のbladeテンプレートにlivewireコンポーネントを配置
```blade.php
<livewire:zip-code-auto-fill />
```
### htmlの設定
郵便番号を入力するinputタグに```id="zipcode"```を設定  
都道府県を入力するinputタグに```class="af_pref"```を設定  
市区町村を入力するinputタグに```class="af_city"```を設定  
住所を入力するinputタグに```class="af_address"```を設定  

Copyright (c) 2021 seus31
Released under the MIT license
https://github.com/seus31/zip-code-auto-fill/blob/master/license.txt

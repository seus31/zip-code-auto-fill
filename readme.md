# Read Me

## 概要
このパッケージはJavascriptでよくある郵便番号を入力したら自動で住所を入力する機能をLaravelのLivewireを使って実装するものです。

## 環境
* PHP >= 7.2.5
* Laravel >= 7.0

## 使い方

### インストール
パッケージのインストールをする。
```shell
composer require seus31/zip-code-auto-fill
```

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

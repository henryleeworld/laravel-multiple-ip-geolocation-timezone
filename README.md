# Laravel 7 多 IP 地理位置定位時區

引入 torann 的 geoip 套件來擴增利用 IP 位址地理位置定位所在的時區，應用程式會讓使用者看到的是當地時間。如果某個區域改變了時區，而且你在我們得知時區更改以前就已經建立資料，這場資料的時區可能會有錯誤。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產⽣ Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/user` 來進行使用者建立時間取得。

----

## 畫面截圖
![](https://i.imgur.com/ruGWLfd.png)
> 轉換使用者顯示的對應標準時間

![](https://i.imgur.com/pJfBeSq.png)
> 儲存資料則以應用程式的時區對應標準時間為準

-- データベース作成
CREATE DATABASE IF NOT EXISTS ec_portfolio;

-- 使用するデータベースを指定
USE ec_portfolio;

-- 商品テーブル
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    stock INT NOT NULL
);

# PHP CRUD Portfolio

## Overview
This project is a simple CRUD (Create, Read, Update, Delete) web application built with PHP and MySQL.
It simulates a small-scale product management system commonly used in business applications.

The purpose of this project is to demonstrate fundamental backend development skills,
including database design, SQL handling, and clean code structure using the Repository pattern.

---

## Features
- View product list
- Create new products
- Edit existing products
- Delete products

---

## Tech Stack

### Backend
- PHP 8.x
- PDO (PHP Data Objects)
- Repository Pattern

### Database
- MySQL 8.x

### Tools
- Git / GitHub
- Visual Studio Code
- Windows

---

## Directory Structure

ec-portfolio/
├─ php/
│ ├─ config/
│ │ └─ db.php
│ ├─ products/
│ │ ├─ list.php
│ │ ├─ new.php
│ │ ├─ edit.php
│ │ ├─ update.php
│ │ └─ delete.php
│ └─ repository/
│ └─ ProductRepository.php
├─ db/
│ └─ schema.sql
└─ README.md


---

## Setup Instructions

### 1. Create Database

```sql
CREATE DATABASE ec_portfolio;
USE ec_portfolio;
SOURCE db/schema.sql;
```

### 2. Configure Database Connection

Edit `php/config/db.php` to set your database credentials, or set environment variables:
- `DB_USER` (default: 'root')
- `DB_PASS` (default: '')

### 3. Start PHP Built-in Server

```bash
cd php
php -S localhost:8000
```

Access the application via browser:
```
http://localhost:8000/products/list.php
```

---

## Design Considerations

- Database access logic is separated using the Repository pattern
- Prepared Statements are used to prevent SQL Injection
- CRUD operations are implemented in a clear and maintainable structure

---

## Future Improvements

- Implement the same CRUD functionality using Java (Spring Boot)
- Convert the application into a RESTful API
- Add validation and error handling enhancements

---

日本語説明
概要

本プロジェクトは、PHP と MySQL を使用した CRUD（作成・参照・更新・削除）機能を持つ
商品管理用の Web アプリケーションです。

実務でよく見られる小規模業務システムを想定し、
Repository パターンを用いてデータアクセス処理を分離しています。

機能一覧
商品一覧表示
商品の新規登録
商品情報の編集
商品の削除

バックエンド
PHP 8.x
PDO
Repository パターン

データベース
MySQL 8.x

開発環境
Windows
Visual Studio Code
Git / GitHub

### セットアップ手順

#### 1. データベース作成

```sql
CREATE DATABASE ec_portfolio;
USE ec_portfolio;
SOURCE db/schema.sql;
```

#### 2. データベース接続設定

`php/config/db.php` を編集してデータベース認証情報を設定するか、環境変数を設定してください：
- `DB_USER` (デフォルト: 'root')
- `DB_PASS` (デフォルト: '')

#### 3. PHP 開発用サーバー起動

```bash
cd php
php -S localhost:8000
```

ブラウザで以下にアクセスしてください：
```
http://localhost:8000/products/list.php
```

---

### 設計ポイント

- SQL を Repository クラスに集約し、責務を分離
- プリペアドステートメントによる SQL Injection 対策
- CRUD 処理をシンプルかつ可読性の高い構成で実装

---

### 今後の改善予定

- Java（Spring Boot）による同等機能の CRUD 実装
- REST API 化
- バリデーションおよび例外処理の強化


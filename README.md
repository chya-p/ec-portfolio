# EC Portfolio – PHP CRUD & Java Spring Boot REST API

## Table of Contents

- [Overview](#overview)
- [Key Concepts Demonstrated](#key-concepts-demonstrated)
- [Project Structure](#project-structure)
- [PHP CRUD Application](#php-crud-application)
  - [Overview (PHP)](#overview-1)
  - [Features](#features)
  - [Tech Stack (PHP)](#tech-stackphp)
  - [Directory Structure (PHP)](#directory-structure-php)
  - [Setup Instructions (PHP)](#setup-instructions)
  - [PHP Design Notes](#php-design-notes)
- [Java (Spring Boot) REST API](#java-spring-boot-rest-api)
  - [Overview (Java)](#overview-2)
  - [Tech Stack (Java)](#tech-stack-java)
  - [Directory Structure (Java)](#directory-structure-java)
  - [Setup Instructions (Java)](#setup-instructions-java)
  - [Health Check](#health-check)
  - [API Endpoints](#api-endpoints)
  - [Java Design Notes](#java-design-notes)
- [日本語説明](#日本語説明)
  - [概要](#概要)
  - [プロジェクト構成](#プロジェクト構成)
  - [PHP CRUD アプリケーション](#php-crud-アプリケーション)
  - [Java（Spring Boot）REST API](#javaspring-bootrest-api)
  - [今後の改善予定](#今後の改善予定)

## Overview
This repository is a **backend-focused portfolio project** that demonstrates
how the same product management system can be implemented using **both PHP and Java (Spring Boot)**,
sharing a single MySQL database.

The goal of this project is not to build a feature-rich application,
but to showcase **clean architecture, proper responsibility separation,
and practical backend design choices** commonly used in real-world systems.

By implementing the same domain (Product CRUD) in two different languages,
this project highlights differences in design approaches while maintaining
a consistent database schema.

---

## Key Concepts Demonstrated
- CRUD implementation (Create / Read / Update / Delete)
- Shared database between PHP and Java applications
- Repository pattern for data access separation
- Prepared Statements / JPA for SQL Injection prevention
- DTO-based API design (input vs output separation)
- RESTful API principles
- Maintainable and readable code structure

---

## Project Structure

```text
ec-portfolio/
├─ php/ # PHP CRUD Application
├─ java/ # Java Spring Boot REST API
├─ db/
│ └─ schema.sql # Shared database schema
└─ README.md
```

---

# PHP CRUD Application

## Overview
The PHP application is a **simple product management system** built using
plain PHP and MySQL, focusing on clarity and maintainability rather than frameworks.

It represents a typical small-scale internal business system.

---

## Features
- Product list display
- Product creation
- Product update
- Product deletion

---

## Tech Stack(PHP)

### Backend
- PHP 8.x
- PDO
- Repository Pattern

### Database
- MySQL 8.x

### Tools
- Git / GitHub
- Visual Studio Code
- Windows

---

## Directory Structure (PHP)

```text
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
│   └─ ProductRepository.php
├─ db/
│ └─ schema.sql
└─ README.md
```

---

## Setup Instructions

### 1. Create Database

```sql
CREATE DATABASE ec_portfolio;
USE ec_portfolio;
SOURCE db/schema.sql;
```

### 2. Configure Database Connection

Edit `php/config/db.php` or set environment variables:
- `DB_USER` (default: root)
- `DB_PASS` (default: empty)

### 3. Start PHP Built-in Server

```bash
cd php
php -S localhost:8000
```

### Access via browser:
```text
http://localhost:8000/products/list.php
```

---

## PHP Design Notes

- Database access is fully separated using the Repository pattern
- Prepared Statements are used to prevent SQL Injection
- Business logic is kept minimal and readable

---

# Java (Spring Boot) REST API
## Overview
The Java application is a RESTful CRUD API built with Spring Boot and Spring Data JPA.
It uses the same products table as the PHP application.

This API is designed to demonstrate enterprise-style backend architecture,
including layered structure, DTO usage, and centralized exception handling.

---

## Tech Stack (Java)
- Java 17
- Spring Boot 3.x
- Spring Data JPA (Hibernate)
- MySQL 8.x
- Maven

---

## Directory Structure (Java)
```text
java/product-api/
├─ src/main/java/com/example/productapi
│  ├─ controller
│  ├─ service
│  ├─ repository
│  ├─ entity
│  ├─ dto
│  └─ exception
└─ src/main/resources
   └─ application.yml
```

---

## Setup Instructions (Java)

### 1. Set Environment Variables (optional)

```bash
DB_USER=root
DB_PASS=your_mysql_password
```

If not set, default values are used.

### 2. Start Application

```bash
cd java/product-api
mvn spring-boot:run
```
### The API will start:

```text
http://localhost:8080
```

---

## Health Check
```http
GET /
```

### Response:
```text
Product API is running!
```

---

## API Endpoints

### Get All Products
```http
GET /api/products
```

### Response Example:
```json
[
  {
    "id": 1,
    "name": "Sample Product",
    "price": 3000,
    "stock": 10,
    "createdAt": "2025-12-27 09:00"
  }
]
```

---

### Create Product
```http
POST /api/products
Content-Type: application/json
```

### Request Body:
```json
{
  "name": "new product",
  "price": 5000,
  "quantity": 20
}
```

---

### Update Product
```http
PUT /api/products/{id}
```

---

### Delete Product
```http
DELETE /api/products/{id}
```

---

## Java Design Notes
- Controller handles HTTP requests only
- Business logic resides in Service layer
- Database access is abstracted via Repository
- DTOs separate input and output models
- Global exception handling provides consistent error responses
- createdAt is managed automatically via JPA (@PrePersist)

---

## Status
- PHP CRUD Application: ✅ Complete
- Java REST API: ✅ Complete
- Shared Database Schema: ✅
- Authentication / Authorization: Not implemented (intentionally omitted)

---

## Future Improvements

- Authentication (JWT / Session)
- Pagination and sorting for product list
- Unit and integration tests
- Docker-based environment setup

---

# 日本語説明
## 概要
本リポジトリは、**PHP と Java（Spring Boot）で同一の商品管理ドメインを実装した
バックエンド中心のポートフォリオプロジェクト**です。

PHP と Java の 2 つのアプリケーションは、**同一の MySQL データベースを共有**しており、
同じテーブル構造を異なる技術スタックでどのように設計・実装するかを示しています。

機能の多さではなく、  
**実務で求められる設計・責務分離・保守性を重視**して構築しています。

---

## このプロジェクトで示していること
- CRUD（作成・参照・更新・削除）の基本実装
- PHP と Java による同一ドメインの実装比較
- 共通データベース設計
- Repository パターンによる責務分離
- SQL Injection 対策（PDO / JPA）
- DTO を用いた API 設計（入力用・出力用の分離）
- RESTful API の設計思想
- 可読性・保守性を意識したコード構成

---

## プロジェクト構成
```text
ec-portfolio/
├─ php/ # PHP による CRUD アプリケーション
├─ java/ # Java（Spring Boot）REST API
├─ db/
│ └─ schema.sql # PHP / Java 共通の DB スキーマ
└─ README.md
```

---

# PHP CRUD アプリケーション

## 概要
PHP 側は、**フレームワークを使用せず**、
素の PHP + MySQL で構築した商品管理アプリケーションです。

実務でよく見られる **小規模な社内業務システム** を想定し、
シンプルながらも保守性を意識した構成としています。

---

## 機能一覧
- 商品一覧表示
- 商品の新規登録
- 商品情報の編集
- 商品の削除

---

## 使用技術
### バックエンド
- PHP 8.x
- PDO
- Repository パターン

### データベース
- MySQL 8.x

### 開発環境
- Windows
- Visual Studio Code
- Git / GitHub

---

## ディレクトリ構成（PHP）
```text
php/
├─ config/
│ └─ db.php
├─ products/
│ ├─ list.php
│ ├─ new.php
│ ├─ edit.php
│ ├─ update.php
│ └─ delete.php
└─ repository/
└─ ProductRepository.php
```

---

## PHP セットアップ手順

### 1. データベース作成

```sql
CREATE DATABASE ec_portfolio;
USE ec_portfolio;
SOURCE db/schema.sql;
```

### 2. データベース接続設定

`php/config/db.php` を編集するか、以下の環境変数を設定してください。
- `DB_USER` (デフォルト: 'root')
- `DB_PASS` (デフォルト: '')

### 3. PHP 開発用サーバー起動

```bash
cd php
php -S localhost:8000
```

ブラウザで以下にアクセスしてください：
```text
http://localhost:8000/products/list.php
```

---

## PHP 設計ポイント

- SQL を Repository クラスに集約し、責務を分離
- プリペアドステートメントによる SQL Injection 対策
- CRUD 処理の流れが追いやすいシンプルな構成

---

# Java（Spring Boot）REST API

## 概要

Java 側は、Spring Boot + Spring Data JPA を用いた
RESTful な商品管理 API です。

PHP アプリケーションと 同一の products テーブルを使用し、
エンタープライズ開発を意識した
レイヤードアーキテクチャで構築しています。

---

## 使用技術（Java）
- Java 17
- Spring Boot 3.x
- Spring Data JPA（Hibernate）
- MySQL 8.x
- Maven

---

## ディレクトリ構成（Java）
```text
java/product-api/
├─ src/main/java/com/example/productapi
│  ├─ controller
│  ├─ service
│  ├─ repository
│  ├─ entity
│  ├─ dto
│  └─ exception
└─ src/main/resources
   └─ application.yml
```

---

## Java セットアップ手順

### 1. 環境変数設定（任意）
```bash
DB_USER=root
DB_PASS=your_mysql_password
```
未設定の場合はデフォルト値が使用されます。

### 2. アプリケーション起動
```bash
cd java/product-api
mvn spring-boot:run
```
起動後の URL：
```text
http://localhost:8080
```

---

### ヘルスチェック
```http
GET /
```
レスポンス：
```text
Product API is running!
```

---

## API エンドポイント例

### 商品一覧取得
```http
GET /api/products
```
```json
[
  {
    "id": 1,
    "name": "Sample Product",
    "price": 3000,
    "stock": 10,
    "createAt": "2025-12-27 09:00"
  }
]
```

---

### 商品登録
```http
POST /api/products
```
```json
{
  "name": "New Products",
  "price": 5000,
  "stoc": 20,
}
```

---

### 商品更新
```http
PUT /api/products/{id}
```

---

### 商品削除
```http
DELETE /api/products/{id}
```

## Java 設計ポイント
- Controller / Service / Repository の責務分離
- DTO による入力・出力モデルの分離
- グローバル例外ハンドリングによるエラーレスポンス統一
- `@PrePersist` による createdAt の自動設定
- REST API としての一貫した設計

---

## ステータス
- PHP CRUD アプリケーション：✅ 完成
- Java REST API：✅ 完成
- データベース共有：✅
- 認証・認可：未実装（ポートフォリオ用途のため）

---

## 今後の改善予定

- 認証機能（JWT / セッション）
- 一覧 API のページネーション・ソート対応
- 単体テスト / 結合テストの追加
- Docker による環境構築

---

